(function() {
	// requestAnimationFrame crossbrowser support
	var requestAnimationFrame = window.requestAnimationFrame || window.mozRequestAnimationFrame || window.webkitRequestAnimationFrame || window.msRequestAnimationFrame;
	window.requestAnimationFrame = requestAnimationFrame;
});

if(!window.jQuery){
   var script = document.createElement('script');
   script.type = "text/javascript";
   script.src = "https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js";
   document.getElementsByTagName('head')[0].appendChild(script);
   script.onload = qmatchup_load;
}
else{
	$(document).ready(qmatchup_load);
}
function qmatchup_load(){
	var $ = jQuery,
		$window = $(window),
		window_width = window.innerWidth,
		window_height = $window.height(),
		update_functions = [],
		resize_timeout = '',
		current_window_width = 0,

		$body = $(document.body),
		uid = $('#qmatchup-init').data('uid'),
		$iframe = $(document.createElement('iframe')),
		$toggle_popup = $('<a href="#" id="qmatchup-toggle-popup"><div class="qmatchup-toggle-open-icon"></div><div class="qmatchup-toggle-close-icon"></div></a>'),
		$close_popup = $('<a href="#" id="qmatchup-close-popup"></a>');

    var methods = {

		// INIT
        init : function(){

			// Add iframe and buttons styles
			$body.append('<style>#qmatchup-close-popup,#qmatchup-toggle-popup,#qmatchup-toggle-popup:hover{width:60px;height:60px;overflow:hidden;display:block;position:fixed;z-index:997;right:20px;bottom:20px;box-sizing:border-box;margin:0;padding:0;outline:0;border:none;border-radius:50%;background-color:#1F8CEB;text-decoration:none;cursor:pointer;-webkit-transform-origin:center;-ms-transform-origin:center;transform-origin:center;-webkit-backface-visibility:hidden;backface-visibility:hidden}.qmatchup-toggle-close-icon,.qmatchup-toggle-open-icon{width:100%;height:100%;position:absolute;top:0;left:0;box-sizing:border-box;background-position:center;background-repeat:no-repeat;transition:transform .16s linear,opacity .08s linear,-webkit-transform .16s linear}.qmatchup-toggle-open-icon{background-image:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAkCAYAAADo6zjiAAAAAXNSR0IArs4c6QAAAr5JREFUWAntVz2MEkEUluXnTuGQwxAwV2ihMRcLicTSaywwdhZezsbKmtrKikQajN0lhsLC2JlcYujBGEJBIZ5iAwnEkJCYEORfWBa/b8Pc7S23d7kTttqXPObtvDfv++bN7DJju3Aotpkp2kPPYq3pLJ1o1UeCSv1+f1tRlO/T6VSGLlpk5N4HxhNiQQ8mqoJ3Op3tRSMa5QPWERIk4JxMJvtGAxbdD6xvxGQV1NnzASBdtA6oGSLbbDYPgMZcCwpbs8CJRywVWxA42BD0miQqpiBgEuY8jEXAqoBVAasCVgWsChhWQJblOs4I8vzfx9l7cABpGI06lsB4PC47nc576XT64Wg0+mE0+LR+5KkVCoWnDofjLuyKUTxJXNIeu8D4TyaTuY9+XygUCpRKpec4TH5mRbRxBrYyHA4L5XI5FolEriLHejab3WJObTwxoWoB5gjMAv92u93k7u7uBgIvQ6/EYrGbxWLxWb1ef9VsNt+32+096CfYHxqNxmsSTSQStxkL9aVSqWvI8Qb5Rlpw2vCfSkAdg6N0ezAYvK1UKg/C4bAPA0mGrV+n6/RFo1F/tVp9hDHvMLanBxbPiFUJiEPpKhw9dJ4oiGmhlF+xQX9Cf8PuYIAdsoZ1DkE3Yd/BgdN9YiI4ZzFDQWAFyX5JksTSmSKCgHgLpr1eb88UZB0ICXBDKPF4/CV27xedf+mPXAKxDC7Yq/l8fisYDN5Cic5zT7B7vd5Nt9sdcblcN5BPVHhuImIJBAEGMJjXJXFpoO+sIiYjJZPJjR1IIBDYwUftuj6RICD6BRGSIAESOY+yiivQi1BevXwejyeQy+Uet1qtj3gtB/rXEDFHRBD5n5aTEBMhIZJZg/r5IavVai/weefllP0SgZYh2ryCkCBlB6ACHUFlbeAyiDCnwGBLJREKSSjCqfYs+edYrH/16LJPC4LGtQAAAABJRU5ErkJggg==);background-size:32px auto;opacity:1;-webkit-transform:rotate(0) scale(1);-ms-transform:rotate(0) scale(1);transform:rotate(0) scale(1)}#qmatchup-toggle-popup.active .qmatchup-toggle-open-icon{opacity:0;-webkit-transform:rotate(30deg) scale(0);-ms-transform:rotate(30deg) scale(0);transform:rotate(30deg) scale(0)}#qmatchup-close-popup,.qmatchup-toggle-close-icon{background-image:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA4AAAAOBAMAAADtZjDiAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAAG1BMVEUAAAD///////////////////////////8AAADr8xjQAAAAB3RSTlMAM7cPx7jIAE21/gAAAAFiS0dEAIgFHUgAAAAJcEhZcwAACxIAAAsSAdLdfvwAAABESURBVAjXYxAyYGBgYFZkUHcG0ialDCYlBgzM7slA7MxgUgaUNCkzdgfJMbunlIDUMpiUg7hwGiYOVQfTBzMHZi7UHgCB3RAZ7HszogAAAABJRU5ErkJggg==);background-size:14px 14px}#qmatchup-close-popup{width:40px;height:40px;display:none;position:absolute;z-index:999;top:10px;right:10px;background-position:center;background-repeat:no-repeat}.qmatchup-toggle-close-icon{opacity:0;-webkit-transform:rotate(-30deg);-ms-transform:rotate(-30deg);transform:rotate(-30deg)}#qmatchup-toggle-popup.active .qmatchup-toggle-close-icon{opacity:1;-webkit-transform:rotate(0);-ms-transform:rotate(0);transform:rotate(0)}#qmatchup-iframe{width:370px;height:278px;overflow:hidden;display:none;position:fixed;z-index:998;bottom:80px;right:20px;box-sizing:border-box;box-shadow:rgba(0,0,0,.1) 0 5px 20px;border-radius:8px;transition:height .2s,bottom .35s}@media (max-width:400px){#qmatchup-iframe{width:100vw;height:100vh!important;top:0;bottom:auto!important;right:0;box-shadow:none;border-radius:0;border-top:20px solid #fff;transition:none}#qmatchup-iframe.active+#qmatchup-close-popup{display:block}}</style>');

			// Add iframe resizer
			var resizer = document.createElement('script');
			resizer.type = "text/javascript";
			resizer.src = "http://www.qloudid.com/api/static/html/intercom/js/iframeResizer.min.js";
			document.getElementsByTagName('head')[0].appendChild(resizer);
			
			// Iframe init
			$iframe
				.attr({
					//src : 'intercom-inner.html?uid=' + uid,
					src : 'http://www.qloudid.com/api/static/html/intercom/intercom-inner.html',
					id : 'qmatchup-iframe',
					frameBorder : '0',
					scrolling : 'no',
				})
				.appendTo($body);
			
			// Toggle button
            $toggle_popup
                .off('click')
                .on('click', function(){
					var $this = $(this);

					if($this.hasClass('active')){
						methods.iframe_hide($this);
					}
					else{
						methods.iframe_show($this);
					}

                    return false;
				})
				.appendTo($body);
			
			// Mobile close button
			$close_popup
				.off('click')
				.on('click', function(){
					$toggle_popup.trigger('click');
					return false;
				})
				.insertAfter($iframe);
			

			
			// on window resize event
			$window.on('resize', function(){
				methods.screen_resize();
				return false;
			});
		},
		
		// show iframe
		iframe_show : function($trigger){
			if($trigger){
				$trigger.addClass('active');
			}
			$iframe
				.addClass('active')
				.fadeIn(350);
			
			if(window_width < 400){
				$iframe.attr('scrolling', 'yes');
			}
			else{
				$iframe
					.attr('scrolling', 'no')
					.css({
						bottom: '100px'
					})
					.iFrameResize({
						//log:true,
						checkOrigin: false,
						closedCallback: function () {},
					});
			}
		},
		
		// hide iframe
		iframe_hide : function($trigger){
			if($trigger){
				$trigger.removeClass('active');
			}
			$iframe
				.removeClass('active')
				.fadeOut(350);
			
			if(!window_width < 400){
				$iframe.css({
					bottom: '80px'
				});
			}
		},


		// screen resize check
		screen_resize : function(){
			clearTimeout(resize_timeout);
			resize_timeout = setTimeout(function(){
				current_window_width = window.innerWidth;
				if(current_window_width != window_width){
					window_width = current_window_width;
					window_height = $window.height();
					methods.update();
				}
			}, 300);
		},
		// update on screen resize
		update : function(){
			for(var i = 0, iL = update_functions.length; i < iL; i++){
				update_functions[i][0](update_functions[i][1]);
			}
		},

    }
    methods.init();
}
