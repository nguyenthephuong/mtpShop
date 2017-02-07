<?php
class Users extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->helper("url",'form');
		$this->load->library("session");
		$this->load->library('form_validation');
		$this->load->Model('Mshop');
		$this->load->model("Musers");
	}

	public function index(){
		$info = $this->session->userdata('userInfo');
		if(empty($info))
			header('location: http://localhost/mtp/index.php/users/login');
		$data["email"] = $info;		
		$catalog_array = $this->Mshop->getCatalog();
		$data["catalog"] = $catalog_array;
		// Get Product
		$config['base_url'] = 'http://localhost//mtp/index.php/users/index';
		$config['total_rows'] = $this->Mshop->count_product();
		$config['per_page'] = 8;
        $config['uri_segment'] = 3;
        $config['num_links'] = 2;

        //Custom pagination css
        $config['full_tag_open'] = '<nav><ul class="pagination">';
    	$config['full_tag_close'] = '</ul></nav>';
        $config['first_link'] = '&laquo; First';
        $config['first_tag_open'] = '<li>';
    	$config['first_tag_close'] = '</li>';
    	$config['last_link'] = 'Last &raquo;';
	    $config['last_tag_open'] = '<li>';
	    $config['last_tag_close'] = '</li>';

	    $config['next_link'] = 'Next &rarr;';
	    $config['next_tag_open'] = '<li>';
	    $config['next_tag_close'] = '</li>';

	    $config['prev_link'] = '&larr; Previous';
	    $config['prev_tag_open'] = '<li>';
	    $config['prev_tag_close'] = '</li>';
    	$config['cur_tag_open'] = '<li class="active"><a href="">';
	    $config['cur_tag_close'] = '</a></li>';

	    $config['num_tag_open'] = '<li>';
	    $config['num_tag_close'] = '</li>';
        //////

        $this->load->library('pagination',$config);
        $this->pagination->initialize($config);
		$product_array = $this->Mshop->getProduct($config['per_page'],$this->uri->segment(3));
		$data["product"] = $product_array;

		$this->load->view("shop/shop-view-users",$data);
	}

	public function login(){
		$info = $this->session->userdata('userInfo');
		if(!empty($info))
			header('location: http://localhost/mtp/index.php/users');

		$this->load->Model("Musers");
		$this->form_validation->set_rules('fusername', 'email', 'required|valid_email',array(
			'required' => 'Bạn chưa nhập %s',
			'valid_email' => 'Email chưa đúng định dạng'
			));
		$this->form_validation->set_rules('fpass', 'mật khẩu', 'required',array(
			'required' => 'Bạn chưa nhập %s'
			));
		if($this->form_validation->run() == FALSE){
			$data['error'] = "";
            $this->load->view("users/login-user",$data);
        }else{
        	$email = $this->input->post('fusername');
			$pass = $this->input->post('fpass');
			$data["check"] = $this->Musers->checkLogin($email, $pass);
			if ($data['check'] == 1){
				$userData = $email;
				$this->session->set_userdata('userInfo', $userData);
				header('location: http://localhost/mtp/index.php/users');
			}else
			{
				$data['error'] = "Email hoặc mật khẩu không tồn tại"; 
				$this->load->view("users/login-user",$data);
			}	
        }
		
	}

	public function logout(){
		$this->session->unset_userdata('userInfo');
		header('location: http://localhost/mtp/index.php/shop');
	}

	public function register(){
		
		$this->form_validation->set_rules('fname', 'Họ tên', 'required|min_length[6]',array(
			'required' => "Bạn chưa nhập %s",
			'min_length' => "Tên của bạn quá ngắn???"
			));
		$this->form_validation->set_rules('femail', 'Email', 'required|valid_email',array(
			'required' => "Bạn chưa nhập %s",
			'valid_email' => 'Email chưa đúng định dạng'
			));
		$this->form_validation->set_rules('fpass', 'Mật khẩu', 'required|min_length[6]',array(
			'required' => "Bạn chưa nhập %s",
			'min_length' => "%s của bạn phải nhiểu hơn 6 kí tự"
			));
		$this->form_validation->set_rules('fpasscf', 'Mật khẩu', 'required|matches[fpass]',array(
			'required' => "Bạn chưa nhập %s",
			'matches' => 'Mật khẩu nhập lại chưa đúng'
			));

		if($this->form_validation->run() == FALSE){
			$data['error'] = "";
            $this->load->view("users/register",$data);
        }else{
        	$name = $this->input->post('fname');
			$email = $this->input->post('femail');
			$pass = $this->input->post('fpass');

			$data["checkInsert"] = $this->Musers->insertUser($name,$email,$pass);
			if($data["checkInsert"] == 2)
				$data['error'] = "Email đã tồn tại. Bạn hay dùng email khác để đăng ký!";
			if($data["checkInsert"] == 1)
				header('location: http://localhost/mtp/index.php/users/login');
			$this->load->view("users/register",$data);
        }
	}
	public function infoUser(){
		$info = $this->session->userdata('userInfo');
		if(empty($info))
			header('location: http://localhost/mtp/index.php/users/login');
		$email= $info;

		$query = $this->Musers->selectInfo($email);
		$data["name"] = trim($query[0]["name"]);
		$data["phone"] = $query[0]["phone"];
		$data["address"] = trim($query[0]["address"]);

		$this->form_validation->set_rules('fname', 'Họ tên', 'required|min_length[6]',array(
			'required' => "Bạn vừa để trống %s",
			'min_length' => "Tên của bạn quá ngắn???"
			));
		$this->form_validation->set_rules('fphone', 'Số điện thoại', 'required|numeric',array(
			'required' => "Bạn vừa để trống %s",
			'numeric' => 'Số điện thoại không được chứa kí tự chữ cái!'
			));
		$this->form_validation->set_rules('faddress', 'Địa chỉ', 'required|min_length[6]',array(
			'required' => "Bạn vừa để trống %s",
			'min_length' => 'Địa chỉ quá ngắn'
			));

		if($this->form_validation->run() == FALSE){
			$data['error'] = "";
            $this->load->view("users/info-user",$data);
        }else{
        	$name = $this->input->post('fname');
			$phone = $this->input->post('fphone');
			$address = $this->input->post('faddress');
			if(!empty($name) && !empty($phone) && !empty($address)){
				$check = $this->Musers->updateInfo($email,$name,$phone,$address);
				header('location: http://localhost/mtp/index.php/users/');
			}
			$this->load->view("users/info-user",$data);
        }	
	}

	public function changePass(){
		$info = $this->session->userdata('userInfo');
		if(empty($info))
			header('location: http://localhost/mtp/index.php/users/login');
		$email= $info;

		$this->form_validation->set_rules('cpass', 'Mật khẩu', 'required|min_length[6]',array(
			'required' => "Bạn chưa nhập %s",
			'min_length' => "%s của bạn phải nhiểu hơn 6 kí tự"
			));
		$this->form_validation->set_rules('npass', 'Mật khẩu', 'required|min_length[6]',array(
			'required' => "Bạn chưa nhập %s",
			'min_length' => "%s của bạn phải nhiểu hơn 6 kí tự"
			));

		if($this->form_validation->run() == FALSE){
			$data['error'] = "";
            $this->load->view("users/change-pass",$data);
        }else{
        	$cpass = $this->input->post('cpass');
			$npass = $this->input->post('npass');
			$check = $this->Musers->checkCpass($email);
			$pass = trim($check[0]['password']);
			if($check != null && $cpass == $pass){
				$this->Musers->updatePass($email,$npass);
				$this->session->unset_userdata('userInfo');
				header('location: http://localhost/mtp/index.php/users/login');
			}else{
				header('location: http://localhost/mtp/index.php/users/changePass');
			}
			$this->load->view("users/change-pass",$data);
        }	
	}

	public function transHis(){
		$info = $this->session->userdata('userInfo');
		if(empty($info))
			header('location: http://localhost/mtp/index.php/users/login');
		$data['email']= $info;

		$user = $this->Musers->getIdUser($data['email']);
		$config['base_url'] = 'http://localhost//mtp/index.php/users/transHis';
			$config['total_rows'] = $this->Musers->count_trans($user[0]['user#']);
			$config['per_page'] = 5;
	        $config['uri_segment'] = 3;
	        $config['num_links'] = 2;
	        $config['full_tag_open'] = '<nav><ul class="pagination">';
	    	$config['full_tag_close'] = '</ul></nav>';
	        $config['first_link'] = '&laquo; First';
	        $config['first_tag_open'] = '<li>';
	    	$config['first_tag_close'] = '</li>';
	    	$config['last_link'] = 'Last &raquo;';
		    $config['last_tag_open'] = '<li>';
		    $config['last_tag_close'] = '</li>';

		    $config['next_link'] = 'Next &rarr;';
		    $config['next_tag_open'] = '<li>';
		    $config['next_tag_close'] = '</li>';

		    $config['prev_link'] = '&larr; Previous';
		    $config['prev_tag_open'] = '<li>';
		    $config['prev_tag_close'] = '</li>';
	    	$config['cur_tag_open'] = '<li class="active"><a href="">';
		    $config['cur_tag_close'] = '</a></li>';

		    $config['num_tag_open'] = '<li>';
		    $config['num_tag_close'] = '</li>';
	        //////
	        $this->load->library('pagination',$config);
	        $this->pagination->initialize($config);

	        $trans_array = $this->Musers->getInfoTrans($config['per_page'],$this->uri->segment(3),$user[0]['user#']);
	        $data['trans'] = $trans_array;
		$this->load->view("shop/trans-view",$data);
	}

	///Search
	public function search(){
		$info = $this->session->userdata('userInfo');
		if(empty($info))
			header('location: http://localhost/mtp/index.php/users/login');
		$data["email"] = $info;		
		$catalog_array = $this->Mshop->getCatalog();
		$data["catalog"] = $catalog_array;
		$s = $this->input->get("str");
		$s = strtoupper($s);
		if($this->Mshop->count_searchProduct($s) == 0){

		}
		// Get Product
		$config['base_url'] = 'http://localhost/mtp/index.php/users/search';
		$config['total_rows'] = $this->Mshop->count_searchProduct($s);
		$config['per_page'] = 8;
        $config['uri_segment'] = 3;
        $config['num_links'] = 2;
        $config['get'] = '?str'.$s;
	    if (count($_GET) > 0) $config['suffix'] = '?' . http_build_query($_GET, '', "&");
	    $config['first_url'] = $config['base_url'].'?'.http_build_query($_GET);

        //Custom pagination css
        $config['full_tag_open'] = '<nav><ul class="pagination">';
    	$config['full_tag_close'] = '</ul></nav>';
        $config['first_link'] = '&laquo; First';
        $config['first_tag_open'] = '<li>';
    	$config['first_tag_close'] = '</li>';
    	$config['last_link'] = 'Last &raquo;';
	    $config['last_tag_open'] = '<li>';
	    $config['last_tag_close'] = '</li>';

	    $config['next_link'] = 'Next &rarr;';
	    $config['next_tag_open'] = '<li>';
	    $config['next_tag_close'] = '</li>';

	    $config['prev_link'] = '&larr; Previous';
	    $config['prev_tag_open'] = '<li>';
	    $config['prev_tag_close'] = '</li>';
    	$config['cur_tag_open'] = '<li class="active"><a href="">';
	    $config['cur_tag_close'] = '</a></li>';

	    $config['num_tag_open'] = '<li>';
	    $config['num_tag_close'] = '</li>';
        //////

        $this->load->library('pagination',$config);
        $this->pagination->initialize($config);
		$product_array = $this->Mshop->searchProduct($config['per_page'],$this->uri->segment(3),$s);
		$data["product"] = $product_array;
		$data['skq'] = $this->Mshop->count_searchProduct($s);
		$this->load->view("shop/searchu",$data);
	}
}
	
?>