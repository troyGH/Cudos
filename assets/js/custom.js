$(document).ready(function(){
    $('[data-toggle="popover"]').popover();
    $('[data-toggle="tooltip"]').tooltip();
});
window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove();
    });
}, 3000);
$('.list-group-item').click(function(e){
  $('.list-group-item').removeClass("active");
  $(this).addClass("active");
});
