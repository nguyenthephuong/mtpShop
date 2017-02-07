<?php
class Test extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->helper("url",'form');
		$this->load->library("session");
		$this->load->library('form_validation');
	}

	public function index(){
		$this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'User name', 'required|min_length[6]');
        if($this->form_validation->run() == FALSE){
            $this->load->view("users/test");
        }
	}
}
	
?>