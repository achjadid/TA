<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_CallSQL extends CI_Model{	
	function where($table,$where){		
		return $this->db->get_where($table,$where);
	}

	function pswd_encode($ifpsd){
		$result=md5($ifpsd.'*&@-_#%^.Fhb+}{');
		return $result;
	}
	
	function cekrole($role){
		return $this->db->get_where("ta_role",array('r_id'=> $role));
	}

	function sessdata(){
		$data['userid'] = $this->session->userdata('userid');
		$data['username'] = $this->session->userdata('username');
		$data['role'] = $this->session->userdata('role');
		$data['roleid'] = $this->session->userdata('roleid');
		$data['name'] = $this->session->userdata('name');
		$data['usernip'] = $this->session->userdata('usernip');			
		return $data;
	}


	function input_data($data,$table){
		$this->db->insert($table,$data);
	}

	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function getTodayActivities(){
		return $this->db->query("SELECT ta_unidentified.`u_id` AS id, ta_unidentified.`u_name` AS kodenama, ta_unidentified.`u_macaddress` AS mac, ta_log.`l_date` AS tgl, ta_log.`l_time` AS jam, ta_log.`l_location` AS lokasi, ta_log.`l_photo` AS foto
		FROM ta_unidentified
		INNER JOIN ta_log ON ta_unidentified.`u_id`=ta_log.`u_id`
		WHERE l_id IN (SELECT MAX(l_id) FROM ta_log WHERE l_date >= CURDATE() GROUP BY u_id)");
	}

	function getActivity(){
		return $this->db->query("SELECT ta_unidentified.`u_id` AS id, ta_unidentified.`u_name` AS kodenama, ta_unidentified.`u_macaddress` AS mac, ta_log.`l_date` AS tgl, ta_log.`l_time` AS jam, ta_log.`l_location` AS lokasi, ta_log.`l_photo` AS foto
		FROM ta_unidentified
		INNER JOIN ta_log ON ta_unidentified.`u_id`=ta_log.`u_id`
		WHERE l_id IN (SELECT MAX(l_id) FROM ta_log GROUP BY u_id)");
	}

	function getGeneralDevice(){
		return $this->db->query("SELECT m_name AS mname, m_address AS maddress FROM ta_macaddress WHERE p_id IS NULL");
	}

	function getEmployeeDevice(){
		return $this->db->query("SELECT ta_pengguna.`p_name` AS pname, ta_pengguna.`p_nip` AS pnip, ta_macaddress.`m_name` AS mname, ta_macaddress.`m_address` AS maddress
		FROM ta_pengguna
		INNER JOIN ta_macaddress ON ta_pengguna.`p_id`=ta_macaddress.`p_id`");
	}

}