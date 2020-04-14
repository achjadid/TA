<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Dashboard extends CI_Controller{
 
	function __construct(){
		parent::__construct();
		$this->load->model('M_CallSQL');
		
		if($this->session->userdata('status') != "Login"){
			redirect(base_url("login"));
		}
	}
 
	function index(){
		$data = $this->M_CallSQL->sessdata();
		$data['stabsensi'] = '';
		$date = date("Y-m-d");
		$where = array(
			'p_id' =>$this->session->userdata('userid'),
			'a_date' => $date
			);
		$absensi = $this->M_CallSQL->where("ta_absensi",$where)->row();
		if($absensi){
			$data['stabsensi'] = 1;
			$data['waktu'] = $absensi->a_time;
		}

		$data['tPengguna'] = $this->db->select("p_username, p_name, p_email")
									->from("ta_pengguna")->get()->result();
		if($this->session->userdata('roleid') == "1"){
			$view = array(
				$this->load->view('template/v_header', $data),
				$this->load->view('content/v_dashboard', $data),
				$this->load->view('template/v_footer')
			);
		} else if($this->session->userdata('roleid') == "2"){
			$view = array(
				$this->load->view('template/v_header', $data),
				$this->load->view('content/v_absensi', $data),
				$this->load->view('template/v_footer')
			);
		}
		// $view = array(
		// 	$this->load->view('template/v_header', $data),
		// 	$this->load->view('content/v_dashboard', $data),
		// 	$this->load->view('template/v_footer')
		// );

		return $view;
	}

	function absensi(){
		$data = $this->M_CallSQL->sessdata();
		$date = date("Y-m-d");
		$where = array(
			'p_id' => $userid,
			'a_date' => $date
			);
		$absensi = $this->M_CallSQL->where("ta_absensi",$where)->row();

	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}