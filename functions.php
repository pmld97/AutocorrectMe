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

defined( 'ABSPATH' ) or die( 'Stop right there you criminal scum! >:(' ); //Don't hack me plz

add_filter('the_content', array('filterhook_fix_gramma', 'fix_spelling')); //Hook and using a callback-function
add_action('wp_enqueue_scripts', array('filterhook_fix_gramma', 'includes')); //Telling the system I want to include my costum css in a function

class filterhook_fix_gramma{ //The hook
        function fix_spelling($content) //The actual callback function
        {
            $search = array('its', 'thats', 'ive', 'im', 'wouldnt', 'werent', 'Autocorrect'); //Searching for the typed in words in content

            $replace = array(
                "<a class='corrected'>" . "it's" . "</a>",
                "<a class='corrected'>" . "that's" . "</a>",
                "<a class='corrected'>" . "I've" . "</a>",
                "<a class='corrected'>" . "I'm" . "</a>",
                "<a class='corrected'>" . "wouldn't" . "</a>",
                "<a class='corrected'>" . "weren't" . "</a>",
                "<a class='corrected'>" . "autocorrect" . "</a>",
            ); //Correcting the words

           return str_replace($search, $replace, $content); //Returning the correction before the content is displayed
        }
        function includes (){ 
            wp_enqueue_style ("style", plugins_url() . "/AutocorrectMe/style.css"); //Actually including the css
        }
}
