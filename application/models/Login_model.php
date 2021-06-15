<?php
/**
 *
 */
class Login_model extends CI_Model
{


  function user_fetch($username, $password){
    // $this->db->select('user_id,user_name, user_password, user_designation');
    // $this->db->from('users');
    $this->db->where('user_name',$username);
    $this->db->where('user_password',$password);
    $result = $this->db->get('users');
    return $result;


 }
}



 ?>
