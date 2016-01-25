# Upcoming Movie Collection
Trailer sammeln und Kino/DVD release Datum verwalten

## Used Ressource

* [Bootstrap](https://github.com/twbs/bootstrap) ([and navbar example](https://getbootstrap.com/examples/navbar/))
* [jQuery](https://github.com/jquery/jquery)
* [A Better Fluid Responsive Table](http://codepen.io/dudleystorey/pen/Geprd) thanks to @dudleystorey

## Install
1. Clone the git repo and enter your db details in sql_q1.php and enter the api url in json_parser.php.
2. Create the table manually. id is unique.
3. Configure the json_parser.php as a cron and let it run every day for example.

## TODO
* Consider use of PDO
* Made sql queries due to mysql escape more secure
* Create favicon
* create table with structure from php file
* Add installer php
* Add cinema and bd release date from every Movie
* Add trailer for every Movie
* Add user space
* Add possibility to add upcoming movies in own list
* Add notification when today and cinema data or bd release date match
* Add option to configure notification

## Requirement
