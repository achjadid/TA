<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Activity extends CI_Controller{
 
	function __construct(){
		parent::__construct();
		$this->load->model('M_CallSQL');
		
		if($this->session->userdata('status') != "Login"){
			redirect(base_url("login"));
		}
		else if($this->session->userdata('roleid') != "1"){
			redirect(base_url("dashboard"));
		}
	}
 
	function index(){
		$data = $this->M_CallSQL->sessdata();

		$data['tActivity'] = $this->M_CallSQL->getActivity()->result();

		$view = array(
			$this->load->view('template/v_header', $data),
			$this->load->view('content/v_activity', $data),
			$this->load->view('template/v_footer')
		);
		return $view;
	}

	function detail($id){
		$data = $this->M_CallSQL->sessdata();

		$detailid = $this->M_CallSQL->where("ta_unidentified",array('u_id' => $id))->row();
		if($detailid){
			$data['codename'] = $detailid->u_name;
			$data['macaddress'] = $detailid->u_macaddress;
		}

		$data['tDetailActivity'] = $this->M_CallSQL->where("ta_log",array('u_id' => $id))->result();

		$view = array(
			$this->load->view('template/v_header', $data),
			$this->load->view('content/v_detailactivity', $data),
			$this->load->view('template/v_footer')
		);
		return $view;
	}

}