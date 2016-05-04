$('img').addClass('img-responsive');
var url = window.location.pathname;
$('.navbar-nav a[href="'+url+'"]').parent().addClass('active');

/*
$('._fs__nav-item a[href="'+url+'"]').parent().addClass('active');
$('._ncb__nav a[href="'+url+'"]').parent().addClass('active');
$('._srcb__nav a[href="'+url+'"]').parent().addClass('active');

$('#getModal').click(function(){
	$('#modal-form-enter').modal('hide');
	setTimeout(function() {$('#modal-form-reg').modal('show');}, 500)
	return false;
});
$('#getModal2').click(function(){
	$('#modal-form-calc').modal('hide');
	setTimeout(function() {$('#modal-form-enter').modal('show');}, 500)
	return false;
});
$('#getModal3').click(function(){
	$('#modal-form-calc').modal('hide');
	setTimeout(function() {$('#modal-form-cons').modal('show');}, 500)
	return false;
});

if (device.mobile() || device.tablet()) {
	$('.navbar').addClass('navbar-fixed-top');
} else {
	$('.navbar').removeClass('navbar-fixed-top');
}
$("nav.navbar-fixed-top").autoHidingNavbar();
*/