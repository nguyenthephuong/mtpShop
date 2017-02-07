<?php 
class Mcart extends CI_Model{

	public function __contruct(){
		parent::__contruct();
		$this->load->database();
	}

	public function creTrans($userid,$fullname,$email,$phone,$address,$amount,$mess,$created,$createt){
		$status = 0;
		$this->db->set("status",$status);
		$this->db->set("user#",$userid);
		$this->db->set("fullname",$fullname);
		$this->db->set("email",$email);
		$this->db->set("phone",$phone);
		$this->db->set("address",$address);
		$this->db->set("amount",$amount);
		$this->db->set("message",$mess);
		$this->db->set("created",$created);
		$this->db->set("createt",$createt);
		$this->db->insert("transaction");
	}

	public function findUserId($email){
		$this->db->where("email",$email);
		$query = $this->db->get('user');
		return $query->result_array();
	}

	public function selectOneIdTrans($createt){
		$this->db->where("createt",$createt);
		$query = $this->db->get('transaction');
		return $query->result_array();
	}

	public function creOrder($trans,$product,$name,$qty,$amount,$size){
		$this->db->set("transaction#",$trans);
		$this->db->set("product#",$product);
		$this->db->set("name",$name);
		$this->db->set("qty",$qty);
		$this->db->set("amount",$amount);
		$this->db->set("size",$size);
		$this->db->insert("order");
	}
	public function selectImgPro($id){
		$this->db->where("product#",$id);
		$query = $this->db->get('product');
		return $query->result_array();
	}
}
?>