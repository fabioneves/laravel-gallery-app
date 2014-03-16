<?php

class Image extends Eloquent {
  protected $fillable = array('url', 'width', 'height', 'title', 'owner');
  public $timestamps = false;
}