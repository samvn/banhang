<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Table_model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }

    function show_all_table() {
        $this->load->database();
        $this->db->order_by("id", "desc");
        $query = $this->db->get('tbl_tables');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return $query->result();
    }

    function checkuser($tablename ) {
        $this->load->database();
        $this->db->where(array('username' => $username, 'password' => $password));
        $query = $this->db->get('tbl_tables');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return 0;
        }
    }

    function load_details($id) {
        $this->load->database();
        $this->db->where("id", $id);
        $query = $this->db->get('tbl_user');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return $query->result();
    }

    function add_user($username, $password, $type) {
        $this->load->database();
        $data = array(
            'username' => $username,
            'password' => $password,
            'type' => $type
        );
        $this->db->insert('tbl_user', $data);
    }

    function del_user($id) {
        $this->load->database();
        $this->db->where(array(
            'id' => $id
        ));
        $this->db->delete('tbl_user');
    }

    function edit_user($id, $password,$type) {
        $data = array(
            'password' => $password,
            'type'=>$type
        );
        $this->db->where('id', $id);
        $this->db->update('tbl_user', $data);
    }

}

?>