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

// add_action( 'wpcf7_mail_sent', 'techiepress_cf7_data', 10,1 );
add_action( 'cfdb7_before_save', 'techiepress_cf7_data' );
function techiepress_cf7_data( $form_data  ) {

    $data = [
        'name' => $form_data['your-name'],
        'email' => $form_data['your-email'],
        // 'food' => $form_data['menu-340'][0], 
    ];

    $url = 'https://hook.eu1.make.com/mphpxsgrjlq313eomumtjbk584b912q9';

    $args = [
        'method' => 'POST',
        'body'   => $data,
    ];

    wp_remote_post( $url, $args );


// $contact_form
    // $wpcf7 = WPCF7_ContactForm::get_current();
    // $form_id = $contact_form->id();
     
     

    //  if($form_id = 101) {
    //     $submission =  WPCF7_Submission::get_instance();

    //     $data = $submission->get_posted_data();

    //     error_log( print_r($data, true));
    //  }

    // $data = [
    //     'name' => $form_data['text-504'],
    //     'email' => $form_data['email-347'],
    //     'food' => $form_data['menu-340'][0]
    // ];

    // $url = 'https://hook.integromat.com/mcmufrx6en3zmf1xltvxwfc6efcnu7ag';

    // $args = [
    //     'method' => 'POST',
    //     'body'   => $data,
    // ];

    // wp_remote_post( $url, $args );
     
}