/*!
 * jquery.alert
 *
 * @version 1.0
 *
 * @author Javier Sanahuja Liebana <javi_lcs16@hotmail.com>
 *
 * https://github.com/BanNsS1/jquery.alert/
 *
 */
 (function( $ ){
	$.createAlert = function(options){
		$(options.attachAfter).after(
			"<div id='alert_backdrop'></div>"+
			"<div id='alert_dialog'>"+
				"<div id='alert_title'></div>"+
				"<div id='alert_actions'>"+
					"<button id='alert_confirm'></div>"+
				"</div>"+
			"</div>"
		);
		
		$('#alert_title').html(options.title);
		$('#alert_confirm').html(options.confirmText);
		$('#alert_confirm').addClass(options.confirmStyle);
		
		if(typeof options.callback !== "undefined" && options.callback !== null)
			$('#alert_confirm').bind("click", options.callback);
			
		$('#alert_confirm').click($.hideAlert);
	};
	$.showAlert = function(){
		$('#alert_backdrop').slideDown();
		$('#alert_dialog').delay(100).fadeIn();
	};
	
	$.hideAlert = function(){
		$('#alert_backdrop').remove();
		$('#alert_dialog').remove();
	};
		
})( jQuery );
