$(document).bind("mobileinit", function(){
  $('.ui-page > .ui-header').live('tap', function() {
    $.mobile.changePage('/')
  })
}).ready(function() {
  $('.rotating-banner').bronyconRotator();

  $('.rotating-banner').live('swipeleft', function() {
    $('.rotating-banner').bronyconRotator('left');
  }).live('swiperight', function() {
    $('.rotating-banner').bronyconRotator('right');
  });
})