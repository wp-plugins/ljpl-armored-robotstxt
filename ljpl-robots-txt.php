<?php
/*
Plugin Name: LJPL Armored robots.txt
Plugin URI: http://www.ljasinski.pl/portfolio/wordpress-plugins/armored-robots-txt/
Version: 1.0
Description: Add some directives to your robots.txt file to keep your site safer
Author: Łukasz Jasiński
Author URI: http://www.ljasinski.pl
Licence: GPL2
*/

/*

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

*/


add_filter( 'robots_txt', 'ljpl_filter_robots_txt' );

if ( !function_exists( 'ljpl_filter_robots_txt' ) ) {
    function ljpl_filter_robots_txt( $robots )
    {
        $entries = array(
			'/cgi-bin/',
			'/wp-content/plugins/',
			'/wp-content/mu-plugins/',
			'/wp-content/cache/',
			'/wp-content/languages/',
			'/wp-content/themes/',
			'*/trackback/',
			'/wp-*.php',
			'/xmlrpc.php',
			'/.htaccess',
			'/license.txt',
			'/readme.html',	
			'/*?'
				
        );
        
        $out = $robots . "\n\n#BEGIN ljpl-robots.txt added security\n\n";
        
        foreach ( $entries as $entry ) {
            $out .= "Disallow: " . $entry . "\n";
        }
        
        $out .= "\nAllow: /wp-content/uploads/";
        
        $out .="\n\n#END OF ljpl-robots.txt added security\n";
        return $out;
    }
}
