Laravel Gallery App
===================

Simple laravel gallery that scrapes pictures from Flickr

## Demo
* http://flickr.fabioneves.com/

## How to install
* pull repo
* run "composer install"
* create the table "images" in the database using the provided "db.sql" file
* edit "app/config/database.php" with your db values
* edit "app/config/flickr.php" with your flickr api key
* done!

## Routes
* http://gallery.hostname/ -> shows the gallery index
* http://gallery.hostname/insert/[photos_per_page]/[pages] -> calls the flickr api and adds photos to the database

## Credits
* [Laravel](http://www.laravel.com)
* [anlutro cURL package](https://github.com/anlutro/php-curl/tree/master)
* [jQuery](http://www.jquery.com)
* [Masonry](http://masonry.desandro.com/)
* [imagesLoaded](http://imagesloaded.desandro.com/)
