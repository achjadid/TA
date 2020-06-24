<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{
 
	function __construct(){
		parent::__construct();
		$this->load->model('M_CallSQL');

		if($this->session->userdata('status') == "Login"){
			redirect(base_url("dashboard"));
		}
	}
 
	function index(){
		$this->load->view('template/v_login');
	}
 
	function submit(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'p_username' => $username,
			'p_password' => $this->M_CallSQL->pswd_encode($password)
			);
			
		$check = $this->M_CallSQL->where("ta_pengguna",$where)->row();

		if($check){
			$role = $this->M_CallSQL->cekrole($check->r_id)->row();
			$data_session = array(
					'username' => $username,
					'name' => $check->p_name,					
					'status' => "Login",
					'role' => $role->r_nama,
					'roleid' => $role->r_id,
					'userid' => $check->p_id,
					'usernip' => $check->p_nip
					);

			$this->session->set_userdata($data_session);
			redirect(base_url("dashboard"));

		}else{
			$this->session->set_flashdata('failed_login', 'Incorrect username or password');
			redirect(base_url('login'));
		}
	}
}