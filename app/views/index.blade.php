<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <title>Gallery</title>
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
  {{ HTML::style('assets/css/styles.css') }}
</head>

<body>

<div class="container-fluid">
  <div class="row">
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4"><h1>Gallery</h1></div>
    <div class="col-xs-12 col-sm-6 col-md-8 col-lg-8 text-right">
      <form class="form-inline" role="form" id="search_form" method="POST">
        {{ Form::token() }}
        <div class="form-group">
          <input type="text" class="form-control" name="search_value" placeholder="search">
        </div>
        <div class="form-group">
          <select class="form-control" name="search_type">
            <option value="title">title</option>
            <option value="owner">owner</option>
            <option value="width">width</option>
            <option value="height">height</option>
            <option value="url">url</option>
          </select>
        </div>
        <input type="button" id="search" type="submit" class="btn btn-primary" value="Search">
      </form>
    </div>
  </div>
  <div id="gallery" style="display:none;"></div>
  <div id="loading" class="row" style="display:none;">
    <div class="loader">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
</div>

<!-- scripts -->
{{ HTML::script('assets/js/jquery.min.js') }}
{{ HTML::script('assets/js/mansonry.min.js') }}
{{ HTML::script('assets/js/imagesloaded.min.js') }}
{{ HTML::script('assets/js/scripts.js') }}
<script>
  $.ajaxSetup({cache: false});
  $('#gallery').load('/gallery?page={{ $page }}');
</script>

</body>
</html>
