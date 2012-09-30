<?php
class Authen extends CI_Controller{
	
	public function __construct(){
		parent::__construct();	
		$this->load->library('trello.php');
	}
	
	public function sign_up(){

	}
	
	public function get_token(){
		$response = $this->trello->get_token();
	}
	
	public function login(){
		
	}
	
	public function logme(){
		$url = $_SERVER['REQUEST_URI'];
		echo $url; exit(1);
	}
	
	public function logout(){
		$this->load->helper("cookie");
		delete_cookie("mpua_username");
		delete_cookie("mpua_password");
		$this->session->sess_destroy();
		redirect('/');
	}
}
/*Tag controller ending. Located at applications/controller*/
