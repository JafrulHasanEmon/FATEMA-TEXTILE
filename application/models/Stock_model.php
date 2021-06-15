<?php
class stock_model extends CI_Model
{
  function show_stock_data(){
    if ($this->session->userdata('user_name') != '') {
        $this->db->select('IFNULL(stc.stock_previous_dozen,0) stock_previous_dozen,
        IFNULL(stc.stock_previous_piece,0) stock_previous_piece,
        IFNULL(stc.stock_cutting_dozen,0) stock_cutting_dozen,
        IFNULL(stc.stock_cutting_piece,0) stock_cutting_piece,
        IFNULL(stc.stock_current_dozen,0) stock_current_dozen,
        IFNULL(stc.stock_total_sale_dozen,0) stock_total_sale_dozen,
        IFNULL(stc.stock_total_sale_piece,0) stock_total_sale_piece,
        IFNULL(stc.stock_current_piece,0) stock_current_piece,
        pr.product_id,UPPER(pr.product_name) product_name,
        ps.*,UPPER(st.style_name) style_name');
        $this->db->from('stock stc');
        $this->db->join('products pr','stc.product_id=pr.product_id');
        $this->db->join('product_sizes ps','ps.product_size_id=stc.product_size_id');
        $this->db->join('styles st','st.style_id=stc.style_id');
        $this->db->order_by('product_name','asc');
        return $this->db->get()->result();
    }
  }


}

 ?>
