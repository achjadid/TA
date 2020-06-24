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

		if($this->session->userdata('roleid') == "1"){

			$data['tTodaysActivities'] = $this->M_CallSQL->getTodayActivities()->result();

			$view = array(
				$this->load->view('template/v_header', $data),
				$this->load->view('content/v_dashboard', $data),
				$this->load->view('template/v_footer')
			);
		} else if($this->session->userdata('roleid') == "2"){
			
			$userid = $this->session->userdata('userid');
			$date = date("Y-m-d");
			$where = array(
				'p_id' =>$userid,
				'a_date' => $date
				);
			$presensi = $this->M_CallSQL->where("ta_presensi",$where)->row();
			if(!empty($presensi->a_time)){
				$data['waktu'] = $presensi->a_time;
			}
			$where_p = array(
				'YEARWEEK(a_date, 1)=' => date('YW'),
				'p_id=' => $userid
				);
			$data['tThisWeek'] = $this->M_CallSQL->where('ta_presensi',$where_p)->result();

			$view = array(
				$this->load->view('template/v_header', $data),
				$this->load->view('content/v_presensi', $data),
				$this->load->view('template/v_footer')
			);
		}
		return $view;
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}