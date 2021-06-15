<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {


	public function index()
	{
			if($this->session->userdata('user_name') != '')
			{
				if ($this->session->userdata('user_designation') == 'super_admin' || $this->session->userdata('user_designation') == 'admin')
				{
					$this->load->model('dashboard_model');
					$currentDate=date("Y-m-d");
					$data["total_tran_amount_per_day"]=$this->dashboard_model->total_tran_amount_per_day($currentDate);
					// $data["total_dep_amount_per_day"]=$this->Dashboard_model->fetch_restaurant_information();
					// $data["total_cost_amount_per_day"]=$this->Dashboard_model->fetch_restaurant_information();
					$this->load->view('dashboard',$data);
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
			public function show_daily_costing()
			{
				if($this->session->userdata('user_name') != '')
				{
					$this->load->model('dashboard_model');
					$data=$this->dashboard_model->show_daily_costing();
					echo json_encode($data);

					// echo "<pre>";
					// print_r($data);
					// echo "<pre>";
				}
			}
		}
