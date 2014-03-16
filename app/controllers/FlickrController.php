<?php

class FlickrController extends BaseController
{

  // inserts the photos in the database
  public function insert()
  {
    // route parameters
    $pages = Route::input('pages', 1);
    $per_page = Route::input('per_page', 500);

    // clean database table before inserting photos
    Image::truncate();

    // does a flickr call for each page
    $images = array();
    for ($page = 1; $page <= $pages; $page++) {
      // flickr api params
      $params = array(
        'text'          => 'Education',
        'sort'          => 'relevance',
        'safe_search'   => 1,
        'extras'        => 'owner_name,url_m,url_o',
        'page'          => $page,
        'per_page'      => $per_page
      );
      $result = $this->call('photos.search', $params);
      // create array to insert the photos
      if (!empty($result['photos']['photo'])) {
        // flickr photos
        $photos = $result['photos']['photo'];
        // loop through all flickr photos
        foreach ($photos as $photo) {
          // skip if we don't have medium or original size
          if (empty($photo['url_o']) && empty($photo['url_m'])) {
            continue;
          }
          // images array
          $images[$photo['id']] = array(
            'title'   => $photo['title'],
            'owner'   => $photo['ownername'],
            'url'     => empty($photo['url_m']) ? $photo['url_o'] : $photo['url_m'],
            'width'   => empty($photo['width_m']) ? $photo['width_o'] : $photo['width_m'],
            'height'  => empty($photo['height_m']) ? $photo['height_o'] : $photo['height_m'],
          );
        }
      }
    }
    // add images to the database
    Image::insert($images);
  }

  // simple helper function to call the flickr API
  private function call($method = NULL, $params = array())
  {
    // flickr api key
    $api_key = Config::get('flickr.api_key', NULL);
    if (empty($api_key)) {
      die('You should set the Flickr API Key in the config file "app/config/flickr.php".');
    }

    // calls the specified api method with parameters
    if (is_null($method)) {
      die('Flickr API method not defined.');
    }

    // parameters for the call
    $params['method'] = 'flickr.' . $method;
    $params['api_key'] = $api_key;
    $params['format'] = 'php_serial';

    // encodes the parameters in the API url
    foreach ($params as $key => $value) {
      $encoded_params[] = urlencode($key) . '=' . urlencode($value);
    }

    // API url with the parameters
    $url = "https://api.flickr.com/services/rest/?" . implode('&', $encoded_params);

    // calls the flickr API
    $response = cURL::get($url);

    // returns the response unserialized or FALSE if it fails
    return unserialize($response);
  }

}