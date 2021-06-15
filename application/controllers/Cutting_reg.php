<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cutting_reg extends CI_Controller {


	public function index()
	{
			if($this->session->userdata('user_name') != '')
			{
				if ($this->session->userdata('user_designation') == 'super_admin' || $this->session->userdata('user_designation') == 'admin')
				{
					$this->load->view('cutting');
				}else {
						?>
						<script type="text/javascript">
						alert('You dont have the permission to view this page.');
						window.location.href = '<?php echo base_url(); ?>index.php/Login_controller';
						</script>
			 			<?php
						}
				}else{
					redirect(base_url() . 'index.php/Login_controller/index');
				}
			}
			public function show_products_size()
			{
				if($this->session->userdata('user_name') != '')
				{
					$this->load->model('Cutting_reg_model');
          $product_id=$this->input->post('product_id');
					$data=$this->Cutting_reg_model->show_products_size($product_id);
					echo json_encode($data);

				}
			}
			public function display_cutting_man()
			{
				if($this->session->userdata('user_name') != '')
				{
					$this->load->model('Cutting_reg_model');
					$data=$this->Cutting_reg_model->display_cutting_man();
					echo json_encode($data);

				}
			}
      public function show_cutting_data()
      {
        if($this->session->userdata('user_name') != '')
				{
					$filter_date=$this->input->post('filter_date');
					$product_id=$this->input->post('product_id');
					$products_size=$this->input->post('products_size');
					$style_id=$this->input->post('style_id');
					$cutting_man_id=$this->input->post('cutting_man_id');
					$this->load->model('Cutting_reg_model');
					$data=$this->Cutting_reg_model->show_cutting_data($filter_date,$product_id,$products_size,$style_id,$cutting_man_id);
					echo json_encode($data);


				}
      }
      public function show_products_size_filter()
      {
        if($this->session->userdata('user_name') != '')
				{
					$this->load->model('Cutting_reg_model');
					$data=$this->Cutting_reg_model->show_products_size_filter();
					echo json_encode($data);


				}
      }
			public function save_cutting_data()
			{
				if ($this->session->userdata('user_name') != '') {
					$this->load->model('Cutting_reg_model');
					$previous_dozen='';
					$previous_piece='';
					$stock_id='';

					$date=$this->input->post('date');
					$product_id=$this->input->post('product_id');
					$product_size_id=$this->input->post('product_size_id');
					$style_id=$this->input->post('style_id');
					$cutting_man_id=$this->input->post('cutting_man_id');
					$cutting_dozen=trim($this->input->post('dozen')," ");
					$cutting_piece=trim($this->input->post('piece')," ");
					$cutting_top_flag=1;

					$data = array(
									'cutting_register_date'  => $date,
									'product_id'  => $product_id,
									'product_size_id'  => $product_size_id,
									'style_id'  => $style_id,
									'cutting_man_id'  => $cutting_man_id,
									'cutting_register_dozen'  => $cutting_dozen,
									'cutting_register_piece'  => $cutting_piece,
									'cutting_top_flag'  => $cutting_top_flag,
							);
							$update_cutting_data=$this->Cutting_reg_model->update_cutting_top_flag($product_id,$product_size_id,$style_id,$cutting_top_flag);

							$cutting_insert=$this->Cutting_reg_model->insert_cutting_data($data);


							$verify_stock=$this->Cutting_reg_model->verify_stock_data($product_id,$product_size_id,$style_id);
							if (count($verify_stock)>0) {
								foreach ($verify_stock as $key) {
									$previous_dozen=$key->stock_current_dozen;
									$previous_piece=$key->stock_current_piece;
									$stock_id=$key->stock_id;
								}
								$current_dozen=$previous_dozen+$cutting_dozen;
								$current_piece=$previous_piece+$cutting_piece;
								if ($current_piece>11) {
									$current_dozen=$current_dozen+($current_piece / 12);
									$current_piece=$current_piece % 12;
								}
								$update_stock=$this->Cutting_reg_model->update_stock_data(
									$stock_id,$previous_dozen,$previous_piece,$cutting_dozen,$cutting_piece,$current_dozen,$current_piece);

									// echo json_encode(1);
							}
						else {
							$data_stock= array(
								'product_id'  => $product_id,
								'product_size_id'  => $product_size_id,
								'style_id'  => $style_id,
								'stock_cutting_dozen'  => $cutting_dozen,
								'stock_cutting_piece'  => $cutting_piece,
								'stock_current_dozen'  => $cutting_dozen,
								'stock_current_piece'  => $cutting_piece,
									);
							$stock_insert=$this->Cutting_reg_model->insert_stock_data($data_stock);
						}
						echo 1;
		    }
			}
			public function fetch_cutting_data_show()
			{
				if($this->session->userdata('user_name') != '')
				{
					$this->load->model('Cutting_reg_model');
					$cutting_register_id=$this->input->post('cutting_register_id');
					$data=$this->Cutting_reg_model->fetch_product_name_show($cutting_register_id);
					echo json_encode($data);

				}
			}
			public function cutting_update()
			{
				if ($this->session->userdata('user_name') != '') {
					$this->load->model('Cutting_reg_model');
					$previous_dozen='';
					$previous_piece='';
					$stock_id='';
					$cutting_collect_product_id='';
					$cutting_collect_product_size_id='';
					$cutting_collect_style_id='';
					$array=array();


					$cutting_register_id=$this->input->post('cutting_register_id');
					$date=$this->input->post('date');
					$product_id=$this->input->post('product_id');
					$product_size_id=$this->input->post('product_size_id');
					$style_id=$this->input->post('style_id');
					$cutting_man_id=$this->input->post('cutting_man_id');
					$cutting_dozen=$this->input->post('cutting_dozen');
					$cutting_piece=$this->input->post('cutting_piece');

							$collect_cutting_data=$this->Cutting_reg_model->collect_cutting_data($cutting_register_id);
							foreach ($collect_cutting_data as $key) {
								$cutting_collect_register_date=$key->cutting_register_date;
								$cutting_collect_product_id=$key->product_id;
								$cutting_collect_product_size_id=$key->product_size_id;
								$cutting_collect_style_id=$key->style_id;
								$cutting_collect_dozen=$key->cutting_register_dozen;
								$cutting_collect_piece=$key->cutting_register_piece;
							}
							///recieve max cutting id
							$max_cutting_id=$this->Cutting_reg_model->find_max_cutting_id($cutting_collect_product_id,
																			$cutting_collect_product_size_id,$cutting_collect_style_id);


									foreach ($max_cutting_id as $key) {
										$cutting_register_id_max=$key->cutting_register_id;
									}
									//if the cutting data is the last data of this combination
									if ($cutting_register_id_max==$cutting_register_id) {
										$current_stock=$this->Cutting_reg_model->current_stock($cutting_collect_product_id,
										$cutting_collect_product_size_id,$cutting_collect_style_id);
										foreach ($current_stock as $key) {
											$stock_id=$key->stock_id;
											$stock_previous_dozen=$key->stock_previous_dozen;
											$stock_previous_piece=$key->stock_previous_piece;
										}
										$cutting_dozen_stock=$cutting_dozen;
										$cutting_piece_stock=$cutting_piece;
										$final_stock_dozen=$cutting_dozen_stock+$stock_previous_dozen;
										$final_stock_piece=$cutting_piece_stock+$stock_previous_piece;
										if ($final_stock_piece>11) {
											$final_stock_dozen=$final_stock_dozen+($final_stock_piece/12);
											$final_stock_piece=($final_stock_piece % 12);
										}
										$update_cutting=$this->Cutting_reg_model->update_cutting(
													$cutting_register_id,$date,$cutting_dozen,$cutting_piece);
										$update_stock=$this->Cutting_reg_model->update_stock(
													$stock_id,$cutting_dozen_stock,$cutting_piece_stock,$final_stock_dozen,$final_stock_piece);
														echo json_encode($update_stock);
									}else {
										// code...
										echo json_encode(0);
									}

									// $second_max_cutting_id=$this->cutting_reg_model->second_max_cutting_id($cutting_collect_product_id,
									// 												$cutting_collect_product_size_id,$cutting_collect_style_id);

		    }
			}
		}
