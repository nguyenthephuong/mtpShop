<?php 
class Cart extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->library("session");
        $this->load->library("cart");
        $this->load->model("Mcart");
	}

	public function index(){
        $infouser = $this->session->userdata('userInfo');
        if(empty($infouser))
            header('location: http://localhost/mtp/index.php/users');
        $data["email"] = $infouser;
		//Show ra gio hang.
        $cart = $this->cart->contents();
        $data['cart'] = $cart;
        $sum = 0;
        $img = array();
        foreach ($cart as $item) {
            $sum = $sum + $item['subtotal'];
            array_push($img,$this->Mcart->selectImgPro($item['id']));
        }
        $data['sum'] = $sum;
        $data['img'] = $img;
		$this->load->view('shop/cart-view',$data);
	}

	public function add(){
        $infouser = $this->session->userdata('userInfo');
        if(empty($infouser))
            header('location: http://localhost/mtp/index.php/users');
        else{
            $data = array(
                'id' => $this->input->get('idp'),
                'name' => $this->input->get('name'),
                'price' => $this->input->get('price'),
                'qty' => 1,
                'options' => array('size'=>'0')
            );
            $this->cart->insert($data);
            redirect('http://localhost/mtp/');
        }
        //Them order
		
	}

    //remove 1 san pham
    public function remove(){
        $cart = $this->cart->contents();
        $idp = $this->input->get("idp");
        foreach ($cart as $key => $value) {
            if($idp = $value['id']){
                $data = array(
                    'rowid' => $key,
                    'qty' => 0
                );
                $this->cart->update($data);
                break;
            }
        }
        redirect('http://localhost/mtp/index.php/cart','refresh');
    }

    public function update_qty_size(){
        $cart = $this->cart->contents();
        $idp = $this->input->post('idp');
        $cart = $this->cart->contents();
        $i=1;
        foreach ($cart as $key => $value) {
            $qty = $this->input->post(''.$i);
            $size = $this->input->post('select'.$i);  
            $data = array(
                'rowid' => $key,
                'qty' => $qty,
                'options' => array('size'=>$size)
            );
            $this->cart->update($data);
            $i = $i+1;
        }
        redirect('http://localhost/mtp/index.php/cart','refresh');
    }

	public function destroy(){
		$this->cart->destroy();
        redirect('cart');
	}
}
?>