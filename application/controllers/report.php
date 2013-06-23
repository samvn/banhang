<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Report extends CI_Controller {

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
	function get_item_report () {
		if($this->session->userdata('userid') == null && $this->session->userdata('username') == null){
			redirect("login/index");
		}else{
// 			$this->load->model("item_model");
// 			$this->load->model("cate_model");
// 			$data["listitem"] = $this->item_model->show_all_item();
// 			$data['listcate'] = $this->cate_model->show_all_cate();
			$this->load->view('get_item_report.php');
		}
	}
	function  item_report () {
			$this->load->view('index');
	}
}