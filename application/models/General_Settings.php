<?php
/*
	Model class for campaign
*/
class General_Settings extends CI_Model
{
	//Constructor class with parent constructor
	function __construct()
	{
        parent::__construct();
        $this->tableName = "general_settings";
    }

    function getSmtpDetails(){
        $this->db->from($this->tableName);
        $result=$this->db->get();
        $array = [];
        foreach($result->result_array() as $row)
		{
        	$array[$row['name']] = $row['value'];
        }
        
		return $array;
    }
    
}