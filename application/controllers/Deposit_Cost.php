<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Deposit_Cost extends CI_Controller {

	 // function __construct() {
		// 	 parent::__construct();
		// 	 $this->load->library('form_validation');
	 // }
	 function __construct(){
         parent::__construct();
         $this->load->model('deposit_cost_model');
     }
	public function index()
	{

		if($this->session->userdata('user_name') != '')
		{
			if ($this->session->userdata('user_designation') == 'super_admin') {
				$this->load->view('deposit_cost');
		}else {
				?>
				<script type="text/javascript">
					alert('You dont have the permission to view this page.');
					window.location.href = '<?php echo base_url(); ?>index.php/Login_controller';
				</script>
		 	<?php
			}

		}
		else{
			redirect(base_url() . 'index.php/Login_controller/index');
		}
	}

	public function save(){
		if ($this->session->userdata('user_name') != '') {
      $result=$this->deposit_cost_model->save_data();
        echo json_encode($result);
    }
	}

	function show_data(){
		if ($this->session->userdata('user_name') != '') {
    			$data=$this->deposit_cost_model->show_data();
	         echo json_encode($data);
	     }
		 }
	function dcr_update(){
		if ($this->session->userdata('user_name') != '') {

         	$dcr_id=$this->input->post('dcr_id');
          $dcr_flag=$this->input->post('option_edit');
          $dcr_deposit_name=$this->input->post('deposit_name_edit');
          $dcr_cost_name=$this->input->post('cost_name_edit');
          $dcr_date=$this->input->post('date_edit');
          $dcr_amount=$this->input->post('amount_edit');
					// echo "<pre>";
					// print_r($dcr_id);
					// echo "</pre>";
		      $result=$this->deposit_cost_model->update_data($dcr_id,$dcr_flag,$dcr_deposit_name,$dcr_cost_name,$dcr_date,$dcr_amount);
		      echo json_encode($result);
		 }
	 }
		 public function dcr_delete()
		 {
			 if ($this->session->userdata('user_name') != '') {

			 $dcr_id=$this->input->post('dcr_id');

			 $result=$this->deposit_cost_model->delete_data($dcr_id);
			 echo json_encode($result);

		 }
	 }
		 public function show_daily_costing()
		 {
			 if ($this->session->userdata('user_name') != '') {
			 $data=$this->deposit_cost_model->show_daily_costing();
			 echo json_encode($data);
		 }
		}
}
