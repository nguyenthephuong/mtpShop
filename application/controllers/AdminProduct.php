<?php 
class AdminProduct extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->helper("url","form");
		$this->load->library("session");
		$this->load->model("Madmin");
		$this->load->library('form_validation');
	}

	public function index(){
		$info = $this->session->userdata('adminInfo');
		$data['info'] = $info;
		$data['admin'] = $this->Madmin->select($info);
		$data['error']="";
		if(empty($info))
			header('location: http://localhost/mtp/index.php/admin/login');

		$data['catalog'] = $this->Madmin->selectAllCatalog();
		$this->load->view("admin/catalog-view",$data);
	}

	public function productInsert(){
		$info = $this->session->userdata('adminInfo');
		$data['info'] = $info;
		$data['admin'] = $this->Madmin->select($info);
		if(empty($info))
			header('location: http://localhost/mtp/index.php/admin/login');

		$data['catalog'] = $this->Madmin->selectAllCatalog();
		$this->load->view("admin/product-insert",$data);
	}

	public function Upload(){
		//Load session
		$info = $this->session->userdata('adminInfo');
		$data['info'] = $info;
		$data['admin'] = $this->Madmin->select($info);
		$data['catalog'] = $this->Madmin->selectAllCatalog();
		if(empty($info))
			header('location: http://localhost/mtp/index.php/admin/login');
		///////

		$config['upload_path']          = "./asset/images/";
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 500;
        $config['max_width']            = 1024;
        $config['max_height']           = 968;
        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('image')){
        	$catalogid = $this->input->post('selectp');
        	$name = $this->input->post('namep');
        	$price = $this->input->post('pricep');
        	$des = $this->input->post('description');
        	if(empty($des))
        		$des="đang cập nhật";
        	$images = $this->input->get('imgfile');
        	$productid = $this->input->get('idp');
        	$this->Madmin->updateProduct($productid,$catalogid,$name,$price,$des,$images);
        	header('location: http://localhost/mtp/index.php/adminproduct/showp?idc='.$catalogid);
        }else{
        	$imageInfo = $this->upload->data();
        	$catalogid = $this->input->post('selectp');
        	$name = $this->input->post('namep');
        	$price = $this->input->post('pricep');
        	$des = $this->input->post('description');
        	if(empty($des))
        		$des="đang cập nhật";
        	$images = "http://localhost/mtp/asset/images/".$imageInfo['file_name'];
        	$productid = $this->input->get('idp');
        	$this->Madmin->updateProduct($productid,$catalogid,$name,$price,$des,$images);
        	header('location: http://localhost/mtp/index.php/adminproduct/showp?idc='.$catalogid);
        }        
	}

	public function showc(){
		$info = $this->session->userdata('adminInfo');
		$data['info'] = $info;
		$data['admin'] = $this->Madmin->select($info);
		$data['error']="";
		if(empty($info))
			header('location: http://localhost/mtp/index.php/admin/login');

		$data['catalog'] = $this->Madmin->selectAllCatalog();
		$this->load->view("admin/catalog-view",$data);
	}

	public function showp(){
		$info = $this->session->userdata('adminInfo');
		$data['info'] = $info;
		$data['admin'] = $this->Madmin->select($info);
		$data['error']="";
		if(empty($info))
			header('location: http://localhost/mtp/index.php/admin/login');

		$data["idc"] = $this->input->get('idc');
		$data['subcatalog'] = $this->Madmin->getSubCatalog($data['idc']);
		if($data['subcatalog'] != 0){  // tức là có catalog con.
			$data['catalog'] = $this->Madmin->selectAllSubCatalog($data['idc']);
			$this->load->view("admin/catalog-sub-view",$data);
		}else{
			$config['base_url'] = 'http://localhost//mtp/index.php/adminproduct/showp';
			$config['total_rows'] = $this->Madmin->count_product($data["idc"]);
			$config['per_page'] = 8;
	        $config['uri_segment'] = 3;
	        $config['num_links'] = 2;
	        $config['get'] = '?id='.$data["idc"];
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

	        $product_array = $this->Madmin->selectAllProduct($config['per_page'],$this->uri->segment(3),$data["idc"]);
	        $data['product'] = $product_array;
			$this->load->view("admin/product-view",$data);
		}	
	}
	//Search product
	public function productSearch(){
		$info = $this->session->userdata('adminInfo');
		$data['admin'] = $this->Madmin->select($info);
		$data['info'] = $info;
		if(empty($info))
			header('location: http://localhost/mtp/index.php/admin/login');
		
		$name= $this->input->get("name");
		$data['idc'] = $this->input->get("idc");
		if($name != ""){
			$data['product'] = $this->Madmin->searchProduct(strtoupper($name));
			if($data['product'] == null){
				header('location: http://localhost/mtp/index.php/adminproduct/showp?idc='.$data['idc']);
			}else
			$this->load->view("admin/search-product",$data);			
		}else{
			header('location: http://localhost/mtp/index.php/adminproduct/showc');
		}
	}

	//DELETE product
	public function productDelete(){
		$idp = $this->input->get("idp");
		$idc = $this->input->get("idc");
		$this->Madmin->deleteProduct($idp);
		header('location: http://localhost/mtp/index.php/adminproduct/showp?idc='.$idc);
	}
	// Edit product
	public function productEdit(){
		$info = $this->session->userdata('adminInfo');
		$data['info'] = $info;
		$data['admin'] = $this->Madmin->select($info);
		$data['error']="";
		if(empty($info))
			header('location: http://localhost/mtp/index.php/admin/login');

		$idp = $this->input->get("idp");
		$data['product'] = $this->Madmin->selectAllProduct2($idp);
		$data['catalog'] = $this->Madmin->selectAllCatalog();
		$this->load->view("admin/product-edit",$data);
	}

	//Insert Catalog
	public function catalogInsert(){
		$info = $this->session->userdata('adminInfo');
		$data['admin'] = $this->Madmin->select($info);
		$data['info'] = $info;
		if(empty($info))
			header('location: http://localhost/mtp/index.php/admin/login');

		$catalogparent = $this->input->post("selectcatalog");
		$catalogname = $this->input->post("catalogname");
		$data['catalog'] = $this->Madmin->selectAllCatalog();
		if($catalogname!=null && $catalogparent!=null){
			$this->Madmin->insertCatalog($catalogname,$catalogparent);
			header('location: http://localhost/mtp/index.php/adminproduct');
		}
			
		$this->load->view("admin/catalog-insert",$data);
	}

	//Delete catalog
	public function catalogDelete(){
		$idc = $this->input->get("idc");
		$this->Madmin->deleteCatalog($idc);
		$pidc = $this->input->get("pidc");
		if(!empty($pidc))
			header('location: http://localhost/mtp/index.php/adminproduct/showp?idc='.$pidc);
		else
			header('location: http://localhost/mtp/index.php/adminproduct/');
	}

	//Edit catalog
	public function catalogEdit(){
		$info = $this->session->userdata('adminInfo');
		$data['admin'] = $this->Madmin->select($info);
		$data['info'] = $info;
		if(empty($info))
			header('location: http://localhost/mtp/index.php/admin/login');

		$idc = $this->input->get("idc");
		$data['catalog'] = $this->Madmin->selectOneCatalog($idc);
		$catalogname = $this->input->post("catalogname");
		if(!empty($catalogname)){
			$this->Madmin->updateCatalog($idc,$catalogname);
			header('location: '.base_url().'index.php/adminproduct');
		}
		$this->load->view("admin/catalog-edit",$data);
	}

	////////Quản lý Users
	//show users
	public function showu(){
		$info = $this->session->userdata('adminInfo');
		$data['admin'] = $this->Madmin->select($info);
		$data['info'] = $info;
		if(empty($info))
			header('location: http://localhost/mtp/index.php/admin/login');

		$config['base_url'] = 'http://localhost//mtp/index.php/adminproduct/showu';
			$config['total_rows'] = $this->Madmin->count_user();
			$config['per_page'] = 6;
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

	        $user_array = $this->Madmin->selectAllUser($config['per_page'],$this->uri->segment(3));
	        $data['user'] = $user_array;
		$this->load->view("admin/user-view",$data);
	}

	public function userEdit(){
		$info = $this->session->userdata('adminInfo');
		$data['admin'] = $this->Madmin->select($info);
		$data['info'] = $info;
		if(empty($info))
			header('location: http://localhost/mtp/index.php/admin/login');

		$id = $this->input->get("idu");
		$data['user'] = $this->Madmin->selectOneUser($id);
		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$pass = $this->input->post('pass');
		$phone = $this->input->post('phone');
		$address = $this->input->post('address');
		if(!empty($name) && !empty($email) && !empty($pass) && !empty($phone) && !empty($address)){
			$this->Madmin->updateUser($id,$name,$email,$pass,$phone,$address);
			header('location: http://localhost/mtp/index.php/adminproduct/showu');
		}
		$this->load->view("admin/user-edit",$data);
	}

	public function userDelete(){
		$info = $this->session->userdata('adminInfo');
		$data['admin'] = $this->Madmin->select($info);
		$data['info'] = $info;
		if(empty($info))
			header('location: http://localhost/mtp/index.php/admin/login');
		$id = $this->input->get("idu");
		if(!empty($id)){
			$data['user'] = $this->Madmin->deleteUser($id);
			header('location: http://localhost/mtp/index.php/adminproduct/showu');
		}
	}

	public function userSearch(){
		$info = $this->session->userdata('adminInfo');
		$data['admin'] = $this->Madmin->select($info);
		$data['info'] = $info;
		if(empty($info))
			header('location: http://localhost/mtp/index.php/admin/login');
		
		$email= $this->input->get("email");
		if($email != ""){
			$data['user'] = $this->Madmin->searchUser($email);
			if($data['user'] == null){
				header('location: http://localhost/mtp/index.php/adminproduct/userSearch?email=');
			}else
			$this->load->view("admin/search-user",$data);				
		}else{
			header('location: http://localhost/mtp/index.php/adminproduct/showu');
		}
	}

	////////Quản lý admin
	public function showad(){
		$info = $this->session->userdata('adminInfo');
		$data['admin'] = $this->Madmin->select($info);
		$data['info'] = $info;
		if(empty($info))
			header('location: http://localhost/mtp/index.php/admin/login');

	    $data['admin'] = $this->Madmin->selectAllAdmin();
		$this->load->view("admin/quanlyadmin-view",$data);
	}

	public function adminDelete(){
		$info = $this->session->userdata('adminInfo');
		$data['admin'] = $this->Madmin->select($info);
		$data['info'] = $info;
		if(empty($info))
			header('location: http://localhost/mtp/index.php/admin/login');
		
		$id = $this->input->get("idad");
		if(!empty($id)){
			$this->Madmin->deleteAdmin($id);
			header('location: http://localhost/mtp/index.php/adminproduct/showad');
		}
	}
	public function adminEdit(){
		$info = $this->session->userdata('adminInfo');
		$data['admin'] = $this->Madmin->select($info);
		$data['info'] = $info;
		if(empty($info))
			header('location: http://localhost/mtp/index.php/admin/login');

		$id = $this->input->get("idad");
		$data['admin'] = $this->Madmin->selectOneAdmin($id);
		$namelogin = $this->input->post('namelogin');
		$pass = $this->input->post('pass');
		$fullname = $this->input->post('fullname');
		if(!empty($namelogin) && !empty($pass) && !empty($fullname)){
			$this->Madmin->updateAdmin($id,$namelogin,$pass,$fullname);
			header('location: http://localhost/mtp/index.php/adminproduct/showad');
		}
		$this->load->view("admin/admin-edit",$data);
	}
	public function adminInsert(){
		$info = $this->session->userdata('adminInfo');
		$data['admin'] = $this->Madmin->select($info);
		$data['info'] = $info;
		if(empty($info))
			header('location: http://localhost/mtp/index.php/admin/login');

		$this->form_validation->set_rules('nameLogin', 'tên đăng nhập', 'required|min_length[6]',array(
			'required' => 'Bạn chưa nhập %s!',
			'min_length' => '%s phải dài hơn 6 kí tự!'
			));
		$this->form_validation->set_rules('pass', 'mật khẩu', 'required|min_length[6]',array(
			'required' => 'Bạn chưa nhập %s',
			'min_length' => '%s phải dài hơn 6 kí tự!'
			));
		$this->form_validation->set_rules('fullname', 'họ tên', 'required',array(
			'required' => 'Bạn chưa nhập %s'
			));

		if($this->form_validation->run() == FALSE){
			$data['error'] = "";
            $this->load->view("admin/admin-insert",$data);
        }else{
        	$namelogin = $this->input->post('nameLogin');
        	$pass = $this->input->post('pass');
        	$fullname = $this->input->post('fullname');
        	$this->Madmin->insertAdmin($namelogin,$pass,$fullname);
        	header('location: http://localhost/mtp/index.php/adminproduct/showad');
        	$this->load->view("admin/admin-insert",$data);
        }
	}

	//Quản lý giao dịch
	public function showtrans(){
		$info = $this->session->userdata('adminInfo');
		$data['admin'] = $this->Madmin->select($info);
		$data['info'] = $info;
		if(empty($info))
			header('location: http://localhost/mtp/index.php/admin/login');

		$config['base_url'] = 'http://localhost//mtp/index.php/adminproduct/showtrans';
			$config['total_rows'] = $this->Madmin->count_trans();
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

	        $trans_array = $this->Madmin->selectAllTrans($config['per_page'],$this->uri->segment(3));
	        $data['trans'] = $trans_array;

		$this->load->view("admin/admin-trans",$data);
	}
	public function transDelete(){
		$info = $this->session->userdata('adminInfo');
		$data['admin'] = $this->Madmin->select($info);
		$data['info'] = $info;
		if(empty($info))
			header('location: http://localhost/mtp/index.php/admin/login');
		
		$id = $this->input->get("idtrans");
		if(!empty($id)){
			$this->Madmin->deleteTrans($id);
			header('location: http://localhost/mtp/index.php/adminproduct/showtrans');
		}
	}
	public function transEdit(){
		$info = $this->session->userdata('adminInfo');
		$data['admin'] = $this->Madmin->select($info);
		$data['info'] = $info;
		if(empty($info))
			header('location: http://localhost/mtp/index.php/admin/login');

		$id = $this->input->get("idtrans");
		$data['trans'] = $this->Madmin->selectOneTrans($id);
		$status = $this->input->post('status');
		$fullname = $this->input->post('fullname');
		$email = $this->input->post('email');
		$phone = $this->input->post('phone');
		$address = $this->input->post('address');
		if(!empty($fullname) && !empty($email) && !empty($phone) && !empty($address)){
			$this->Madmin->updateTrans($id,$status,$fullname,$email,$phone,$address);
			header('location: http://localhost/mtp/index.php/adminproduct/showtrans');
		}
		$this->load->view("admin/trans-edit",$data);
	}
	public function transSearch(){
		$info = $this->session->userdata('adminInfo');
		$data['admin'] = $this->Madmin->select($info);
		$data['info'] = $info;
		if(empty($info))
			header('location: http://localhost/mtp/index.php/admin/login');
		
		$trans= $this->input->get("idtrans");
		if($trans != ""){
			$data['trans'] = $this->Madmin->searchTrans($trans);
			if($data['trans'] == null){
				header('location: http://localhost/mtp/index.php/adminproduct/transSearch?trans=');
			}else
				$this->load->view("admin/search-trans",$data);				
		}else{
			header('location: http://localhost/mtp/index.php/adminproduct/showtrans');
		}
	}
}
?>