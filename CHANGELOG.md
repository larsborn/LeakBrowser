# Changelog

## 2023-05-01

* Add a table displaying email counts by month sent. The AQL query shown below was used to populate a new field called
  `email.date_month`. This field is also covered by an index to make speed up the query feeding the above-described
  table. This index also allows for filtering for those emails. A pre-populated query is linked from the table.

```aql
FOR sample in samples
    FILTER sample.file_extension == "eml"
    FILTER sample.email.date != null
    UPDATE sample._key WITH {
        'email': {
            'date_month': DATE_FORMAT(
                sample.email.date,
                "%y-%mm"
            )
        }
    } IN samples 
```

## 2023-04-24

* For some emails, the app showed the message `Got a malformed result from the server`. This was caused by a JSON
  response containing invalid Unicode code points. Those strings ended up in the database because of a logic bug in the
  processing backend: the backend assumed that there's only one email body and treated all "body-like" parts of the
  mail as "the body". This lead to inline images — which are binary data — being ingested as the body. Insertion of data
  like this should not have been possible though because the ArangoDB server setting `server.validate-utf8-strings` was
  `true`. This bug is tracked at https://github.com/arangodb/arangodb/issues/18769.
* The above investigation also surfaced the fact that neither the processing backend nor the frontend was able to
  correctly handle emails which have bodies in both plaintext and HTML format. This feature was added.
