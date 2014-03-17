@if ( ! empty($images))
  @if ($images->count() > 0)
  <div class="masonry col-lg-12">
    <div class="row">
      @foreach ($images as $image)
      <div class="post-box col-xs-12 col-sm-6 col-md-4 col-lg-3">
        <div class="thumbnail">
          <img class="img-responsive" src="{{ $image->url }}">
          <div class="caption">
            <h3>{{ $image->title }}</h3>
            <p>by {{ $image->owner }}</p>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">{{ $images->appends(Request::only('search'))->links() }}</div>
  </div>
  {{ HTML::script('assets/js/gallery.js') }}
  @else
    No images to display
  @endif
@else
  No images to display
@endif
