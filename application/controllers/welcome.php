<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Welcome extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->library('upload');
		$this->load->library('pagination');
		$this->load->helper(array('form', 'url'));
		$this->load->model("item_model");
		@session_start();
	}

	public function index()
	{
		if($this->session->userdata('userid') == null && $this->session->userdata('username') == null){
			redirect("login/index");
		}else{
			$this->load->view('index');
		}
	}

        
	public function logout(){
		$this->session->unset_userdata('userid');
		$this->session->unset_userdata('username');
		$this->session->sess_destroy();
		redirect('login/index');
	}

	public function month_reports(){
		if($this->session->userdata('userid') == null && $this->session->userdata('username') == null){
			redirect("login/index");
		}else{
			$this->load->view('index');
		}	
	}
        //--------------------------Table------------------------------------------
        //
        public function tables(){
           if($this->session->userdata('userid') == null && $this->session->userdata('username') == null){
			redirect("login/index");
		}else{
			$this->load->model("table_model");
			
			$data["listitem"] = $this->item_model->show_all_item(); 
			$this->load->view('index',$data);
		} 
        }
	//-------------------- ITEM BEGIN-------------------------
	public function items(){
		if($this->session->userdata('userid') == null && $this->session->userdata('username') == null){
			redirect("login/index");
		}else{
			$this->load->model("item_model");
			$this->load->model("cate_model");
			$data["listitem"] = $this->item_model->show_all_item();
			$data['listcate'] = $this->cate_model->show_all_cate();
			$this->load->view('index',$data);
		}
	}

	public function add_items(){
		if($this->session->userdata('userid') == null && $this->session->userdata('username') == null){
			redirect("login/index");
		}else{
			if (isset($_REQUEST['submit'])) {
					
				$name = $this->input->post('name_items', true);
				$price = $this->input->post('item_price', true);
				$cate = $this->input->post('catetype', true);
				$this->load->model("item_model");
				$this->item_model->add_item($name,$price,$cate);
				redirect("welcome/items");
			}
			$this->load->model("cate_model");
			$data['listcate'] = $this->cate_model->show_all_cate();
			$this->load->view('index',$data);
		}
	}

	public function edit_items($id){

		if(isset($_REQUEST["submit"])){
			$this->load->model("item_model");
			$name= $this->input->post("name_items",true);
			$price = $this->input->post("item_price",true);
			$cate = $this->input->post('catetype', true);
			$this->item_model->edit_item($id,$name,$price,$cate);
			redirect("welcome/items");
		}
		$this->load->model("cate_model");
		$data['listcate'] = $this->cate_model->show_all_cate();
		$data['items'] = $this->item_model->load_details($id);
		$this->load->view('index',$data);
	}


	public function del_item($id){
		$this->load->model("item_model");
		$this->item_model->del_item($id);
		redirect("welcome/items");
	}

	// -------------------- ITEM END-------------------------


	//-------------------- TAKE ORDER BEGIN-------------------------

	public function orders(){
		$this->load->model('item_model');
		$this->load->model('order_model');
		$data['order_list'] =$this->order_model->show_all_order();
		$this->load->view('index',$data);
	}
	public function del_order($id){
		$this->load->model('order_model');
		$this->order_model->delete_order_item($id);
		$this->order_model->delete_order($id);

		redirect("welcome/orders");
	}
	public function edit_order($id){
		$this->load->model('item_model');
		$this->load->model('order_model');
		$data['listitem'] = $this->item_model->show_all_item();
		$data['order_details'] =$this->order_model->load_details($id);
		$data['order_item'] =$this->order_model->show_all_order_item($id);
		$data["total_price"] = $this->order_model->total_price_order($id)." vnd";
		if (isset($_REQUEST['submit'])) {
			$name = $this->input->post('name_items',true);
			$items = $this->input->post('orderitems',true);
			$this->load->model("order_model");
			$this->load->model('item_model');
			$orderid = $this->order_model->edit_order($id,$name);
			//$this->order_model->clear_all_order_item($id);
			foreach($items as $item){

				if($item != null){
					$da = explode(",",$item);
					$this->order_model->edit_order_item($id,$da[1],$this->item_model->return_item_name($da[1]),$this->item_model->return_item_price($da[1]),$da[0]);
				}else{

				}
			}
			redirect("welcome/orders");
		}
		$this->load->view('index',$data);
	}

	 
	function check_result_by_month($dulieu){ 
		 
		$this->load->model("order_model");  
		$values= $this->order_model->show_report_order_by_time($dulieu); 
		$total_price= $this->order_model->total_price_by_date($dulieu);
		$month = explode("-",$dulieu);
		$total_price_month= $this->order_model->total_price_by_month($month[1]);
		echo '<table class="table table-striped table-bordered bootstrap-datatable datatable">';
		echo "<thead>";
		echo "<tr>";
		echo "<th>Món đã bán:</th>";
		echo "<th>Số lượng</th> "; 
		echo "<th>Giá</th>";
		echo "</tr>";
		echo "</thead>  ";
		echo "<tbody>";
		foreach($values as $value){
			echo "<tr>";
			echo "<td>";
			echo $value->item_name;
			echo "</td>";
			echo "<td>";
			echo $value->amount;
			echo "</td>";
			echo "<td>";
			echo number_format($value->total);
			echo "</td>";
		}
			echo "<tr>";
			echo "<td>"; 
			echo "</td>";
			echo "<td>"; 
			echo "<b>Tổng bán trong ngày</b>";
			echo "</td>";
			echo "<td>";
			echo "<b>".number_format($total_price)."</b>";
			echo "</td>";
			echo "<tr>";
			echo "<td>"; 
			echo "</td>";
			echo "<td>"; 
			echo "<b>Tổng bán trong tháng: ". $month[1]."</b>";
			echo "</td>";
			echo "<td>";
			echo "<b>".number_format($total_price_month)."</b>";
			echo "</td>";
		echo  "</tbody>"; 
		echo  '</table>';
		
		
		
		
	}
	public function remove_item_order($item_id,$order_id){
		$this->load->model('order_model');
		$this->order_model->remove_item_id_in_order($item_id,$order_id);
		redirect('welcome/edit_order/'.$order_id);
	}
	public function checkout($id){
		$this->load->model("order_model");
		$this->order_model->update_checkout_order($id);
		redirect("welcome/orders");
	}
	public function checkout_multi($oders_id){
		$this->load->model("order_model");
		foreach (explode(",", $oders_id) as $oder_id) {
			$this->order_model->update_checkout_order($oder_id);
		}
		redirect("welcome/orders");
	}

	public function add_order(){
		if (isset($_REQUEST['submit'])) {
			$name = $this->input->post('name_items', true);
			//$price = $this->input->post('item_price', true);
			$items = $this->input->post('orderitems',true);
			// 			$string = explode("-",$items);
			$this->load->model("order_model");
			$this->load->model('item_model');
			$orderid = $this->order_model->add_orders($name);
			foreach($items as $item){
				if($item != null){
					$da = explode(",",$item);
					$this->order_model->add_order_item($orderid,$da[1],$this->item_model->return_item_name($da[1]),$this->item_model->return_item_price($da[1]),$da[0]);
				}else{

				}
			}
			redirect("welcome/orders");
		}
		if(isset($_REQUEST['reset'])){
			redirect("welcome/orders");
		}
		$this->load->model('item_model');
		$data['listitem'] = $this->item_model->show_all_item();
		$this->load->view('index',$data);
	}
	public function checkout_multi_order(){
		$total_price = 0;


		if (isset($_REQUEST['submit_multi'])) {
			$this->load->model('item_model');
			$this->load->model('order_model');
			$data['listitem'] = $this->item_model->show_all_item();
			// 			$data['order_details'] =$this->order_model->load_details($id);
			// 			$data['order_item'] =$this->order_model->show_all_order_item($id);
			// 			$data["total_price"] = $this->order_model->total_price_order($id)." vnd";
			$orderid = $this->input->post('order_id_list');
			$data['order_item'] = array();
			if($orderid == null){
				redirect("welcome/order");
			}else{
				foreach($orderid as $order){
					$total_price = $total_price + $this->order_model->total_price_order($order);
					$data['order_item'] =array_merge($data['order_item'],$this->order_model->show_all_order_item($order));
				}
				$data['total_price'] = $total_price;
				
				$data['orderid'] = implode(",",$orderid);
				$this->load->view("index",$data);
			}

		}

	}

	
	// -------------------- TAKE ORDER END-------------------------
	public function cate(){
		$this->load->model("cate_model");
		$data["listcate"] = $this->cate_model->show_all_cate();
		$data["listcateroot"] = $this->cate_model->show_all_cate();
		$this->load->view('index',$data);
	}
	public function del_cate($id){
		$this->load->model('cate_model');
		$this->cate_model->del_cate($id);
		redirect("welcome/cate");
	}
	public function add_cate(){

		if (isset($_REQUEST['submit'])) {

			$catename = $this->input->post('catename', true);
			$cateroot = $this->input->post('cateroot', true);
			$this->load->model("cate_model");
			$this->cate_model->add_cate($catename,$cateroot);
			redirect("welcome/cate");
		}
		$this->load->model("cate_model");
		$data['listcate'] = $this->cate_model->show_all_cate();
		$this->load->view('index',$data);
	}

	public function edit_cate($id){
		if(isset($_REQUEST["submit"])){
			$catename = $this->input->post('catename', true);
			$cateroot = $this->input->post('cateroot', true);
			$this->load->model("cate_model");
			$this->cate_model->edit_cate($id,$catename,$cateroot);
			redirect("welcome/cate");
		}
		$this->load->model("cate_model");
		$data['catedetails'] = $this->cate_model->load_details($id);
		$data['listcate'] = $this->cate_model->show_all_cate_root();
		$this->load->view('index',$data);
	}


	public function reports(){
		$this->load->model('order_model');
		$data['allitemstatus'] = $this->order_model->show_all_orderitem_status();
		$this->load->view('index',$data);
	}

	public function finishorder($id){ 
		$this->load->model("order_model");
		$this->order_model->finish_order($id);
		redirect('welcome/reports');
	}

	public function loadajaxorder(){
		//echo "test";
		  $this->load->model('order_model');
		  $data['allitemstatus'] = $this->order_model->show_all_orderitem_status();
		  $data['order_table_name'] = $this->order_model->show_all_order();
		  $this->load->view('order_ajax',$data);
	}
	
	//---------------------USER-------------
	public function users(){
		$this->load->model("user_model");
		$data['listuser'] = $this->user_model->show_all_user();
		$this->load->view('index',$data);
	}

	public function del_user($id){
		$this->load->model("user_model");
		$data['listuser'] = $this->user_model->del_user($id);
		redirect("welcome/users");
	}
	public function add_user(){
		if(isset($_REQUEST["submit"])){
			$username = $this->input->post('username', true);
			$password = $this->input->post('userpass', true);
                        $type = $this->input->post('type_user',true);
			$this->load->model("user_model");
			$this->user_model->add_user($username,$password,$type);
			redirect("welcome/users");
		}
		$this->load->view('index');
	}
	public function edit_user($id){
		if(isset($_REQUEST["submit"])){
			$password = $this->input->post('userpass', true);
                         $type = $this->input->post('type_user',true);
			$this->load->model("user_model");
			$this->user_model->edit_user($id,$password,$type);
			redirect("welcome/users");
		}
		$this->load->model("user_model");
		$data['userdetails'] = $this->user_model->load_details($id);
		$this->load->view('index',$data);
	}
	//------------------------------------
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */