jQuery( function () {
	var lr_script,
		first_script;

	lr_script = document.createElement( 'script' );
	lr_script.type = 'text/javascript';
	lr_script.async = true;
	lr_script.src = window._lr.url + '/Scripts/api.js';

	first_script = document.getElementsByTagName( 'script' )[0];
	first_script.parentNode.insertBefore( lr_script, first_script );
} );