<?php

class GalleryController extends BaseController
{

  public function index()
  {
    $page = Route::input('page', 1);
    return View::make('index', array('page' => $page));
  }

  // pulls images from the database
  public function gallery($filter = NULL, $post = FALSE)
  {
    // number of items per page
    $items_per_page = 30;
    // sets the filter that's in the cache
    if (Request::get('search')) {
      $filter = Cache::get('search_filter', NULL);
    }
    // if the filter is not empty use it
    $images = array();
    if ( ! empty($filter['search_type']) && ! empty($filter['search_value'])) {
      // where operator according to search type
      switch ($filter['search_type']) {
        case 'width':
        case 'height':
        case 'url':
          $operator = '=';
          break;
        case 'owner':
        case 'title':
          $operator = 'like';
          $filter['search_value'] = '%' . $filter['search_value'] . '%';
          break;
        default:
      }
      // query
      $images = Image::where($filter['search_type'], $operator, $filter['search_value'])->paginate($items_per_page);
    }
    // default query
    elseif ( ! Request::isMethod('post')) {
      $images = Image::paginate($items_per_page);
    }
    // return the gallery
    return View::make('gallery', array('images' => $images));
  }

  public function search($filter = NULL)
  {
    // validation rules
    $rules = array(
      'search_value'  => 'required',
      'search_type'   => 'required|in:title,owner,width,height,url'
    );
    // builds the validator
    $validator = Validator::make(Input::all(), $rules);
    // forgets the current search filter
    Cache::forget('search_filter');
    // check if validation passes
    if ( ! $validator->fails()) {
      // search filter from the input
      $filter = array(
        'search_type'     => Input::get('search_type'),
        'search_value'    => Input::get('search_value')
      );
      // caches our search filter
      Cache::forever('search_filter', $filter);
    }
    // return the gallery
    return $this->gallery($filter);
  }

}