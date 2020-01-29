<?php
/*
	Model class for campaign
*/
class Sent_Mails extends CI_Model
{
	//Constructor class with parent constructor
	function __construct()
	{
        parent::__construct();
        $this->tableName = "sent_emails";
    }

    function storeMailData($inputs){
        $this->db->insert($this->tableName, $inputs);
    }
    
}