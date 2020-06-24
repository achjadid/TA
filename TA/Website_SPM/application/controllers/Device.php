<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Device extends CI_Controller{
 
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
			
			$data['tGeneralDevice'] = $this->M_CallSQL->getGeneralDevice()->result();
			$data['tEmployeeDevice'] = $this->M_CallSQL->getEmployeeDevice()->result();

			$view = array(
				$this->load->view('template/v_header', $data),
				$this->load->view('content/v_deviceadmin', $data),
				$this->load->view('template/v_footer')
			);
		} else if($this->session->userdata('roleid') == "2"){

			$userid = $this->session->userdata('userid');
			$data['tDevicePegawai'] = $this->M_CallSQL->where('ta_macaddress',array('p_id' => $userid))->result();

			$view = array(
				$this->load->view('template/v_header', $data),
				$this->load->view('content/v_devicepegawai', $data),
				$this->load->view('template/v_footer')
			);
		}
		return $view;
	}

	function add(){
		$data = $this->M_CallSQL->sessdata();

		if($this->session->userdata('roleid') == "1"){

			$dname = $this->input->post('dname');
			$macaddress = strtolower($this->input->post('macaddress'));
			$insert = array(
				'm_name' => $dname,
				'm_address' => $macaddress
			);
			
			if($dname!=''&&$macaddress!=''){
				
				$this->M_CallSQL->input_data($insert,'ta_macaddress');
				$this->session->set_flashdata('device_tambah', 'Device successfully added.');
				
				redirect(base_url('device/add'));

			} else {

				$view = array(
					$this->load->view('template/v_header', $data),
					$this->load->view('content/v_adddeviceadmin', $data),
					$this->load->view('template/v_footer')
				);
			}

		} else if($this->session->userdata('roleid') == "2"){

			$dname = $this->input->post('dname');
			$macaddress = strtolower($this->input->post('macaddress'));
			$insert = array(
				'p_id' => $this->session->userdata('roleid'),
				'm_name' => $dname,
				'm_address' => $macaddress
			);
			
			if($dname!=''&&$macaddress!=''){
				
				$this->M_CallSQL->input_data($insert,'ta_macaddress');
				$this->session->set_flashdata('device_tambah', 'Device successfully added.');
				
				redirect(base_url('device/add'));

			} else {

				$view = array(
					$this->load->view('template/v_header', $data),
					$this->load->view('content/v_adddevicepegawai', $data),
					$this->load->view('template/v_footer')
				);
			}
		}
	}

	function add_employee(){
		$data = $this->M_CallSQL->sessdata();

		$data['employeeName'] = $this->M_CallSQL->where('ta_pengguna',array('r_id' => '2'))->result();

		$eid = $this->input->post('employeeid');
		$dname = $this->input->post('dname');
		$macaddress = strtolower($this->input->post('macaddress'));
		$insert = array(
			'p_id' => $eid,
			'm_name' => $dname,
			'm_address' => $macaddress
		);
		
		if($dname!=''&&$macaddress!=''){
			
			$this->M_CallSQL->input_data($insert,'ta_macaddress');
			$this->session->set_flashdata('device_tambah', 'Device successfully added.');
			
			redirect(base_url('device/add_employee'));

		} else {

			$view = array(
				$this->load->view('template/v_header', $data),
				$this->load->view('content/v_adddeviceadminpegawai', $data),
				$this->load->view('template/v_footer')
			);
		}
	}
	
}