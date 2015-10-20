<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Table extends CI_Controller {

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

	}

	public function data_submitted() 
	{

		//Storing all  values travelled through POST method
		$data = array(
		'user_name' => $this->input->post('username'),
		'password' => $this->input->post('password')
		);
		

	}
	public function index()
	{
		$user = 'peter';
		//$query = $this->db->query('SELECT id,username,password FROM users where username = '+ $user);

		$query = $this->db->get_where('users', array('username' => $user));

		foreach ($query->result() as $row)
		{
		    echo $row->id;
		    echo $row->username;
		    echo $row->password;
		}

		echo 'Total Results: ' . $query->num_rows();
	}



}