<?php 
	class Admin extends CI_Controller{

		public function __construct(){
			parent::__construct();
			$this->load->library("session");
			$this->load->model("Madmin");
			$this->load->library('form_validation');
			$this->load->helper("url",'form');
		}

		public function index(){
			$info = $this->session->userdata('adminInfo');
			$data['info'] = $info;
			$data['admin'] = $this->Madmin->select($info);
			if(empty($info))
				header('location: http://localhost/mtp/index.php/admin/login');
			$this->load->view("admin/admin-view",$data);
		}

		public function login(){
			$info = $this->session->userdata('adminInfo');
			if(!empty($info))
				header('location: http://localhost/mtp/index.php/admin');
			
			$this->form_validation->set_rules('fadmin', 'Tên đăng nhập', 'required',array(
				'required' => "Bạn chưa nhập %s"
				));
			$this->form_validation->set_rules('fpass', 'Mật khẩu', 'required',array(
				'required' => "Bạn chưa nhập %s"
				));
			if($this->form_validation->run() == FALSE){
				$data['error'] = "";
            	$this->load->view("admin/login-admin",$data);
        	}else{
        		$name = $this->input->post('fadmin');
				$pass = $this->input->post('fpass');
				$data["check"] = $this->Madmin->checkLogin($name, $pass);
				if ($data['check'] == 1){
					$adminData = $name;
					$this->session->set_userdata('adminInfo', $adminData);
					header('location: http://localhost/mtp/index.php/admin');
				}
				$this->load->view("admin/login-admin",$data);
        	}	
		}

		public function logout(){
			$this->session->unset_userdata('adminInfo');
			header('location: http://localhost/mtp/index.php/admin/login');
		}
	}
?>