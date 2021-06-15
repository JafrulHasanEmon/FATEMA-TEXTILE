<?php
/**
 *
 */
class deposit_cost_model extends CI_Model
{


  function save_data(){
    if ($this->session->userdata('user_name') != '') {
    $data = array(
            'dcr_flag'  => $this->input->post('option'),
            'dcr_date'  => $this->input->post('date'),
            'dcr_deposit_name'  => $this->input->post('deposit_name'),
            'dcr_cost_name' => $this->input->post('cost_name'),
            'dcr_amount' => $this->input->post('amount'),
        );
        $result=$this->db->insert('deposit_cost_register',$data);
        return $result;
    }
  }
    function show_data(){
      if ($this->session->userdata('user_name') != '') {
          $this->db->order_by("dcr_id","desc");
          $hasil=$this->db->get('deposit_cost_register');
          return $hasil->result();
   }
 }
   public function update_data($dcr_id,$dcr_flag,$dcr_deposit_name,$dcr_cost_name,$dcr_date,$dcr_amount)
   {
     if ($this->session->userdata('user_name') != '') {
         $this->db->set('dcr_flag', $dcr_flag);
         $this->db->set('dcr_date', $dcr_date);
         $this->db->set('dcr_deposit_name', $dcr_deposit_name);
         $this->db->set('dcr_cost_name', $dcr_cost_name);
         $this->db->set('dcr_amount', $dcr_amount);
         $this->db->where('dcr_id', $dcr_id);
         $result=$this->db->update('deposit_cost_register');
         return $result;
   }
 }
   public function delete_data($dcr_id)
   {
     if ($this->session->userdata('user_name') != '') {
      $this->db->where('dcr_id', $dcr_id);
       $result=$this->db->delete('deposit_cost_register');
       return $result;
   }
 }
   public function show_daily_costing()
   {
     if ($this->session->userdata('user_name') != '') {
     $this->db->Select('FORMAT(sum(dcr_amount),0) as total_amount,(SELECT FORMAT(sum(dcr_amount),0) from deposit_cost_register where dcr_flag="d") dep_amount, (SELECT FORMAT(sum(dcr_amount),0) from deposit_cost_register where dcr_flag="c") cost_amount');
     $this->db->from('deposit_cost_register');
     return $this->db->get()->result();
   }
 }
}

 ?>
