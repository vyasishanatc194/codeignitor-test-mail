<?php 
/*
	Helper For Set Dynamic Configuration for mail library
*/

function get_configuration(){
    # Get CI Instances in helper
    $CI =& get_instance();
    # Load General Setting model class which handles database interaction
    $CI->load->model('General_Settings');
    # Get details From General Settings
    $settings = $CI->General_Settings->getSmtpDetails();
    # Set array for email configuration
    $config=array();
    $config['mailtype'] = 'html';
    $config['protocol'] = 'smtp';
    $config['smtp_crypto'] = ($settings['smtp_tls'] == 'yes' ) ? 'tls' : 'ssl';
    $config['smtp_host'] = ($settings['smtp_host'] != '') ? $settings['smtp_host'] : $CI->config->item('smtp_host');
    $config['smtp_user'] = ($settings['smtp_username'] != '') ? $settings['smtp_username'] : $CI->config->item('smtp_user');
    $config['smtp_pass'] = ($settings['smtp_password'] != '') ? $settings['smtp_password'] : $CI->config->item('smtp_password');
    $config['smtp_port'] = ($settings['smtp_port'] != '') ? $settings['smtp_port'] : $CI->config->item('smtp_port');
    return $config;
}


