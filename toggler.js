var Vividly = (function () {

	var insert_high_contrast_stylesheet = function () {
		var head = document.getElementsByTagName('head')[0],
				link = document.createElement('link');

		link.id = 'vividly-stylesheet'
		link.rel = 'stylesheet';
		link.type = 'text/css';
		link.href = __high_contrast_stylesheet_url;
		link.media = 'screen';

		head.appendChild(link);
	}

	var remove_high_contrast_stylesheet = function (link) {
			link.parentNode.removeChild(link);
	}

	var set_cookie = function () {
			var expires = new Date(),
					expiresString;

			expires.setFullYear(expires.getFullYear() + 10);
			expiresString = expires.toUTCString();

			document.cookie = 'vividly-plugin-cookie=on; path=/; expires=' + expiresString;
	}

	var read_cookie = function () {
			return document.cookie.replace(/(?:(?:^|.*;\s*)vividly-plugin-cookie\s*\=\s*([^;]*).*$)|^.*$/, "$1");
	}

	var delete_cookie = function () {
			document.cookie = 'vividly-plugin-cookie=; path=/; expires=Thu, 01 Jan 1970 00:00:00 GMT; ';
	}

	var toggle_high_contrast = function () {
			var link = document.getElementById('vividly-stylesheet');
			if (link) {
					remove_high_contrast_stylesheet(link);
					delete_cookie();
			} else {
					insert_high_contrast_stylesheet();
					set_cookie();
			}
	}

	return {'toggle' : toggle_high_contrast};

})();