<?php
class inhouse_setting_model extends CI_Model
{



  function show_products()
  {
    if ($this->session->userdata('user_name') != '')
      {

        $this->db->select('product_id,UPPER(product_name) product_name');
        $this->db->order_by("product_name","ASC");
        $hasil=$this->db->get('products');
        return $hasil->result();
      }
  }
  public function exist_product($product_name)
  {
    if ($this->session->userdata('user_name') != '')
      {
        $this->db->Select('*');
        $this->db->from('products');
        $this->db->where('product_name',$product_name);
        return $this->db->get()->result();
      }
  }
  public function insert_products($data)
  {
      if ($this->session->userdata('user_name') != '') {

          $result=$this->db->insert('products',$data);
          return $result;
      }
  }

  public function update_products($product_id,$product_name)
  {
    if ($this->session->userdata('user_name') != '') {
        $this->db->set('product_name', $product_name);
        $this->db->where('product_id', $product_id);
        $result=$this->db->update('products');
        return $result;
      }
  }
  public function exist_size_for_product($product_id)
  {
    if ($this->session->userdata('user_name') != '')
      {
        $this->db->Select('*');
        $this->db->from('product_sizes');
        $this->db->where('product_id',$product_id);
        return $this->db->get()->result();
      }
  }
  public function delete_product_size_for_product($product_id)
  {
    if ($this->session->userdata('user_name') != '') {
      $this->db->where('product_id', $product_id);
      $result=$this->db->delete('product_sizes');
      return $result;
    }
  }

   public function delete_products($product_id)
   {
     if ($this->session->userdata('user_name') != '') {
      $this->db->where('product_id', $product_id);
       $result=$this->db->delete('products');
       return $result;
   }
 }
 public function show_products_size()
 {
   if ($this->session->userdata('user_name') != '')
     {

       $this->db->select('pz.product_size_id,pz.product_size_value,pz.product_id,prd.product_id,UPPER(prd.product_name) product_name');
       $this->db->from('product_sizes pz');
       $this->db->join('products prd','prd.product_id=pz.product_id');
       $this->db->order_by("product_name ASC, pz.product_size_value asc");
       return $this->db->get()->result();
     }
 }
 public function show_products_name()
 {
   if ($this->session->userdata('user_name') != '')
     {

       $this->db->select('distinct(product_id) product_id, UPPER(product_name) product_name');
       $this->db->order_by("product_name","ASC");
       $this->db->from('products');
       return $this->db->get()->result();
     }
 }
 public function exist_product_size($product_id,$product_size)
 {
   if ($this->session->userdata('user_name') != '')
     {
       $this->db->Select('*');
       $this->db->from('product_sizes');
       $this->db->where('product_id',$product_id);
       $this->db->where('product_size_value',$product_size);
       return $this->db->get()->result();
     }

 }
 public function insert_products_size($data)
 {
   if ($this->session->userdata('user_name') != '') {

       $result=$this->db->insert('product_sizes',$data);
       return $result;
   }
 }
 public function update_product_size($product_size_id,$product_size)
 {
   if ($this->session->userdata('user_name') != '') {
       $this->db->set('product_size_value', $product_size);
       $this->db->where('product_size_id', $product_size_id);
       $result=$this->db->update('product_sizes');
       return $result;
     }
 }
 public function delete_product_size($product_size_id)
 {
   if ($this->session->userdata('user_name') != '') {
     $this->db->where('product_size_id', $product_size_id);
     $result=$this->db->delete('product_sizes');
     return $result;
   }
 }
 public function show_style_name()
 {
   if ($this->session->userdata('user_name') != '')
     {

       $this->db->select('style_id, UPPER(style_name) style_name');
       $this->db->order_by("style_name","ASC");
       $this->db->from('styles');
       return $this->db->get()->result();
     }
 }
 public function exist_style_name($style_name)
 {
   if ($this->session->userdata('user_name') != '')
     {
       $this->db->select('*');
       $this->db->from('styles');
       $this->db->where('style_name',$style_name);
       return $this->db->get()->result();
     }
 }
 public function insert_style($data)
 {
   if ($this->session->userdata('user_name') != '') {

       $result=$this->db->insert('styles',$data);
       return $result;
   }
 }
 public function update_style($style_id,$style_name)
 {
   if ($this->session->userdata('user_name') != '') {
       $this->db->set('style_name', $style_name);
       $this->db->where('style_id', $style_id);
       $result=$this->db->update('styles');
       return $result;
     }
 }
 public function delete_style_dtl_for_style($style_id)
 {
   if ($this->session->userdata('user_name') != '') {
     $this->db->where('style_id', $style_id);
     $result=$this->db->delete('style_dtl');
     return $result;
   }
 }
 public function delete_style($style_id)
 {
   if ($this->session->userdata('user_name') != '') {
     $this->db->where('style_id', $style_id);
     $result=$this->db->delete('styles');
     return $result;
   }
 }
 public function show_style_details()
 {
   if ($this->session->userdata('user_name') != '')
     {
       $this->db->select('sd.*, UPPER(ss.style_name) style_name');
       $this->db->order_by("style_name","ASC");
       $this->db->from('style_dtl sd');
       $this->db->join('styles ss','ss.style_id=sd.style_id');

       return $this->db->get()->result();
     }
 }
 public function show_style_name_for_dtl()
 {
   if ($this->session->userdata('user_name') != '')
     {
       $this->db->select('ss.style_id, UPPER(ss.style_name) style_name');
       $this->db->order_by("style_name","ASC");
       $this->db->from('styles ss');
       return $this->db->get()->result();
     }
 }
 public function exist_style_dtl($style_id)
 {
   if ($this->session->userdata('user_name') != '')
     {
       $this->db->select('*');
       $this->db->from('style_dtl');
       $this->db->where('style_id',$style_id);
       return $this->db->get()->result();
     }
 }
 public function insert_style_details($data)
 {
   if ($this->session->userdata('user_name') != '') {

       $result=$this->db->insert('style_dtl',$data);
       return $result;
   }
 }
 public function update_style_dtl($style_dtl_id,$cutting_rate,$neck_cutting_rate)
 {
   if ($this->session->userdata('user_name') != '') {
       $this->db->set('style_dtl_cutting_rate', $cutting_rate);
       $this->db->set('style_dtl_neck_cutting_rate', $neck_cutting_rate);
       $this->db->where('style_dtl_id', $style_dtl_id);
       $result=$this->db->update('style_dtl');
       return $result;
     }
 }
 public function delete_style_dtl($style_dtl_id)
 {
   if ($this->session->userdata('user_name') != '') {
     $this->db->where('style_dtl_id', $style_dtl_id);
     $result=$this->db->delete('style_dtl');
     return $result;
   }
 }
 public function show_cutting_man_list()
 {
   if ($this->session->userdata('user_name') != '')
     {
       $this->db->select('cm.cutting_man_id, UPPER(cm.cutting_man_name) cutting_man_name, UPPER(cm.cutting_man_designation) cutting_man_designation,');
       $this->db->order_by("cutting_man_name","ASC");
       $this->db->from('cutting_mans cm');
       return $this->db->get()->result();
     }
 }
 public function insert_cutting_man($data)
 {
   if ($this->session->userdata('user_name') != '') {

       $result=$this->db->insert('cutting_mans',$data);
       return $result;
   }
 }
 public function update_cutting_man($cutting_man_id,$cutting_man_name,$cutting_man_designation)
 {
   if ($this->session->userdata('user_name') != '') {
       $this->db->set('cutting_man_name', $cutting_man_name);
       $this->db->set('cutting_man_designation', $cutting_man_designation);
       $this->db->where('cutting_man_id', $cutting_man_id);
       $result=$this->db->update('cutting_mans');
       return $result;
     }
  }
  public function delete_cutting_man($cutting_man_id)
  {
    if ($this->session->userdata('user_name') != '') {
      $this->db->where('cutting_man_id', $cutting_man_id);
      $result=$this->db->delete('cutting_mans');
      return $result;
    }
  }
  public function show_cutting_man_designation($cutting_man_id)
  {
    if ($this->session->userdata('user_name') != '')
      {
        $this->db->select('cutting_man_id, UPPER(cutting_man_designation) cutting_man_designation,');
        $this->db->from('cutting_mans');
        $this->db->where('cutting_man_id',$cutting_man_id);
        return $this->db->get()->result();
      }
  }

}

 ?>
