<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->library('upload');
        $this->load->library('pagination');
        $this->load->helper(array('form', 'url'));
        @session_start();
    }

    public function index() {
        if (isset($_REQUEST['submit'])) {
            $username = $this->input->post('username', true);
            $password = $this->input->post('password', true);
            $this->load->model('user_model');
            $result = $this->user_model->checkuser($username, $password);
            if ($result == null) {
                redirect('login/index'); //lá»—i sai username hoáº·c pass
            } else {
                foreach ($result as $user) {
                    $newdata = array(
                        'userid' => $user->id,
                        'username' => $user->username,
                        'usertype'=>$user->type
                    );
                }

                $this->session->set_userdata($newdata);
                redirect('welcome/index');
            }
        }
        $this->load->view('login');
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */