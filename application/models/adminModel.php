<?php
class adminModel extends CI_Model {
 
 function getPosts(){
  $this->db->select("business_id, admin_id"); 
  $this->db->from('businessadmin');
  $query = $this->db->get();
  return $query->result();
 }
 
}
?>