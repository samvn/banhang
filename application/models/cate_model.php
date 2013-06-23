<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class cate_model extends CI_Model {

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
		$this->load->database();
	}

	function show_all_cate(){
		$this->load->database();
		$this->db->order_by("id", "desc");
		$query=$this->db->get('tbl_category');
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return $query->result();
	}
	function show_all_cate_root(){
		$this->load->database();
		$this->db->order_by("id", "desc");
		$this->db->where('cateroot',0);
		$query=$this->db->get('tbl_category');
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return $query->result();
	}
	function load_details($id){
		$this->load->database();
		$this->db->where("id",$id);
		$query=$this->db->get('tbl_category');
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return $query->result();
	}
	
	function add_cate($catename,$cateroot){
		$this->load->database();
		$data = array(
				'catename'=>$catename,
				'cateroot'=>$cateroot
		);
		$this->db->insert('tbl_category', $data);
	}
	
	function del_cate($id){
		$this->load->database();
		$this->db->where(array(
				'id'=>$id
				 
		));
		$this->db->delete('tbl_category');
	}
	
	function edit_cate($id,$catename,$cateroot){
		$data = array(
				'catename'=>$catename,
				'cateroot'=>$cateroot
		);
		$this->db->where('id', $id);
		$this->db->update('tbl_category', $data);
	}
}
?>