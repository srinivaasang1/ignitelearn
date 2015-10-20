<?php
   class Account_model extends CI_Model
  {     
     function __construct()
    {
        // Call the Model constructor
        parent::__construct();
               $this->load->database();
                          $this->load->helper('form');
                $this->load->library('form_validation');
                $this->load->library('session');
                $this->load->helper('url');
    }
     public function login()
     {
       $data = array(
                 'username' => $this->input->post('username'),
                 'logged_in' => TRUE
					);
       $this->session->set_userdata($data);
     }

  	public function logged_in()
     	{
       if($this->session->userdata('logged_in') == TRUE)
       {
       	return TRUE;
       }
       return FALSE;
     	}

  public function dbquery($user,$password)
  {
       $query = $this->db->get_where('users', array('username' => $user));
       $result = $query->row_array();
       if($result['hash_password'] == $password )
       {
           return 't';
       }
       else
       {
        return 'f';
       }
       if($query->num_rows() == 0)
       {
           return 'nou';
       }
  }

  }
?>