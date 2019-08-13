<?php
	class Users_model extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}
 
		public function getAllUsers($email){
		    $this->db->select('email,username');
		    $query = $this->db->get_where('tbl_user', ['email'=>$email]);
			return $query->result();
		}
 
		public function register($user){
			return $this->db->insert('tbl_user', $user);
		}
		
		public function userLogin($email, $password){
		    $this->db->select('email,password,username');
		    $query = $this->db->get_where('tbl_user', ['email'=>$email,'password'=>$password],1);
		    if ($query->num_rows() > 0){
		        $row = $query->row();
		        return $row;
		    }
		    return null;
		}
       
		public function userAlreadyExist($email){
		    $this->db->select('email,username');
		    $query = $this->db->get_where('tbl_user',['email'=>$email],1);
		    if($query->num_rows() > 0){
		        $row = $query->row();
		        return $row;
		    }
		}
	}
?>