<?php
/*
* Plugin Name: AutocorrectMe
* Description: A program that helps your spelling mistaktes
* Version: 1.0
* Author: Paw Davidsen
* Author URL: 
* Text Domain:
*
*/

defined( 'ABSPATH' ) or die( 'You are not supposed to be here, move along!' );

add_filter('the_content', array('filterhook_fix_gramma', 'fix_spelling'));
add_action('wp_enqueue_scripts', array('filterhook_fix_gramma', 'includes'));

class filterhook_fix_gramma{
        function fix_spelling($content)
        {
            $search = array('its', 'thats', '');

            $replace = array(
                "<p class='corrected'>" . "it's" . "</p>",
                "that's",
                

                
                
                
                
                
            );

           return str_replace($search, $replace, $content);
        }
        function includes (){
            wp_enqueue_style ("style", plugins_url() . "/AutocorrectMe/style.css");
        }
}
