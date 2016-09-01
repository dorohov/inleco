$('img').addClass('img-responsive');
var url = window.location.pathname;
$('.navbar-nav a[href="'+url+'"]').parent().addClass('active'); 
$('._czr__in__modal-nav a[href="'+url+'"]').parent().addClass('active'); 
$('._fs__navbar a[href="'+url+'"]').parent().addClass('active'); 
$('._czr__ip-carousel .item').eq(0).addClass('active'); 
$('._czr__pips__carousel .item').eq(0).addClass('active'); 
$('._czr__pipa__carousel .item').eq(0).addClass('active'); 
$('._czr__modal-gallery .item').eq(0).addClass('active'); 
$('#getModal').click(function(){
    $('#modal-timetable').modal('hide');
    setTimeout(function() {$('#modal-timetable-reviews').modal('show');}, 500)
    return false;
});
$('#getModal2').click(function(){
    $('#modal-timetable-reviews').modal('hide');
    setTimeout(function() {$('#modal-timetable').modal('show');}, 500)
    return false;
});
$('._czr__anim-list .anim').hover(
  function(){
    $(this).addClass('in').removeClass('out');
  },
  function(){   
      $(this).removeClass('in').addClass('out');
  }
);
$('._czr__anim-indic .anim').hover(
  function(){
    $(this).addClass('in').removeClass('out');
  },
  function(){   
      $(this).removeClass('in').addClass('out');
  }
);
$('.modal').on('shown.bs.modal', function (event) {
	$('.scroll-container').trigger('init');
})