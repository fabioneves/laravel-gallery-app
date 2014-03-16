$(document).ready(function () {
  // masonry
  var $container = $('.masonry');
  $container.imagesLoaded(function () {
    $('#loading').hide();
    $('#gallery').fadeIn();
    $container.masonry({itemSelector: '.post-box'});
  });
  // pagination click
  $('.pagination a').on('click', function (event) {
    event.preventDefault();
    if ($(this).attr('href') != '#') {
      $('#loading').fadeIn();
      $('#gallery').hide();
      $('html body').animate({ scrollTop: 0 }, "fast");
      $('#gallery').load($(this).attr('href'));
    }
  });
});
