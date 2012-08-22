$(document).ready(function () {
	$(".sidebar-first .inner h2").click(function (){
		$(this).parent().find(".content").toggle("slow")
	});

	// shahar, 28/03/2012
	$(".sidebar-last .inner h2").click(function (){
		$(this).parent().find(".content").toggle("slow")
	});

	// shahar, 28/03/2012
	$(document).ready(function () {
		$(".booktree li+ul").prev(0).css('list-style-image', 'url("/sites/all/themes/beehive_origins/images/book-closed-plus-rtl.gif")');
		$(".booktree li+ul").hide();

		/* disable link on current page.
		it's a bug workaround - 
		since there's no need in a href on current page to itself. */
		$(".booktree a.active").removeAttr('href');

		$(".booktree li+ul").prev(0).click(function (){ 
			var son=$(this).next();
			if(son.is(":visible")) {
				$(this).css('list-style-image', 'url("/sites/all/themes/beehive_origins/images/book-closed-plus-rtl.gif")');
				//console.log('hidden');
			} else {
				$(this).css('list-style-image', 'url("/sites/all/themes/beehive_origins/images/book-open-minus-rtl.gif")');
				//console.log('open');
			}
			son.toggle( "slow" );
		});
	});


/*	$(".booktree li+ul").prev(0).click(function (){
		$(this).parent().find("ul").toggle( "slow" )
	});
*/

/*	$('li.booktree:has(>ul)').click(function(){
 
    	if(false == $(this).next().is(':visible')) {
            $('li.booktree > ul:first').slideUp(300);
        }
        $(this).next().slideToggle(300);
    });
    $('li.booktree > ul:eq(0)').show();
*/
                      
	// $("#block-boxes-homepage_info_box").dialog({width:'700px', modal:true,closeText:'סגירה'});
	// $(".ui-widget-overlay").click(function (){
	//  	$("#block-boxes-homepage_info_box").dialog("destroy");
	// });
});
