<?php
class sale_model extends CI_Model
{

  public function insert_sale_data($data)
  {
    if ($this->session->userdata('user_name') != '') {

        $result=$this->db->insert('sale_product',$data);
        return $result;
    }
  }
  public function verify_stock_data($product_id,$product_size_id,$style_id)
  {
    if ($this->session->userdata('user_name') != '') {
        $this->db->select('*');
        $this->db->from('stock');
        $this->db->where('product_id',$product_id);
        $this->db->where('product_size_id',$product_size_id);
        $this->db->where('style_id',$style_id);
        return $this->db->get()->result();
    }
  }

  public function update_stock_data($stock_id,$current_sale_dozen,$current_sale_piece,
                        $stock_current_dozen,$stock_current_piece)
  {
    if ($this->session->userdata('user_name') != '') {

        $this->db->set('stock_total_sale_dozen', $current_sale_dozen);
        $this->db->set('stock_total_sale_piece', $current_sale_piece);
        $this->db->set('stock_current_dozen', $stock_current_dozen);
        $this->db->set('stock_current_piece', $stock_current_piece);
        $this->db->where('stock_id', $stock_id);
        $result=$this->db->update('stock');
        return $result;
      }
  }
  public function show_sale_data($date,$product_id,$products_size,$style_id)
  {
    if ($this->session->userdata('user_name') != '') {
      $this->db->select('distinct(sp.sale_id) sale_id, DATE_FORMAT(sp.sale_date, "%d %M %Y") sale_date,
      IFNULL(sp.sale_dozen,0) sale_dozen, IFNULL(sp.sale_piece,0) sale_piece,
      IFNULL(sp.sale_return_dozen,0) sale_return_dozen,
      IFNULL(sp.sale_return_piece,0) sale_return_piece,
      pr.product_id,UPPER(pr.product_name) product_name,ps.*,st.style_id,
      UPPER(st.style_name) style_name');
      $this->db->from('sale_product sp');
      $this->db->join('products pr','pr.product_id=sp.sale_product_id');
      $this->db->join('product_sizes ps','ps.product_size_id=sp.sale_product_size_id');
      $this->db->join('styles st','st.style_id=sp.sale_style_id');
      $this->db->from('sale_product');
      if ($date!="") {
        // code...
        $this->db->where('sp.sale_date',$date);
      }
      if ($product_id!="") {
        // code...
        $this->db->where('sp.sale_product_id',$product_id);
      }
      if ($products_size!="") {
        // code...
        $this->db->where('ps.product_size_value',$products_size);
      }
      if ($style_id!="") {
        // code...
        $this->db->where('sp.sale_style_id',$style_id);
      }
      $this->db->order_by('sp.sale_id','desc');
        return $this->db->get()->result();
      }
  }
  public function insert_stock_data($data_stock)
  {
    // code...
    if ($this->session->userdata('user_name') != '') {

        $result=$this->db->insert('stock',$data_stock);
        return $result;
    }
  }


}

 ?>
