<?php
class Madmin extends CI_Model{

	public function __contruct(){
		parent::__contruct();
		$this->load->database();
	}

	public function checkLogin($name, $pass){
		$this->db->select("adminName,password");
		$this->db->where("adminName","$name");
		$this->db->where("password","$pass");
		$query=$this->db->get("admin");
		if($query->num_rows() > 0){	
			return 1;
		}
		return 0;
	}

	public function select($adminName){
		$this->db->where("adminName",$adminName);
		$query = $this->db->get('admin');
		return $query->result_array();
	}

	public function selectAllCatalog(){
		$query = $this->db->get('catalog');
		return $query->result_array();
	}

	public function selectAllSubCatalog($idc){
		$this->db->where('parent#',$idc);
		$query = $this->db->get('catalog');
		return $query->result_array();
	}

	//Check sub catalog
	public function getSubCatalog($idc){
		$this->db->where("parent#",$idc);
		$query = $this->db->get('catalog');
		if($query->num_rows() > 0){	
			return $query->result_array();
		}
		return 0;
	}

	//Product
	public function insertProduct($catalogid,$name,$price,$des,$images){
		$this->db->set("catalog#",$catalogid);
		$this->db->set("name",$name);
		$this->db->set("price",$price);
		$this->db->set("description",$des);
		$this->db->set("images",$images);
		$this->db->insert('product');
	}

	public function updateProduct($productid,$catalogid,$name,$price,$des,$images){
		$data = array(
			'catalog#' => $catalogid,
			'name' => $name,
			'price' => $price,
			'description' => $des,
			'images' => $images
			);
		$this->db->where("product#",$productid);
		$this->db->update('product',$data);
	}

	public function selectAllProduct($total,$start,$id){
		$this->db->limit($total, $start);
		$this->db->where('catalog#',$id);
		$query = $this->db->get('product');
		return $query->result_array();
	}
	public function searchProduct($name){
		$this->db->where('name',$name);
		$query = $this->db->get('product');
		return $query->result_array();
	}

	public function selectAllProduct2($id){
		$this->db->where('product#',$id);
		$query = $this->db->get('product');
		return $query->result_array();
	}

	public function count_product($catalog){
		$query = $this->db->where('catalog#',$catalog)->get('product');
		return $query->num_rows();
	}

	public function deleteProduct($idp){
		$this->db->where('product#',$idp);
		$this->db->delete('product');
	}

	//catalog
	public function insertCatalog($name,$parentid){
		$this->db->set("name",$name);
		$this->db->set("parent#",$parentid);
		$this->db->insert("catalog");
	}

	public function deleteCatalog($idc){
		$this->db->where("catalog#",$idc);
		$this->db->delete('catalog');
	}

	public function updateCatalog($id,$name){
		$data = array(
			'name' => $name,
			);
		$this->db->where("catalog#",$id);
		$this->db->update('catalog',$data);
	}

	public function selectOneCatalog($id){
		$this->db->where("catalog#",$id);
		$query = $this->db->get('catalog');
		return $query->result_array();
	}

	///// USER
	public function selectAllUser($total,$start){
		$this->db->limit($total, $start);
		$query = $this->db->get('user');
		return $query->result_array();
	}
	public function count_user(){
		$query = $this->db->get('user');
		return $query->num_rows();
	}
	public function selectOneUser($id){
		$this->db->where("user#",$id);
		$query = $this->db->get("user");
		return $query->result_array();
	}
	public function updateUser($id,$name,$email,$pass,$phone,$address){
		$data = array(
			'name' => $name,
			'email' => $email,
			'password' => $pass,
			'phone' => $phone,
			'address' => $address,
			);
		$this->db->where("user#",$id);
		$this->db->update("user",$data);
	}
	public function deleteUser($id){
		$this->db->where("user#",$id);
		$this->db->delete("user");
	}
	public function searchUser($email){
		$this->db->where("email",$email);
		$query = $this->db->get("user");
		return $query->result_array();
	}

	///// Quản lý admin
	public function selectAllAdmin(){
		$query = $this->db->get("admin");
		return $query->result_array();
	}
	public function deleteAdmin($id){
		$this->db->where("AD#",$id);
		$this->db->delete("admin");
	}
	public function selectOneAdmin($id){
		$this->db->where("AD#",$id);
		$query = $this->db->get("admin");
		return $query->result_array();
	}
	public function updateAdmin($id,$namelogin,$pass,$fullname){
		$data = array(
			'adminName' => $namelogin,
			'password' => $pass,
			'name' => $fullname,
			);
		$this->db->where("AD#",$id);
		$this->db->update("admin",$data);
	}
	public function insertAdmin($namelogin,$pass,$fullname){
		$this->db->set('adminName',$namelogin);
		$this->db->set('password',$pass);
		$this->db->set('name',$fullname);
		$this->db->insert('admin');
	}
	//Quan lý đơn hàng
	public function count_trans(){
		$query = $this->db->get('transaction');
		return $query->num_rows();
	}
	public function selectAllTrans($total,$start){
		$this->db->limit($total, $start);
		$query = $this->db->get('transaction');
		return $query->result_array();
	}
	public function deleteTrans($id){
		$this->db->where("transaction#",$id);
		$this->db->delete("transaction");
	}
	public function selectOneTrans($id){
		$this->db->where("transaction#",$id);
		$query = $this->db->get("transaction");
		return $query->result_array();
	}
	public function updateTrans($id,$status,$fullname,$email,$phone,$address){
		$data = array(
			'status' => $status,
			'fullname' => $fullname,
			'email' => $email,
			'phone' => $phone,
			'address' => $address,
			);
		$this->db->where("transaction#",$id);
		$this->db->update("transaction",$data);
	}
	public function searchTrans($id){
		$this->db->where("transaction#",$id);
		$query = $this->db->get("transaction");
		return $query->result_array();
	}
}
?>