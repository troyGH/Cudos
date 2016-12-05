<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Business_model extends CI_Model {
	// constructor for the user_model
	function __construct() {
		parent::__construct();
	}

	function is_associated($gID){
		$query = $this->db->query("SELECT is_associated FROM business WHERE google_id='$gID';");
		return $query->result();
	}

  function create_business($bInfo){
    $this->db->insert('business',$bInfo);
    return $this->db->insert_id();
  }

}
?>
