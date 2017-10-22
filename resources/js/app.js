/////////////////////////////////////////////////
// OLD
// ///////////////////////////////////////////////
//
//
$(function () {

  Portada.visiblePosts = 10;
  Portada.feeds = [];

  if ($('body').hasClass('page-settings')) {
    if (undefined == store.get('sources')) {
      console.log('im undefined', store, store.get('sources'));
      var sources = [];
      $('.chk-medium').each(function(){
        sources.push($(this).data('medium-id'));
      });
      store.set('sources', sources);
    };
  }

  if ($('body').hasClass('page-settings')) {
    Portada.loadSettings();
  }

  $('.js-load-more').on('click', function () {
    Portada.visiblePosts = Portada.visiblePosts + 10;
    $('.news-item:lt(' + Portada.visiblePosts + ')').fadeIn();

    if (Portada.visiblePosts >= 100) {
      $(this).text('Eso es todo. Salí a jugar :)');
    }
  });

  if ($('body').hasClass('page-home')) {
    $.ajax({
      url: '/feed',
      type: 'get',
      data: {
        sources: store.get('sources')
      },
      success: function (data) {
        Portada.feeds = data;
        var template = $('#template').html();
        Mustache.parse(template);
        var rendered = Mustache.render(template, data);
        $('.news-list').html(rendered);
        $('.js-load-more').addClass('show');
        if (store.get('openLinksInNewWindow')) {
          $('.js-news-item-link').attr('target', '_blank');
        }
      }
    });
  }

  // Settings
  $('input[type="checkbox"]').change(function() {
    var $this = $(this);
    $('.notification').removeClass('notification--show');

    Portada.saveSettings();

    // Trigger notification
    Portada.saveTimer = setTimeout ( function(){
      $('.notification').removeClass('notification--show').addClass('notification--show');
    }, 400 );

  });


}); // End Ready

Portada.loadSettings = function(){
  for (var i = store.get('sources').length - 1; i >= 0; i--) {
    $('#chk-medium-' + store.get('sources')[i]).prop('checked', true);
    $('.js-chk-open-new-window').attr('checked', true);
  };

  if (store.get('openLinksInNewWindow') == true) {
    $('.js-chk-open-new-window').attr('checked', true);
  }
  else{
    $('.js-chk-open-new-window').prop('checked', false);
    store.set('openLinksInNewWindow', false);
  }

};

Portada.saveSettings = function(){

  // Save Sources
  var sources = [];

  $('.chk-medium').each(function(index, val) {
     if ($(this).prop('checked')) {
      sources.push($(this).data('medium-id'));
     }
  });

  store.set('sources', sources);

  // Save Target=Blank
  store.set('openLinksInNewWindow', $('.js-chk-open-new-window').prop('checked'));

}
