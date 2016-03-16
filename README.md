# Upcoming Movie Collection
Catch upcoming movies and organize them in a list

## Used Ressource

* [Bootstrap](https://github.com/twbs/bootstrap) ([and navbar example](https://getbootstrap.com/examples/navbar/))
* [jQuery](https://github.com/jquery/jquery)
* [A Better Fluid Responsive Table](http://codepen.io/dudleystorey/pen/Geprd) thanks to dudleystorey
* [Responsive Popup with JavaScript](http://codepen.io/Shaz3e/pen/jEZpJW) thanks to Shaz3e

## Install
1. Clone the git repo and enter your db details in sql_con.php and enter the api url in json_parser.php.
2. Configure the json_parser.php as a cron and let it run every day for example.
3. Put your own favicons in the favicon folder
4. Run installer.html

## TODO
* Made sql queries due to mysql escape more secure (http://stackoverflow.com/questions/60174/how-can-i-prevent-sql-injection-in-php?rq=1)
* Add trailer for every Movie
* Add possibility to add upcoming movies in own list
* User OAuth from API (waiting for V2)

## Temp
* http://www.w3schools.com/jsref/event_onclick.asp
