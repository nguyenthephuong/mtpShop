<?php 
class Mproduct extends CI_Model{
	public function __contruct(){
		parent::__contruct();
		$this->load->database();
	}

	public function selectOne($id){
		$this->db->where('product#',$id);
		$query = $this->db->get('product');
		return $query->result_array();
	}
}
?>