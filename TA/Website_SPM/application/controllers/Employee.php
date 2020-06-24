<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Employee extends CI_Controller{
 
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

		$data['tEmployee'] = $this->M_CallSQL->where("ta_pengguna",array('r_id' =>'2'))->result();

		$view = array(
			$this->load->view('template/v_header', $data),
			$this->load->view('content/v_pegawai', $data),
			$this->load->view('template/v_footer')
		);
		return $view;
	}

	function detail($id){
		$data = $this->M_CallSQL->sessdata();

		$employee = $this->M_CallSQL->where('ta_pengguna',array('p_id' => $id))->row();
		$data['nama'] = $employee->p_name;
		$data['nip'] = $employee->p_nip;
		$data['tDetailEmployee'] = $this->M_CallSQL->where('ta_presensi',array('p_id' => $id))->result();

		$view = array(
			$this->load->view('template/v_header', $data),
			$this->load->view('content/v_detailpegawai', $data),
			$this->load->view('template/v_footer')
		);
		return $view;
	}

}