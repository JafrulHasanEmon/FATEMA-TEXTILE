<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_controller extends CI_Controller {

	 function __construct() {
			 parent::__construct();
			 $this->load->library('form_validation');
	 }
	public function index()
	{
		$this->load->view('login');
	}



	public function login_validation(){
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$this->load->model('Login_model');

		$validate = $this->Login_model->user_fetch($username, $password);

		if($validate->num_rows() > 0){
        $data  = $validate->row_array();
        $user_id  = $data['user_id'];
        $user_name = $data['user_name'];
        $user_designation = $data['user_designation'];
        $sesdata = array(
            'user_id'  => $user_id,
            'user_name'     => $user_name,
            'user_designation'     => $user_designation
        );
        $this->session->set_userdata($sesdata);
        // access login for admin
        if($user_designation === 'admin' || $user_designation === 'super_admin'){
          redirect(base_url() . 'index.php/Login_controller/login_success');
        }

    }else{
        echo $this->session->set_flashdata('msg','Username or Password is Wrong');
        redirect(base_url() . 'index.php/Login_controller/index');
    }

	}

	public function login_success(){
		if($this->session->userdata('user_designation') == 'super_admin')
		{
			?>
			<script type="text/javascript">
				alert('Welcome <?php echo $this->session->userdata('user_designation'); ?>');
				window.location.href = '<?php echo base_url(); ?>index.php/Dashboard';
			</script>
			<?php
		}
	elseif($this->session->userdata('user_designation') == 'admin')
		{
			?>
			<script type="text/javascript">
				alert('Welcome <?php echo $this->session->userdata('user_designation'); ?>');
				window.location.href = '<?php echo base_url(); ?>index.php/Dashboard';
			</script>
			<?php
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url() . 'index.php/Login_controller/index');
	}
}
