Laravel Gallery App
===================

Simple laravel gallery that scrapes pictures from Flickr

## Demo
* http://flickr.fabioneves.com/

## How to install
* clone this repo "git clone https://github.com/fabioneves/laravel-gallery-app.git"
* run "composer install"
* give write permissions to all directories under "app/storage"
* create the table "images" in the database using the provided "db.sql" file
* edit "app/config/database.php" with your db values
* edit "app/config/flickr.php" with your flickr api key
* all done, navigate to your http://vhost.app/

## Routes
* http://gallery.hostname/[page] -> shows the gallery index
* http://gallery.hostname/insert/[photos_per_page]/[pages] -> calls the flickr api and adds photos to the database

## Credits
* [Laravel](http://www.laravel.com)
* [anlutro cURL package](https://github.com/anlutro/php-curl/tree/master)
* [jQuery](http://www.jquery.com)
* [Masonry](http://masonry.desandro.com/)
* [imagesLoaded](http://imagesloaded.desandro.com/)
