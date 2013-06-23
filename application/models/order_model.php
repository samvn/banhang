<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Order_model extends CI_Model {

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
		$this->load->database();
	}

	function show_report_order_by_time($date){
		$this->load->database();
		$this->db->order_by("id", "desc");
		$query = $this->db->query("select item_name,amount,(price*amount) as total from tbl_order_item where  date_create='".$date."'");
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return $query->result();
	}
	 
	function total_price_by_month($month){ 
		$this->load->database();
		
		$query = $this->db->query("select sum(price*amount) as total from tbl_order_item where  date_create like '%".$month."%'");
		if ($query->num_rows() > 0)
		{
			foreach($query->result() as $rows){
				return  $rows->total;
			}
		}
		return $query->result(); 
	}
	function total_price_by_date($date){ 
		$this->load->database();
		
		$query = $this->db->query("select sum(price*amount) as total from tbl_order_item where  date_create='".$date."'");
		if ($query->num_rows() > 0)
		{
			foreach($query->result() as $rows){
				return  $rows->total;
			}
		}
		return $query->result(); 
	}
	
	function show_all_order(){
		$this->load->database();
		$this->db->order_by("id", "desc");
		$query=$this->db->get('tbl_oders');
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return $query->result();
	}

	function finish_order($id){
		$this->load->database();
		$data = array(
				'status'=>1
	
		);
		
		$this->db->where('id', $id);
		$this->db->update('tbl_order_item', $data);
	}

	function show_all_orderitem_status(){
		$this->load->database();
		$this->db->where('date_create',date("d-m-Y"));
		$this->db->where('status',0);
		$this->db->order_by("time_create", "ASC"); 
		$query=$this->db->get('tbl_order_item');
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return $query->result();
	}
	
	function show_all_order_item($orderid){
		$this->load->database();
		$this->db->where('order_id',$orderid);
		$query=$this->db->get('tbl_order_item');
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return $query->result();
	}

	
	function load_details($id){
		$this->load->database();
		$this->db->where("id",$id);
		$query=$this->db->get('tbl_oders');
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return $query->result();
	}
	
	function add_orders($name){
		$this->load->database();
		$data = array(
				'order_name'=>$name,
				'status'=>0,
				'date_create'=>date("d-m-Y"),
				"time_create"=>date("H:i:s")
				
		);
		$this->db->insert('tbl_oders', $data);
		return $this->db->insert_id();
	}
	
	function edit_order($id,$name){
		$this->load->database();
		$data = array(
				'order_name'=>$name,
				'date_create'=>date("d-m-Y"),
				"time_create"=>date("H:i:s")
	
		);
		
		$this->db->where('id', $id);
		$this->db->update('tbl_oders', $data);
	}
	
	function update_checkout_order($id){
		$this->load->database();
		$data = array(
				'status'=>1,
				'date_create'=>date("d-m-Y"),
				"time_create"=>date("H:i:s")
		
		);
		
		$this->db->where('id', $id);
		$this->db->update('tbl_oders', $data);
	}
	function add_order_item($orderid,$item_id,$itemname,$itemprice,$amount){ 
		$this->load->database();
		$data = array(
				'order_id'=>$orderid,
				'item_id'=>$item_id,
				"item_name"=>$itemname,
				"price"=>$itemprice,
				"amount"=>$amount,
				'date_create'=>date("d-m-Y"),
				"time_create"=>date("H:i:s")
		
		);
		$this->db->insert('tbl_order_item', $data);
		
	}
	
	function edit_order_item($orderid,$item_id,$itemname,$itemprice,$amount){ 
		//echo $orderid."-".$item_id."-".$itemname."-".$itemprice."-".$amount; die();
		//$this->clear_all_order_item($orderid); 
		$this->load->database();
		$data = array(
				'order_id'=>$orderid,
				'item_id'=>$item_id,
				"item_name"=>$itemname,
				"price"=>$itemprice,
				"amount"=>$amount,
				'date_create'=>date("d-m-Y"),
				"time_create"=>date("H:i:s")
		
		);
		$this->db->insert('tbl_order_item', $data);
	
	}
	
	function remove_item_id_in_order($item_id,$order_id){
		$this->load->database();
		$this->db->where(array(
				'order_id'=>$order_id,
				'item_id'=>$item_id
		));
		$this->db->delete('tbl_order_item');
	}
	
	function clear_all_order_item($orderid){
		$this->load->database();
		$this->db->where(array(
				'order_id'=>$orderid
		));
		$this->db->delete('tbl_order_item');
	}
	function total_price_order($orderid){
		$this->load->database();
		
		$query = $this->db->query("select order_id,sum(price*amount) as total from tbl_order_item where order_id=".$orderid." group by order_id ");
		if ($query->num_rows() > 0)
		{
			foreach($query->result() as $rows){
				return  $rows->total;
			}
		}
		return $query->result();
	}
	
	
	function delete_order($id){
		$this->load->database();
		$this->db->where(array(
				'id'=>$id 
		));
		$this->db->delete('tbl_oders');
	}
	
	function delete_order_item($id){
		$this->load->database();
		$this->db->where(array(
				'order_id'=>$id
		));
		$this->db->delete('tbl_order_item');
	}
	

}
?>