<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
 
class History extends CI_Controller{
 
	function __construct(){
		parent::__construct();
		$this->load->model('M_CallSQL');
		
		if($this->session->userdata('status') != "Login"){
			redirect(base_url("login"));
		}else if($this->session->userdata('roleid') != "2"){
			redirect(base_url("dashboard"));
		}
	}
 
	function index(){
		$data = $this->M_CallSQL->sessdata();

		$where = array('p_id' => $this->session->userdata('userid'));
		$data['tHistoryPresensi'] = $this->M_CallSQL->where('ta_presensi',$where)->result();

		$view = array(
			$this->load->view('template/v_header', $data),
			$this->load->view('content/v_historypresensi', $data),
			$this->load->view('template/v_footer')
		);

		return $view;
	}
	
}