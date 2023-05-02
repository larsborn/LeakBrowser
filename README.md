# Unnamed Leak Explorer

Web frontend for a database containing leaked e-mail messages. Currently, those messages are mainly extracted from
publicly available torrents. Design goal is easy data-discoverability and some data-analytics use cases.

## Tech Stack

* 🥑 ArangoDB multi-model database: JSON document store, inverse index search, graph structure
* 🐘 Symfony PHP-based web framework
* 🐍 Python for generating the data set
* 💽 Data Source email leaks from https://ddosecrets.com/
