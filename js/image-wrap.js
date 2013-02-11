$(document).ready(function(){

  $(".entry-content img").load(function() {
    $(this).wrap(function(){
      return '<span class="image-wrap glowing ' + $(this).attr('class') + '" style="position:relative; display:inline-block; background:url(' + $(this).attr('src') + ') no-repeat center center; width: ' + $(this).width() + 'px; height: ' + $(this).height() + 'px;" />';
    });
    $(this).css("opacity","0");
  });

});
