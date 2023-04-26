# Unnamed Leak Explorer

## Error Messages

### Malformed Server Response

The error message
```text
Got a malformed result from the server
```
is indicative of, you guessed it, a malformed response from the server. So far this was always caused by binary data
with invalid Unicode code points being stored in the ArangoDB document. This should not be possible when 
`server.validate-utf8-strings` is set to `true` and is tracked at https://github.com/arangodb/arangodb/issues/18769.
