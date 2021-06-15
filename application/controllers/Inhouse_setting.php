<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inhouse_setting extends CI_Controller {


	public function index()
	{
			if($this->session->userdata('user_name') != '')
			{
				if ($this->session->userdata('user_designation') == 'super_admin')
				{
					$this->load->view('Inhouse');
				}else {
						?>
						<script type="text/javascript">
						alert('You dont have the permission to view this page.');
						window.location.href = '<?php echo base_url(); ?>index.php/Dashboard';
						</script>
			 			<?php
						}
				}else{
					redirect(base_url() . 'index.php/Login_controller/index');
				}
			}
			public function show_products()
			{
				if ($this->session->userdata('user_name') != '') {
								$this->load->model('inhouse_setting_model');
			    			$data=$this->inhouse_setting_model->show_products();
				         echo json_encode($data);
				     }
			}
			public function save_product()
			{
				if ($this->session->userdata('user_name') != '') {
					$this->load->model('inhouse_setting_model');

					// echo "<pre>";
					// print_r($data);
					// echo "</pre>";
					$data = array(
									'product_name'  => $this->input->post('product_name'),
							);
					$product_name=$this->input->post('product_name');

					$exists= $this->inhouse_setting_model->exist_product($product_name);

					if (count($exists)>0) {
						echo json_encode(false);
					}else {
								$result=$this->inhouse_setting_model->insert_products($data);
								echo json_encode($result);
							}
		    }
			}
			public function product_update()
			{
				if ($this->session->userdata('user_name') != '') {
					$this->load->model('inhouse_setting_model');

					$product_id=$this->input->post('product_id');
					$product_name=$this->input->post('product_name');
					$exists= $this->inhouse_setting_model->exist_product($product_name);

							if (count($exists)>0) {
								echo json_encode(false);
							}else {
								$result=$this->inhouse_setting_model->update_products($product_id,$product_name);
								echo json_encode($result);
							}
		    }
			}
			public function product_delete()
			{
				if ($this->session->userdata('user_name') != '') {
					$this->load->model('inhouse_setting_model');

					$product_id=$this->input->post('product_id');
					$exist_size_for_product=$this->inhouse_setting_model->exist_size_for_product($product_id);
					if (count($exist_size_for_product)>0) {
						$product_size_delete=$this->inhouse_setting_model->delete_product_size_for_product($product_id);
						$result=$this->inhouse_setting_model->delete_products($product_id);
						echo json_encode($result);
					}else {
						$result=$this->inhouse_setting_model->delete_products($product_id);
						echo json_encode($result);
					}

		    }
			}
			public function show_products_size()
			{
				if ($this->session->userdata('user_name') != '') {
								$this->load->model('inhouse_setting_model');
			    			$data=$this->inhouse_setting_model->show_products_size();
				         echo json_encode($data);
				     }
			}
			public function show_products_name()
			{
				if ($this->session->userdata('user_name') != '') {
								$this->load->model('inhouse_setting_model');
			    			$data=$this->inhouse_setting_model->show_products_name();
				         echo json_encode($data);
				    }
			}
			public function save_product_size()
			{
				if ($this->session->userdata('user_name') != '') {
					$this->load->model('inhouse_setting_model');

					$product_id=$this->input->post('product_id');
					$product_size=$this->input->post('product_size');

					$exists= $this->inhouse_setting_model->exist_product_size($product_id,$product_size);

					if (count($exists)>0) {
						echo json_encode(false);
					}else {
								$data = array(
									'product_id'  => $product_id,
									'product_size_value'  => $product_size,
								);
								$result=$this->inhouse_setting_model->insert_products_size($data);
								echo json_encode($result);
							}
		    }

			}
			public function product_size_update()
			{
				if ($this->session->userdata('user_name') != '') {
					$this->load->model('inhouse_setting_model');

					$product_id=$this->input->post('product_id');
					$product_size_id=$this->input->post('product_size_id');
					$product_size=$this->input->post('product_size_value');
					$exists= $this->inhouse_setting_model->exist_product_size($product_id,$product_size);

							if (count($exists)>0) {
								echo json_encode(false);
							}else {
								$result=$this->inhouse_setting_model->update_product_size($product_size_id,$product_size);
								echo json_encode($result);
							}
		    }
			}
			public function product_size_delete()
			{
				if ($this->session->userdata('user_name') != '') {
					$this->load->model('inhouse_setting_model');

					$product_size_id=$this->input->post('product_size_id');
					$result=$this->inhouse_setting_model->delete_product_size($product_size_id);
					echo json_encode($result);

		    }
			}
			public function show_style_name()
			{
				if ($this->session->userdata('user_name') != '') {
								$this->load->model('inhouse_setting_model');
			    			$data=$this->inhouse_setting_model->show_style_name();
				         echo json_encode($data);
				     }
			}
			public function save_style()
			{
				if ($this->session->userdata('user_name') != '') {
					$this->load->model('inhouse_setting_model');

					$style_name=$this->input->post('style_name');
					$exists= $this->inhouse_setting_model->exist_style_name($style_name);

					if (count($exists)>0) {
						echo json_encode(false);
					}else {
								$data = array(
									'style_name'  => $style_name,
								);
								$result=$this->inhouse_setting_model->insert_style($data);
								echo json_encode($result);
							}
				}
			}
			public function style_update()
			{
				if ($this->session->userdata('user_name') != '') {
					$this->load->model('inhouse_setting_model');

					$style_id=$this->input->post('style_id');
					$style_name=$this->input->post('style_name');


					$exists= $this->inhouse_setting_model->exist_style_name($style_name);

					if (count($exists)>0) {
						echo json_encode(false);
					}else {
								$result=$this->inhouse_setting_model->update_style($style_id,$style_name);
								echo json_encode($result);
							}
				}
			}
			public function style_delete()
			{
				if ($this->session->userdata('user_name') != '') {
					$this->load->model('inhouse_setting_model');

					$style_id=$this->input->post('style_id');
					$del_style_dtl=$this->inhouse_setting_model->delete_style_dtl_for_style($style_id);
					$result=$this->inhouse_setting_model->delete_style($style_id);
					echo json_encode($result);

		    }
			}
			public function show_style_details()
			{
				if ($this->session->userdata('user_name') != '') {
								$this->load->model('inhouse_setting_model');
			    			$data=$this->inhouse_setting_model->show_style_details();
				         echo json_encode($data);
				     }
			}
			public function show_style_name_for_dtl()
			{
				if ($this->session->userdata('user_name') != '') {
								$this->load->model('inhouse_setting_model');
			    			$data=$this->inhouse_setting_model->show_style_name_for_dtl();
				         echo json_encode($data);
				     }
			}
			public function save_style_details()
			{
				if ($this->session->userdata('user_name') != '') {
					$this->load->model('inhouse_setting_model');

					$style_id=$this->input->post('style_id');
					$cutting_rate=$this->input->post('cutting_rate');
					$neck_cutting_rate=$this->input->post('neck_cutting_rate');

					$exists= $this->inhouse_setting_model->exist_style_dtl($style_id);

					if (count($exists)>0) {
						echo json_encode(false);
					}else {
								$data = array(
									'style_id'  => $style_id,
									'style_dtl_cutting_rate'  => $cutting_rate,
									'style_dtl_neck_cutting_rate'  => $neck_cutting_rate,
								);
								$result=$this->inhouse_setting_model->insert_style_details($data);
								echo json_encode($result);
							}
				}
			}
			public function style_dtl_update()
			{
				if ($this->session->userdata('user_name') != '') {
					$this->load->model('inhouse_setting_model');

					$style_dtl_id=$this->input->post('style_dtl_id');
					$cutting_rate=$this->input->post('cutting_rate');
					$neck_cutting_rate=$this->input->post('neck_cutting_rate');

					$result=$this->inhouse_setting_model->update_style_dtl($style_dtl_id,$cutting_rate,$neck_cutting_rate);
					echo json_encode($result);
				}
			}
			public function style_dtl_delete()
			{
				if ($this->session->userdata('user_name') != '') {
					$this->load->model('inhouse_setting_model');

					$style_dtl_id=$this->input->post('style_dtl_id');
					$result=$this->inhouse_setting_model->delete_style_dtl($style_dtl_id);
					echo json_encode($result);

		    }
			}
			public function show_cutting_man_list()
			{
				if ($this->session->userdata('user_name') != '') {
								$this->load->model('inhouse_setting_model');
			    			$data=$this->inhouse_setting_model->show_cutting_man_list();
				         echo json_encode($data);
				     }
			}
			public function save_cutting_man()
			{
				if ($this->session->userdata('user_name') != '') {
					$this->load->model('inhouse_setting_model');

					$cutting_man_name=$this->input->post('cutting_man_name');
					$cutting_man_designation=$this->input->post('cutting_man_designation');
					$data = array(
						'cutting_man_name'  => $cutting_man_name,
						'cutting_man_designation'  => $cutting_man_designation,
					);
					$result=$this->inhouse_setting_model->insert_cutting_man($data);
					echo json_encode($result);

				}
			}
			public function update_cutting_man()
			{
				if ($this->session->userdata('user_name') != '') {
					$this->load->model('inhouse_setting_model');

					$cutting_man_id=$this->input->post('cutting_man_id');
					$cutting_man_name=$this->input->post('cutting_man_name');
					$cutting_man_designation=$this->input->post('cutting_man_designation');

					$result=$this->inhouse_setting_model->update_cutting_man($cutting_man_id,$cutting_man_name,$cutting_man_designation);
					echo json_encode($result);
				}
			}
			public function cutting_man_delete()
			{
				if ($this->session->userdata('user_name') != '') {
					$this->load->model('inhouse_setting_model');

					$cutting_man_id=$this->input->post('cutting_man_id');
					$result=$this->inhouse_setting_model->delete_cutting_man($cutting_man_id);
					echo json_encode($result);

				}
			}
			public function show_cutting_man_designation()
			{
				if ($this->session->userdata('user_name') != '') {
								$this->load->model('inhouse_setting_model');
								$cutting_man_id=$this->input->post('cutting_man_id');
			    			$data=$this->inhouse_setting_model->show_cutting_man_designation($cutting_man_id);
				         echo json_encode($data);
				     }
			}

		}
