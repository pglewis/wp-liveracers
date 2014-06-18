/*
Copyright 2014 Phil Lewis

This file is part of WordPress LiveRacers

 WordPress LiveRacers is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
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