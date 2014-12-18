
$(document).ready(function(){/* off-canvas sidebar toggle */

$('#Login').click(function() {
  $("#loginModal").css("visibility", "visible");
});

$('#Registro').click(function() {
  $("#registroModal").css("visibility", "visible");
});

$('.close').click(function() {
  $("#loginModal").css("visibility", "hidden");
  $("#registroModal").css("visibility", "hidden");
});

$('.container').click(function() {
  $("#loginModal").css("visibility", "hidden");
  $("#registroModal").css("visibility", "hidden");
});

$('[data-toggle=offcanvas]').click(function() {
  $(this).toggleClass('visible-xs text-center');
  $(this).find('i').toggleClass('glyphicon-chevron-right glyphicon-chevron-left');
  $('.row-offcanvas').toggleClass('active');
  $('#lg-menu').toggleClass('hidden-xs').toggleClass('visible-xs');
  $('#xs-menu').toggleClass('visible-xs').toggleClass('hidden-xs');
  $('#btnShow').toggle();
});
});
