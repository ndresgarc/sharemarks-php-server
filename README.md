# sharemarks-php-server

PHP server for the Sharemarks project

## Install 

GitHub

`git clone https://github.com/ndresgarc/sharemarks-php-server.git`

Packagist

`composer require vitalis/hello-composer`

## API Endpoints

### GET /bookmarks

Returns a list of all stored bookmarks

### GET /bookmarks/:id

Returns only one bookmark referenced by `:id`

### POST /bookmarks

Adds a new bookmark to the database

### PUT /bookmarks/:id

Updates a bookmark reference by `:id` in the database

### DELETE /bookmarks/:id

Deletes the bookmark referenced by `:id`

## TODO
+ Localization
+ Preview server side rendering image
+ Broken link checker
+ Redirect to a bookmark
+ Proxy a bookmark
+ Auth
+ Error handling