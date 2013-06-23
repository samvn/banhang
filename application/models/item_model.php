<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Item_model extends CI_Model {

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
		$this->load->database();
	}

	function show_all_item(){
		$this->load->database();
		$this->db->order_by("id", "desc");
		$query=$this->db->get('tbl_items');
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return $query->result();
	}
	function return_item_date($id){
		$this->load->database();
		$this->db->where("id",$id);
		$query=$this->db->get('tbl_oders');
		if ($query->num_rows() > 0)
		{
			foreach($query->result() as $row){
				return $row->date_create;
			}
		}
		return $query->result();
	}
	function return_item_time($id){
		$this->load->database();
		$this->db->where("id",$id);
		$query=$this->db->get('tbl_oders');
		if ($query->num_rows() > 0)
		{
			foreach($query->result() as $row){
				return $row->time_create;
			}
		}
		return $query->result();
	}
	
	function return_item_name($id){
		$this->load->database();
		$this->db->where("id",$id);
		$query=$this->db->get('tbl_items');
		if ($query->num_rows() > 0)
		{
			foreach($query->result() as $row){
				return $row->item;
			}
		}
		return $query->result();
	}
	function return_item_price($id){
		$this->load->database();
		$this->db->where("id",$id);
		$query=$this->db->get('tbl_items');
		if ($query->num_rows() > 0)
		{
			foreach($query->result() as $row){
				return $row->price;
			}
		}
		return $query->result();
	}
	function load_details($id){
		$this->load->database();
		$this->db->where("id",$id);
		$query=$this->db->get('tbl_items');
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return $query->result();
	}
	
	function add_item($name,$price,$cate){
		$this->load->database();
		$data = array(
				'item'=>$name,
				'price'=>$price,
				'type_id'=>$cate
		);
		$this->db->insert('tbl_items', $data);
	}
	
	function del_item($id){
		$this->load->database();
		$this->db->where(array(
				'id'=>$id
				 
		));
		$this->db->delete('tbl_items');
	}
	
	function edit_item($id,$name,$price,$cate){
		$data = array(
				'item'=>$name,
				'price'=>$price, 
				'type_id'=>$cate
		);
		$this->db->where('id', $id);
		$this->db->update('tbl_items', $data);
	}
}
?>