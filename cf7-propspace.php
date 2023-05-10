<?php
/**
 * Plugin Name: CF7 Propspace
 * Plugin URI: https://github.com/Rajan1308/cf7-propspace
 * Author: Rajan Gupta
 * Author URI: https://github.com/rajan1308 
 * Description: Get CF7 Data and send to API
 * Version: 0.1.0
 * License: GPL2
 * License URL: http://www.gnu.org/licenses/gpl-2.0.txt
 * text-domain: cf7-prospace-api
*/

defined( 'ABSPATH' ) or die( 'Unauthorized access!' );

add_action( 'cfdb7_before_save', 'techiepress_cf7_data' );

function techiepress_cf7_data( $form_data ) {

    $upload_dir = home_url( 'wp-content/uploads/cfdb7_uploads/' );

    $data = [
        'name' => $form_data['text-504'],
        'email' => $form_data['email-347'],
        'food' => $form_data['menu-340'][0],
        'upload' => $upload_dir . $form_data['file-337cfdb7_file'],
    ];

    $url = 'https://hook.integromat.com/mcmufrx6en3zmf1xltvxwfc6efcnu7ag';

    $args = [
        'method' => 'POST',
        'body'   => $data,
    ];

    wp_remote_post( $url, $args );
     
}