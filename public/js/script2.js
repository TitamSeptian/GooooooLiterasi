$(document).ready(function ($) {
	let masterHeader = $('#header-title');
	let master = $('div.lc-body div.lc-view');
	let body1 = $('#first');
	let body2 = $('#second');
	let body3 = $('#third');
	let body4 = $('#fourth');
	let content_1 = $('#first').html();
	let content_2 = $('#second').html();
	let content_3 = $('#third').html();
	let content_4 = $('#fourth').html();
	body1.hide();
	body2.hide();
	body3.hide();
	body4.hide();
	body1.fadeIn();
	// master.html(content_1);
	// Jenis Buku
	// Kategori Buku
	// Tebal Buku
	// Data Buku


	$('#nx-1').on('click', function () {
		// alert('okokok')
		masterHeader.html('Kategori Buku');
		body1.hide();
		body2.fadeIn();
	});

	$('#prv-1').on('click', function () {
		// alert('okokok');
		masterHeader.html('Jenis Buku');
		body2.hide();
		body1.fadeIn();
	});
	$('#nx-2').on('click', function () {
		// alert('okokok')
		masterHeader.html('Tebal Buku')
		body2.hide();
		body3.fadeIn();
	});

	$('#prv-2').on('click', function () {
		// alert('okokok');
		masterHeader.html('Kategori Buku');
		body3.hide();
		body2.fadeIn();
	});
	$('#nx-3').on('click', function () {
		// alert('okokok')
		masterHeader.html('Data Buku (Opsional)')
		body3.hide();
		body4.fadeIn();
	});

	$('#prv-3').on('click', function () {
		// alert('okokok');
		masterHeader.html('Tebal Buku');
		body4.hide();
		body3.fadeIn();
	});

	$("#minimal").keyup(function () {
		// alert('okokok');
		let setMin = $("#minimal").val();
		$("#maksimal").attr('min', setMin);
	});

	$("#tmin").keyup(function () {
		// alert('okokok');
		let setMin = $("#tmin").val();
		$("#tmax").attr('min', setMin);
	});

	$("#hawal").keyup(function () {
		// alert('okokok');
		let setMin = $("#hawal").val();
		$("#hakhir").attr('min', setMin);
	});



});

function openNav() {
	$("#mySidenav").css({
		width: '270px',
	});
}

function closeNav() {
	$("#mySidenav").css({
		width: '0',
	});
}

function load() {
	setTimeout(() => {
		$('.preloader').fadeOut();
	}, 1000);
}