<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock extends CI_Controller {


	public function index()
	{
			if($this->session->userdata('user_name') != '')
			{
				if ($this->session->userdata('user_designation') == 'super_admin' || $this->session->userdata('user_designation') == 'admin')
				{
					$this->load->view('stock');
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
			public function show_stock_data()
			{
				if($this->session->userdata('user_name') != '')
				{
					$this->load->model('stock_model');
					$data=$this->stock_model->show_stock_data();
					echo json_encode($data);

				}
			}


		}
