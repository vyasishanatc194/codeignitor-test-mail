<?php
/**
* A Contact class for show contact page and send mail to given emai address
*
* This class is for unsubscriber mail
*
* @version 1.0
* @author Ishan Vyas <vyasishanatc194@gmail.com>
*/
//defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
    }

	/**
	 * Index Page for this controller.
	 * Which shows Contact form
	 */
	public function index()
	{   
        #Load Helper
        $this->load->helper('url');
        $this->load->view('include/header',array('title'=>'Contact'));
        $this->load->view('contact_page');
        $this->load->view('include/footer');
    }
    /**
	 * Function SendMail for Send Mails and Make an entry in send mail Table .
	 * Method = Post
     * Parameters = 
     * @param email  string 
     * @param subject string 
     * @param email  string 
     * 
	 */
    public function sendMail(){
        error_reporting(0);
        #Load Helper
        $this->load->helper(array('form', 'url'));
        // Validate Form 
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('subject', 'Email subject', 'required');
        $this->form_validation->set_rules('body', 'Email body', 'required');
        
        if ($this->form_validation->run() == FALSE)
        {
            //rerender form
            $this->index();
        }
        else
        {
            //Load email Library 
            $this->load->library('email');
            // Load Helper for mail configuration
            $this->load->helper('mail_configuration');
            //Set Configuration For Email from Helper 
            $config = get_configuration();
            // Initialize Email Library with configuration
            $this->email->initialize($config);
            $this->email->set_newline("\r\n");
            $email = $this->input->get_post('email', true);
            $subject = $this->input->get_post('subject', true);
            $body = $this->input->get_post('body', true);
            $this->email->from($getSettings['smtp_username'], 'Tester');
            $this->email->to($email);
            $this->email->subject($subject);
            $this->email->message($body);
            // Send Mail
            if($this->email->send()){
                $input['to_email'] = $this->input->get_post('email', true);
                $input['subject'] = $this->input->get_post('subject', true);
                $input['body'] = $this->input->get_post('body', true);
                $input['created'] = date('Y-m-d H:i:s');
                # Load Sent Mails model class which handles database interaction
                $this->load->model('Sent_Mails');
                # Store mail Data to table
                $this->Sent_Mails->storeMailData($input);
                redirect('contact/success');
            }else{
                //rerender form
                $this->session->set_flashdata('error', 'Somthing went wrong, Please Try again');
                $this->index();
            }
                
            
        }
    }
    /**
	 * Function Success for show success modal.
	 * 
	 */
    public function success(){
        $this->load->view('mail-success');
    }
}
