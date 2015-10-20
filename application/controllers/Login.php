<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('account_model');
		$this->_salt = "123456789987654321";
	}

	function index()
   	{
	     if($this->account_model->logged_in() === TRUE)
	     {
	       $this->dashboard(TRUE);
	     }
		else 
		 {
	       $this->load->view('login');	       
	     }
	}


	public function dashboard($condition = FALSE)
   {
     if($condition === TRUE OR $this->account_model->logged_in() === TRUE)
     {
       $this->load->view('dashboard');
	 } 
	 else 
	 {
       $this->load->view('login');
       //$this->account_model->form_valid();
     }
	}


	public function form_valid()
	{
		$this->_username = $this->input->post('username');
  		$this->_password = $this->input->post('password');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password','trim|required|min_length[4]|max_length[12]|sha1|callback_password_checking');
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('login');
		}
		else
		{
			$this->account_model->login();
			$data['message'] = "You are logged in! Now go take a look at the ".anchor('login/dashboard', 'Dashboard');
     		$this->load->view('formsuccess', $data);
		}
	}

	function logout()
	 {
	  $this->session->sess_destroy();
	  $this->load->view('logout');
	 }

	public function password_checking()
   	{

   		$username = $this->input->post('username');
  		$password = sha1($this->_salt . $this->input->post('password'));
   		$result = $this->account_model->dbquery($username,$password);       
       if($result == 't')
       {
           return TRUE;
       }
       else if($result == 'f')
       {
       	$this->form_validation->set_message('password_checking', 'password is incorrect');
       	return FALSE;
       }
       else
       {
           $this->form_validation->set_message('password_checking', 'There was an error!');
           return FALSE;
       }
	}

}