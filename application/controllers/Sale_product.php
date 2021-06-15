<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sale_product extends CI_Controller {


	public function index()
	{
			if($this->session->userdata('user_name') != '')
			{
				if ($this->session->userdata('user_designation') == 'super_admin' || $this->session->userdata('user_designation') == 'admin')
				{
					$this->load->view('sale');
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
			public function show_sale_data()
			{
				if($this->session->userdata('user_name') != '')
				{
					// $option=$this->input->post('option');
					$date=$this->input->post('date');
					$product_id=$this->input->post('product_id');
					$products_size=$this->input->post('products_size');
					$style_id=$this->input->post('style_id');
					$this->load->model('sale_model');
					$data=$this->sale_model->show_sale_data($date,$product_id,$products_size,$style_id);
					echo json_encode($data);

				}
			}
			public function save_sale_data()
			{
				if ($this->session->userdata('user_name') != '') {
					$this->load->model('sale_model');

					$stock_current_dozen="";
					$stock_current_piece="";

					// $option=1;
					$option=$this->input->post('option');
					$date=$this->input->post('date');
					$product_id=$this->input->post('product_id');
					$product_size_id=$this->input->post('product_size_id');
					$style_id=$this->input->post('style_id');
					// $product_id=$this->input->post('products_name');
					// $product_size_id=$this->input->post('product_sizes');
					// $style_id=$this->input->post('style_names');
					$dozen=(int)$this->input->post('dozen');
					$piece=(int)$this->input->post('piece');

					if ($option==1) {
						// sale product
						$data = array(
									'sale_date'  => $date,
									'sale_product_id'  => $product_id,
									'sale_product_size_id'  => $product_size_id,
									'sale_style_id'  => $style_id,
									'sale_dozen'  => $dozen,
									'sale_piece'  => $piece,
									'sale_or_return'  => $option,
							);
							// echo "<pre>";
							// print_r($data);
							// echo "</pre>";
							$verify_stock=$this->sale_model->verify_stock_data($product_id,$product_size_id,$style_id);

							if (count($verify_stock)>0) {
								foreach ($verify_stock as $key) {
									$previous_sale_dozen=$key->stock_total_sale_dozen;
									$previous_sale_piece=$key->stock_total_sale_piece;
									$previous_current_dozen=$key->stock_current_dozen;
									$previous_current_piece=$key->stock_current_piece;
									$stock_id=$key->stock_id;
								}
								if ($dozen>$previous_current_dozen) {
									echo (1);
								}
								else {
										if (($previous_current_dozen==0 && $previous_current_piece<$piece) ||
										($previous_current_dozen==$dozen && $previous_current_piece<$piece)) {
											echo (1);
										}
										else {
											$current_sale_dozen=$previous_sale_dozen+$dozen;
											$current_sale_piece=$previous_sale_piece+$piece;

											if ($current_sale_piece>11) {
												$current_sale_dozen=$current_sale_dozen+($current_sale_piece / 12);
												$current_sale_piece=$current_sale_piece % 12;
											}


										if ($previous_current_piece<$piece) {
											if ($previous_current_piece==0) {
												$flag=12;
											}else {
												$flag=10;
											}
											$stock_current_piece=($previous_current_piece+$flag) - $piece;
											$stock_current_dozen=$previous_current_dozen-($dozen+1);
										}
										if ($previous_current_piece>=$piece) {
											$stock_current_piece=$previous_current_piece - $piece;
											$stock_current_dozen=$previous_current_dozen-$dozen;
										}

									$sale_insert=$this->sale_model->insert_sale_data($data);
									$update_stock=$this->sale_model->update_stock_data(
									$stock_id,$current_sale_dozen,$current_sale_piece,$stock_current_dozen,$stock_current_piece);
									echo (2);
								}
							}
						}else {
								echo(1);

							}
						}else {
							// return product
							$data = array(
									'sale_date'  => $date,
									'sale_product_id'  => $product_id,
									'sale_product_size_id'  => $product_size_id,
									'sale_style_id'  => $style_id,
									'sale_return_dozen'  => $dozen,
									'sale_return_piece'  => $piece,
									'sale_or_return'  => $option,
							);
							$verify_stock=$this->sale_model->verify_stock_data($product_id,$product_size_id,$style_id);
							if (count($verify_stock)>0) {
								// code...
								foreach ($verify_stock as $key) {
									$previous_sale_dozen=$key->stock_total_sale_dozen;
									$previous_sale_piece=$key->stock_total_sale_piece;
									$previous_current_dozen=$key->stock_current_dozen;
									$previous_current_piece=$key->stock_current_piece;
									$stock_id=$key->stock_id;
								}
								$current_sale_dozen=$previous_sale_dozen;
								$current_sale_piece=$previous_sale_piece;

								$stock_current_dozen=$previous_current_dozen+$dozen;
								$stock_current_piece=$previous_current_piece+$piece;
								if ($stock_current_piece>11) {
									// code...
									$stock_current_dozen=$stock_current_dozen+($stock_current_piece/12);
									$stock_current_piece=$stock_current_piece % 12;
								}
								$return_insert=$this->sale_model->insert_sale_data($data);
								$update_stock=$this->sale_model->update_stock_data(
												$stock_id,$current_sale_dozen,$current_sale_piece,
												$stock_current_dozen,$stock_current_piece);
								echo (2);
							}
							else {
								// insert_as new in stock
								$data_stock= array(
									'product_id'  => $product_id,
									'product_size_id'  => $product_size_id,
									'style_id'  => $style_id,
									'stock_current_dozen'  => $dozen,
									'stock_current_piece'  => $piece,
										);
								$return_insert=$this->sale_model->insert_sale_data($data);
								$stock_insert=$this->sale_model->insert_stock_data($data_stock);
								echo (3);
							}

						}


		    }
			}

		}
