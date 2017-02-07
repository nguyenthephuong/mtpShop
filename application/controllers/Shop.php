<?php 
class Shop extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->helper("url");
		$this->load->library("session");
		$this->load->Model('Mshop');
	}

	public function index(){
		$this->load->Model('Mshop');
		// Get Catalog
		$catalog_array = $this->Mshop->getCatalog();
		$data["catalog"] = $catalog_array;
		// Get Product
		$config['base_url'] = 'http://localhost//mtp/index.php/shop/index';
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

		$this->load->view("shop/shop-view",$data);
		$info = $this->session->userdata('userInfo');
		if(!empty($info))
			header('location: http://localhost/mtp/index.php/users');		
	}
	
	function about(){
		$infouser = $this->session->userdata('userInfo');
		$data["email"] = $infouser;
		$this->load->view("shop/about",$data);
	}

	///Search
	public function search(){

		$catalog_array = $this->Mshop->getCatalog();
		$data["catalog"] = $catalog_array;
		$s = $this->input->get("str");
		$s = strtoupper($s);
		// Get Product
		$config['base_url'] = 'http://localhost/mtp/index.php/shop/search';
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
		$this->load->view("shop/searchg",$data);
	}
}
?>