$(window).ready(function () {
    var ratio = 10 / 10, $div = $('.inst-img');
    $div.height($div.width() * ratio);
    $(window).bind('resize', function() { $div.height($div.width() * ratio); });


$(window).ready(function () {
    var ratio = 5 / 10, $div = $('#liste_articles li');
    $div.height($div.width() * ratio);
    $(window).bind('resize', function() { $div.height($div.width() * ratio); });
});

$('#open').click(function(){
    $(this).toggleClass('anim_boutton');
    $('aside').toggleClass('ouvert');
    
    if($(this).is(":contains('Bad')")){
        $(this).children(".bar").hide();
    }
});

$('#avis').click(function(){
    $(this).addClass('current');
    
    $('#partager').removeClass('current');
    
    $('#avis-list').removeClass('move-1');
    $('#commenter').removeClass('move-2');
});

$('#partager').click(function(){
    $(this).addClass('current');
    $('#avis').removeClass('current');
    
    $('#avis-list').addClass('move-1');
    $('#commenter').addClass('move-2');
});

$('#back-fleche').mouseenter(function(){
    $(this).html('<div class="flch flch-gauche"></div>Retour');
}); $('#back-fleche').mouseleave(function(){
    $(this).html('<div class="flch flch-gauche"></div>Hub');
});
    
  
var jobCount = $('#list .in').length;
  $('.list-count').text(jobCount + ' items');
    
  
  $("#search").keyup(function () {
     //$(this).addClass('hidden');
  
    var searchTerm = $("#search").val();
    var listItem = $('#liste_article').children('li');
  
    
    var searchSplit = searchTerm.replace(/ /g, "'):containsi('")
    
      //extends :contains to be case insensitive
  $.extend($.expr[':'], {
  'containsi': function(elem, i, match, array)
  {
    return (elem.textContent || elem.innerText || '').toLowerCase()
    .indexOf((match[3] || "").toLowerCase()) >= 0;
  }
});
    
    
    $("#liste_artile li").not(":containsi('" + searchSplit + "')").each(function(e)   {
      $(this).addClass('hiding out').removeClass('in');
      setTimeout(function() {
          $('.out').addClass('hidden');
        }, 300);
    });
    
    $("#liste_article li:containsi('" + searchSplit + "')").each(function(e) {
      $(this).removeClass('hidden out').addClass('in');
      setTimeout(function() {
          $('.in').removeClass('hiding');
        }, 1);
    });
    
  
      var jobCount = $('#liste_article .in').length;
    $('.list-count').text(jobCount + ' items');
    
    //shows empty state text when no jobs found
    if(jobCount == '0') {
      $('#liste_article').addClass('empty');
    }
    else {
      $('#liste_article').removeClass('empty');
    }
    
  });
    
});