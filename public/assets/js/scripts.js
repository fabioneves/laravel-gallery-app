$(document).ready(function () {
  $('#search_form').bind("keyup keypress", function(e) {
    var code = e.keyCode || e.which;
    if (code  == 13) {
      e.preventDefault();
      search_submit();
      return false;
    }
  });
  $('#search').click(function () {
    search_submit();
  });
});

function search_submit() {
  $('#gallery').hide();
  $.post('/gallery?search=1', $("#search_form").serialize()).success(function(data) {
    $('#gallery').html(data);
    $('#loading').hide();
    $('#gallery').fadeIn();
  });
}