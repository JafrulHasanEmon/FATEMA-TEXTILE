<?php
class Cutting_reg_model extends CI_Model
{
  function show_products_size($product_id){
    if ($this->session->userdata('user_name') != '') {
        $this->db->select('*');
        $this->db->from('product_sizes');
        $this->db->where('product_id',$product_id);
        return $this->db->get()->result();
    }
  }
  function display_cutting_man(){
    if ($this->session->userdata('user_name') != '') {
        $this->db->select('cutting_man_id, UPPER(cutting_man_name) cutting_man_name');
        $this->db->from('cutting_mans');
        $this->db->where('cutting_man_designation','cutting');
        return $this->db->get()->result();
    }
  }
  public function show_cutting_data($filter_date,$product_id,$products_size,$style_id,$cutting_man_id)
  {
    if ($this->session->userdata('user_name') != '') {
        $this->db->select('cr.*,DATE_FORMAT(cr.cutting_register_date, "%d %M %Y") cutting_register_date_show,
                    pr.product_id,UPPER(pr.product_name) product_name,ps.*,st.style_id,UPPER(st.style_name) style_name,
                    cm.cutting_man_id,UPPER(cm.cutting_man_name) cutting_man_name');
        $this->db->from('cutting_register cr');
        $this->db->join('products pr','cr.product_id=pr.product_id');
        $this->db->join('product_sizes ps','ps.product_size_id=cr.product_size_id');
        $this->db->join('styles st','st.style_id=cr.style_id');
        $this->db->join('cutting_mans cm','cm.cutting_man_id=cr.cutting_man_id');
        if ($product_id !="") {
        $this->db->where('cr.product_id',$product_id);
        }
        if ($filter_date !="") {
        $this->db->where('cr.cutting_register_date',$filter_date);
        }
        if ($products_size !="") {
        $this->db->where('ps.product_size_value ',$products_size);
        }
        if ($style_id !="") {
        $this->db->where('cr.style_id ',$style_id);
        }
        if ($cutting_man_id !="") {
        $this->db->where('cr.cutting_man_id ',$cutting_man_id);
        }
        $this->db->order_by('cutting_register_id','desc');
        return $this->db->get()->result();
    }
  }
  public function update_cutting_top_flag($product_id,$product_size_id,$style_id)
  {
    if ($this->session->userdata('user_name') != '') {
        $this->db->set('cutting_top_flag', 0);
        $this->db->where('product_id', $product_id);
        $this->db->where('product_size_id', $product_size_id);
        $this->db->where('style_id', $style_id);
        $result=$this->db->update('cutting_register');
        return $result;
      }
  }
  public function insert_cutting_data($data)
  {
    if ($this->session->userdata('user_name') != '') {

        $result=$this->db->insert('cutting_register',$data);
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
  public function insert_stock_data($data_stock)
  {
    if ($this->session->userdata('user_name') != '') {

        $result=$this->db->insert('stock',$data_stock);
        return $result;
    }
  }
  public function update_stock_data($stock_id,$previous_dozen,$previous_piece,
                    $cutting_dozen,$cutting_piece,$current_dozen,$current_piece)
  {
    if ($this->session->userdata('user_name') != '') {
        $this->db->set('stock_cutting_dozen', $cutting_dozen);
        $this->db->set('stock_cutting_piece', $cutting_piece);
        $this->db->set('stock_previous_dozen', $previous_dozen);
        $this->db->set('stock_previous_piece', $previous_piece);
        $this->db->set('stock_current_dozen', $current_dozen);
        $this->db->set('stock_current_piece', $current_piece);
        $this->db->where('stock_id', $stock_id);
        $result=$this->db->update('stock');
        return $result;
      }
  }
  public function fetch_product_name_show($cutting_register_id)
  {
    if ($this->session->userdata('user_name') != '') {
        $this->db->select('pr.product_id,UPPER(pr.product_name) product_name,ps.*,st.style_id,UPPER(st.style_name) style_name,
        cm.cutting_man_id,UPPER(cm.cutting_man_name) cutting_man_name');
        $this->db->from('cutting_register cr');
        $this->db->join('products pr','pr.product_id=cr.product_id');
        $this->db->join('product_sizes ps','ps.product_size_id=cr.product_size_id');
        $this->db->join('styles st','st.style_id=cr.style_id');
        $this->db->join('cutting_mans cm','cm.cutting_man_id=cr.cutting_man_id');
        $this->db->where('cutting_register_id',$cutting_register_id);
        return $this->db->get()->result();
    }
  }
  public function collect_cutting_data($cutting_register_id)
  {
    if ($this->session->userdata('user_name') != '') {
        $this->db->select('*');
        $this->db->from('cutting_register');
        $this->db->where('cutting_register_id',$cutting_register_id);
        return $this->db->get()->result();
    }
  }
  public function find_max_cutting_id($cutting_collect_product_id,
                          $cutting_collect_product_size_id,$cutting_collect_style_id)
  {
    if ($this->session->userdata('user_name') != '') {
        $this->db->select('max(cutting_register_id) cutting_register_id');
        $this->db->from('cutting_register');
        $this->db->where('product_id',$cutting_collect_product_id);
        $this->db->where('product_size_id',$cutting_collect_product_size_id);
        $this->db->where('style_id',$cutting_collect_style_id);
        return $this->db->get()->result();
        // $query = $this->db->get_where('mytable', array('id' => $id), $limit, $offset);
    }
  }
  public function second_max_cutting_id($cutting_collect_product_id,
                          $cutting_collect_product_size_id,$cutting_collect_style_id)
  {
    if ($this->session->userdata('user_name') != '') {

        $this->db->select('');
        $this->db->select('max(cutting_register_id) cutting_register_id');
        $this->db->from('cutting_register');
        $this->db->where('product_id',$cutting_collect_product_id);
        $this->db->where('product_size_id',$cutting_collect_product_size_id);
        $this->db->where('style_id',$cutting_collect_style_id);
        return $this->db->get()->result();
        // $query = $this->db->get_where('mytable', array('id' => $id), $limit, $offset);
    }
  }

  public function fetch_cutting_data($cutting_register_id_max)
  {
    if ($this->session->userdata('user_name') != '') {
        $this->db->select('*');
        $this->db->from('cutting_register');
        $this->db->where('cutting_register_id',$cutting_register_id_max);
        return $this->db->get()->result();
    }

  }
  public function show_products_size_filter()
  {
    if ($this->session->userdata('user_name') != '') {
        $this->db->select('distinct (product_size_value)');
        $this->db->from('product_sizes');
        return $this->db->get()->result();
    }

  }
  public function current_stock($cutting_collect_product_id,
                          $cutting_collect_product_size_id,$cutting_collect_style_id)
  {
    if ($this->session->userdata('user_name') != '') {
        $this->db->select('*');
        $this->db->from('stock');
        $this->db->where('product_id',$cutting_collect_product_id);
        $this->db->where('product_size_id',$cutting_collect_product_size_id);
        $this->db->where('style_id',$cutting_collect_style_id);
        return $this->db->get()->result();
    }
  }
  public function update_prevous_stock_data($cutting_collect_product_id,$cutting_collect_product_size_id,
                  $cutting_collect_style_id,$cutting_collect_dozen,$cutting_collect_piece)
  {
    if ($this->session->userdata('user_name') != '') {
        $this->db->set('stock_cutting_dozen', $cutting_collect_dozen);
        $this->db->set('stock_cutting_piece', $cutting_collect_piece);
        $this->db->set('stock_previous_dozen', $previous_dozen);
        $this->db->set('stock_previous_piece', $previous_piece);
        $this->db->set('stock_current_dozen', $current_dozen);
        $this->db->set('stock_current_piece', $current_piece);
        $this->db->where('stock_id', $stock_id);
        $result=$this->db->update('stock');
        return $result;
      }
  }
  public function update_stock(
        $stock_id,$cutting_dozen_stock,$cutting_piece_stock,$final_stock_dozen,$final_stock_piece)
  {
    if ($this->session->userdata('user_name') != '') {
        $this->db->set('stock_cutting_dozen', $cutting_dozen_stock);
        $this->db->set('stock_cutting_piece', $cutting_piece_stock);
        $this->db->set('stock_current_dozen', $final_stock_dozen);
        $this->db->set('stock_current_piece', $final_stock_piece);
        $this->db->where('stock_id', $stock_id);
        $result=$this->db->update('stock');
        return $result;
      }
  }
  public function update_cutting(
        $cutting_register_id,$date,$cutting_dozen,$cutting_piece)
  {
    if ($this->session->userdata('user_name') != '') {
        $this->db->set('cutting_register_dozen', $cutting_dozen);
        $this->db->set('cutting_register_piece', $cutting_piece);
        $this->db->set('cutting_register_date', $date);
        $this->db->where('cutting_register_id', $cutting_register_id);
        $result=$this->db->update('cutting_register');
        return $result;
      }
  }


}

 ?>
