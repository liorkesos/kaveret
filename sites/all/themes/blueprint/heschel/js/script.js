$(document).ready(function () {

	//alert("ok-t");
	
	
	$(".sidebar-first .inner h2").click(function (){
		$(this).parent().find(".content").toggle("slow")
	});

	// shahar, 28/03/2012
	$(".sidebar-last .inner h2").click(function (){
		$(this).parent().find(".content").toggle("slow")
	});




});
