<?php
/**
 * A collection of AJAX handlers for various AJAX calls
 */
class AJAXHelper
{
    public function __construct()
    {
        
    }

    static function contactSidebarSubmit()
    {
    	// make sure it's legit
    	check_ajax_referer( 'mVq_t&84ytPqv8@p8', 'nonce' );

    	// create and send the email to MetroQuip
    	// get the company contact email address
    	$companyContactEmailAddress = get_field( 'contact_email_address', 'option' );

    	// get the Contact Form submission HTML template
    	$contactEmailTemplate = file_get_contents( get_template_directory() . '/templates/email-templates/contact-email.html' );
    	

    	// get the fields from the email submission and map to the placeholders in the HTML template
    	$fields = array(
    		'{{name}}' => $_POST['json']['name'],
    		'{{emailAddress}}' => $_POST['json']['emailAddress'],
    		'{{phone}}' => $_POST['json']['phone'],
    		'{{message}}' => $_POST['json']['message']."<br><br><b>Page Being Viewed: ".$_POST['json']['pageBeingViewed']."</b>"
    	);

    	// replace the dynamic field placeholders in the HTML
    	foreach ( $fields as $placeholder => $value ) {
    		$contactEmailTemplate = str_replace( $placeholder, $value, $contactEmailTemplate );
    	}

    	$result = wp_mail( $companyContactEmailAddress, '[MetroQuip] - New Contact Form Submission', $contactEmailTemplate );

    	if ( $result ) {
    		wp_send_json( array( 'status' => 'success', 'data' => array() ) );
    	} else {
    		wp_send_json( array( 'status' => 'error', 'data' => array( 'Email failed to send' ) ) );
    	}

    	// kill the script
    	die();
    }
}
?>