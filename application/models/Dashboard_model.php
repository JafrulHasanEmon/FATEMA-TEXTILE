<?php
class dashboard_model extends CI_Model
{
  function total_tran_amount_per_day($currentDate){
    if ($this->session->userdata('user_name') != '') {
        $this->db->select('format(sum(dcr_amount),0) as current_day_tran_amount');
        $this->db->from('deposit_cost_register');
        $this->db->where('dcr_date',$currentDate);
        return $this->db->get();
    }
  }
  public function show_daily_costing()
  {
    if ($this->session->userdata('user_name') != '') {
      $this->db->select('format(IFNULL(sum(dcr_amount),0),0) total_tran,
        (SELECT format(IFNULL(sum(dcr_amount),0),0) from deposit_cost_register where dcr_flag="d") total_deposit,
        (SELECT format(IFNULL(sum(dcr_amount),0),0) from deposit_cost_register where dcr_flag="c") total_cost,
        (SELECT format(IFNULL(sum(dcr_amount),0),0) from deposit_cost_register where dcr_date=CURDATE()) daily_tran,
        (SELECT format(IFNULL(sum(dcr_amount),0),0) from deposit_cost_register where dcr_flag="d" and dcr_date=CURDATE()) total_daily_deposit,
        (SELECT format(IFNULL(sum(dcr_amount),0),0) from deposit_cost_register where dcr_flag="c" and dcr_date=CURDATE()) total_daily_cost');
      $this->db->from('deposit_cost_register');
      return $this->db->get()->result();
    }
  }

}

 ?>
