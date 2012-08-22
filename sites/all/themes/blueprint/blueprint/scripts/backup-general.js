// generic JS fixes
//alert("ok");
// various JavaScript object.
var Blueprint = {};

// jump to the value in a select drop down
Blueprint.go = function(e) {
  var destination = e.options[e.selectedIndex].value;
  if (destination && destination != 0) location.href = destination;
};

// natn, 28/5/2012
	$(".col-left h3").click(function (){
		$(this).parent().find(".content").toggle("slow")
	});
	
  // $("#block-views-facebook_status_all-block_1 div.facebook-status-item").hover(function (){
	//	$(this).attr("style" , "height: 100%;");
//	});
function() {
$(".front object").attr("width","310");
}
