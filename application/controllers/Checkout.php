<?php 
class Checkout extends CI_Controller{

	public function __construct(){
		parent::__construct();
        $this->load->helper(array('form','url'));
		$this->load->library("session");
        $this->load->library("cart");
        $this->load->library("form_validation");
        $this->load->model("Mcart");
	}

    public function index(){
        $info = $this->session->userdata('userInfo');
        if(empty($info))
            header('location: http://localhost/mtp/index.php/users');
        $data["email"] = $info;
        //Show ra gio hang.
        $cart = $this->cart->contents();
        $data['cart'] = $cart;
        $data['amount'] = $this->input->get('amount');
        $this->load->view('shop/checkout',$data);
    }

    public function creTrans(){
        $info = $this->session->userdata('userInfo');
        if(empty($info))
            header('location: http://localhost/mtp/index.php/users');
        $data["email"] = $info;
        $amount = $this->input->get("amount");
        $this->form_validation->set_rules('fullname', 'họ tên', 'required|min_length[6]',array(
            'required' => "Bạn chưa nhập %s!",
            'min_length' => "Tên của bạn quá ngắn???"
            ));
        $this->form_validation->set_rules('phone', 'số điện thoại', 'required|numeric',array(
            'required' => "Bạn chưa nhập %s!",
            'numeric' => 'Số điện thoại không được chứa kí tự chữ cái!'
            ));
        $this->form_validation->set_rules('email', 'email', 'required|valid_email',array(
            'required' => "Bạn chưa nhập %s!",
            'valid_email' => 'Email chưa đúng định dạng'
            ));
        $this->form_validation->set_rules('address', 'địa chỉ', 'required|min_length[6]',array(
            'required' => "Bạn chưa nhập %s!",
            'min_length' => 'Địa chỉ quá ngắn'
            ));

        if($this->form_validation->run() == FALSE){
            $data['amount'] = $amount;
            $this->load->view("shop/checkout",$data);
        }else{
            $fullname = $this->input->post("fullname");
            $phone = $this->input->post("phone");
            $email = $this->input->post("email");
            $address = $this->input->post("address");
            $mess = $this->input->post("mess");
            $created = date("Y/m/d");
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $createt = date("h:i:sa");

            $userid = $this->Mcart->findUserId($data["email"]);
            $this->Mcart->creTrans($userid[0]['user#'],$fullname,$email,$phone,$address,$amount,$mess,$created,$createt);
        
            header('location: http://localhost/mtp/index.php/checkout/creOrder?createt='.$createt);
        }  
    }

    public function creOrder(){
        $createt = $this->input->get('createt');
        $transid = $this->Mcart->selectOneIdTrans($createt);
        $cart = $this->cart->contents();
        foreach ($cart as $item) {
            $this->Mcart->creOrder($transid[0]['transaction#'],$item['id'],$item['name'],$item['qty'],$item['subtotal'],$item['options']['size']);
        }
        header('location: http://localhost/mtp/index.php/checkout/clearCart');
    }

    public function clearCart(){
        $info = $this->session->userdata('userInfo');
        if(empty($info))
            header('location: http://localhost/mtp/index.php/users');
        $data["email"] = $info;
        $this->cart->destroy();
        $this->load->view("shop/result",$data);
    }
}
?>