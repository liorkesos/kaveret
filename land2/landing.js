/************************************************
 * 
 *		hakaveret - like a bee
 *		landing pages
 * 
 *		1/12/2012
 * 
 ************************************************/
var flower=0;
var colors=[];
colors[0]='yellow';
colors[1]='red';
colors[2]='blue';
colors[3]='orange';

function showhide(divid, action) {
	// action: show, hide, switch
	if(action===undefined) action='switch';

	//log ('showhide: #' + divid + ' -> ' + action);

	var divid = '#' + divid;
	switch (action) {
		case 'hide':
			$(divid).fadeOut().hide("slow");
			break;
		case 'show':
			$(divid).show("fast");
			break;
		case 'switch':
			if( $(divid).is(':hidden') )
				$(divid).show("fast");
			else
				$(divid).hide("slow");
			break;

		default:
			break;
	}
}

function reset_email(arg) {
	$('#email').css('color', 'black');
	$('#email').css('background-color', 'white');
	$('#email').css('font-style', 'normal');
	$('#email').select();
	if(arg==1) 	$('#wrongemail').hide('slow');
}

function validate_email(email) {
	var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
	if( !emailReg.test( email ) ) {
		return false;
	} else {
		return true;
	}
}

function log(s) {
	//if (console) console.log(s); 
}

function push_bg(bg) {
	var iterat;
	var i;
	//log('push_bg("'+bg+'")');
	for (iterat in colors) {
		col = colors[iterat];
		bgid = '#kaveretbg-'+col;
		i=$(bgid);
		if (bg==col) i.css('z-index', -1);
		else i.css('z-index', -2);
	}
}

function change(towhat) {
	flower=towhat;
	log ('active flower1: ' + flower);
	switch(towhat){

		case 'none':
			push_bg('orange');
			showhide('about', 'hide');
			showhide('left-hive', 'hide');
			showhide('right-hive', 'hide');
			showhide('top-hive', 'hide');
			showhide('join-form', 'hide');
			showhide('inner-big', 'show');
			break;
		
		case 'top':
			showhide('top-hive', 'show');
			showhide('left-hive', 'hide');
			showhide('right-hive', 'hide');
			push_bg('yellow');
			showhide('join-form', 'hide');
			showhide('about', 'hide');
			showhide('inner-big', 'hide');
			break;
		case 'left':
			showhide('left-hive', 'show');
			showhide('top-hive', 'hide');
			showhide('right-hive', 'hide');
			push_bg('red');
			showhide('join-form', 'hide');
			showhide('about', 'hide');
			showhide('inner-big', 'hide');
			break;
		case 'right':
			showhide('right-hive', 'show');
			showhide('left-hive', 'hide');
			showhide('top-hive', 'hide');
			push_bg('blue');
			showhide('join-form', 'hide');
			showhide('about', 'hide');
			showhide('inner-big', 'hide');
			break;
		case 'about':
			push_bg('orange');
			showhide('left-hive', 'hide');
			showhide('top-hive', 'hide');
			showhide('right-hive', 'hide');
			showhide('join-form', 'hide');
			showhide('about', 'show');
			break;
		case 'join-form':
			push_bg('orange');
			showhide('left-hive', 'hide');
			showhide('top-hive', 'hide');
			showhide('right-hive', 'hide');
			showhide('about', 'hide');
			showhide('join-form', 'show');
			break;
		default:
			break;
	}
}

function reset() {
	change('none');
}

function sendform(){
	$(document).ready( function() {
	   $form = $('#frm');
	   $form.submit(function() {
		  $.post($(this).attr('action'), $(this).serialize(), function(response){
				// do something here on success
		  },'json');
		  return false;
	   });
	});

}

function hover(n, state) {
	//log('n:', n);
	switch(n) {
		
		//temp...
		case 'inner-big':
			//showhide(n, 'hide');
			break;

		case 'inner-left':
			showhide('shadow-left', state);
			//showhide('star', state);
			$('#inner').attr('src', 'inner-'+state+'.png');
			break;
		case 'inner-top':
			showhide('shadow-top', state);
			//showhide('star', state);
			$('#inner').attr('src', 'inner-'+state+'.png');
			break;
		case 'inner-right':
			showhide('shadow-right', state);
			//showhide('star', state);
			$('#inner').attr('src', 'inner-'+state+'.png');
			break;

		case 'tooltip-left':
			log('tooltip-left2 flower=' + flower);
			if (flower=='left') showhide('tooltip-left', state);
			break;
		case 'tooltip-top':
			if (flower=='top') showhide('tooltip-top', state);
			break;
		case 'tooltip-right':
			if (flower=='right') showhide('tooltip-right', state);
			break;
		case 1:
			break;
		case 2:
			break;
		case 3:
			break;
		case 4:
			//about(true);
			break;
		default:
			break;
	}
}



function fuckedupajax(msg) {
	var errmsg = 'לא פעיל זמנית. \nאנא חזרו שוב!';
	$('#frm').html("<div id='message'></div>");
	$('#message').html("<h2 class='titre'>"+errmsg+"</h2>")
		.append('<p style="color: gray;"> קוד = '+msg + '</p>')
		.hide()
		.fadeIn(1500, function() {
			//$('#message').append("<img id='checkmark' src='images/check.png' />");
		}
	);
}

function contact() {

	if (!validate()) return false;
	/* obsolete:
	this.form.submit();
	$('#frm').hide('fast');
	$('#thanks').show('fast');
	window.setTimeout( reset, 3000);
	*/

	var dataString = 'email=' + $("#email").val();
	$.ajax({
		type: "POST",
		url: "/collect.php",
		data: dataString,
		
		notmodified: function() { fuckedupajax('notmodified');},
		error: function() { fuckedupajax('error');},
		timeout: function() { fuckedupajax('timeout');},
		abort: function() { fuckedupajax('abort');},
		parsererror: function() { fuckedupajax('parsererror');},

		success: function() {
			$('#frm').html("<div id='message'></div>");
			$('#message').html("<h2 class='titre'>קיבלנו את האימייל!</h2>")
				.append("<p>להתראות בהמשך</p>")
				.hide()
				.fadeIn(1500, function() {
					//$('#message').append("<img id='checkmark' src='images/check.png' />");
				}
			);
		}
    });
    return false;
}  

function validate() {
	if( ! validate_email($('#email').val() ) ) {
		$('#wrongemail').show('fast');
		$('#email').css('background-color', 'red');
		return false;
	}
	return true;
}




/*  tweeter code */
!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");

