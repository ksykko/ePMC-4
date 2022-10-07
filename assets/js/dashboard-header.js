// ---------Responsive-navbar-active-animation-----------
function test(){
	var tabsNewAnim = $('#navbarSupportedContent');
	var selectorNewAnim = $('#navbarSupportedContent').find('li').length;
	var activeItemNewAnim = tabsNewAnim.find('.active');
	var activeWidthNewAnimHeight = activeItemNewAnim.innerHeight();
	var activeWidthNewAnimWidth = activeItemNewAnim.innerWidth();
	var itemPosNewAnimTop = activeItemNewAnim.position();
	var itemPosNewAnimLeft = activeItemNewAnim.position();
	$(".hori-selector").css({
		"top":itemPosNewAnimTop.top + "px", 
		"left":itemPosNewAnimLeft.left + "px",
		"height": activeWidthNewAnimHeight + "px",
		"width": activeWidthNewAnimWidth + "px"
	});
	$("#navbarSupportedContent").on("click","li",function(e){
		$('#navbarSupportedContent ul li').removeClass("active");
		$(this).addClass('active');
		var activeWidthNewAnimHeight = $(this).innerHeight();
		var activeWidthNewAnimWidth = $(this).innerWidth();
		var itemPosNewAnimTop = $(this).position();
		var itemPosNewAnimLeft = $(this).position();
		$(".hori-selector").css({
			"top":itemPosNewAnimTop.top + "px", 
			"left":itemPosNewAnimLeft.left + "px",
			"height": activeWidthNewAnimHeight + "px",
			"width": activeWidthNewAnimWidth + "px"
		});
	});
}
$(document).ready(function(){
	setTimeout(function(){ test(); });
});
$(window).on('resize', function(){
	setTimeout(function(){ test(); }, 500);
});
$(".navbar-toggler").click(function(){
	$(".navbar-collapse").slideToggle(300);
	setTimeout(function(){ test(); });
});

// ---------Inventory Product View-----------
$(document).ready(function(){
	// get View Product
	$('.product-view-modal-btn').on('click',function(){
		// get data from button edit
		const id = $(this).data('id');
		const prod_name = $(this).data('prod_name');
		const prod_dosage = $(this).data('prod_dosage');
		const quantity = $(this).data('quantity');
		const stock_in = $(this).data('stock_in');
		const stock_out = $(this).data('stock_out');
		const prod_desc = $(this).data('prod_desc');

		// Set data to Form Edit
		$('.item_id').val(id);
		$('.prod_name').val(prod_name);
		$('.prod_dosage').val(prod_dosage);
		$('.quantity').val(quantity);
		$('.stock_in').val(stock_in);
		$('.stock_out').val(stock_out);
		$('.prod_desc').val(prod_desc);

		// Call Modal Edit
		$('#product-view-modal').modal('show');
		var name = $(this).data('prod_name');
		$("#title-prod-name").html(name);
	});

	// get Edit Product
	$('.product-edit-modal-btn').on('click',function(){
		// get data from button edit
		const id = $(this).data('id');
		const prod_name = $(this).data('prod_name');
		const prod_dosage = $(this).data('prod_dosage');
		const quantity = $(this).data('quantity');
		const stock_in = $(this).data('stock_in');
		const stock_out = $(this).data('stock_out');
		const prod_desc = $(this).data('prod_desc');

		// Set data to Form Edit
		$('.item_id').val(id);
		$('.prod_name').val(prod_name);
		$('.prod_dosage').val(prod_dosage);
		$('.quantity').val(quantity);
		$('.stock_in').val(stock_in);
		$('.stock_out').val(stock_out);
		$('.prod_desc').val(prod_desc);

		// Call Modal Edit
		$('#product-edit-modal').modal('show');
		var name = $(this).data('prod_name');
		$("#title-prod-name-edit").html(name);
	});
});

// --------------add active class-on another-page move----------
// jQuery(document).ready(function($){
// 	// Get current path and find target link
// 	var path = window.location.pathname;
// 	// Account for home page with empty path
// 	if ( path == '' ) {
// 		path = 'Admin/index';
// 	}

// 	var target = $('#navbarSupportedContent ul li a[href="'+path+'"]');
// 	// Add active class to target link
// 	target.parent().addClass('active');
// });




// Add active class on another page linked
// ==========================================
// $(window).on('load',function () {
//     var current = location.pathname;
//     console.log(current);
//     $('#navbarSupportedContent ul li a').each(function(){
//         var $this = $(this);
//         // if the current path is like this link, make it active
//         if($this.attr('href').indexOf(current) !== -1){
//             $this.parent().addClass('active');
//             $this.parents('.menu-submenu').addClass('show-dropdown');
//             $this.parents('.menu-submenu').parent().addClass('active');
//         }else{
//             $this.parent().removeClass('active');
//         }
//     })
// });