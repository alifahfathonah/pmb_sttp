<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$session = $this->session->userdata();
		if ($this->session->userdata('user_logged')===null) {
			redirect(site_url('adminku/auth'));
		};
	}
	
	public function index()
	{
		$data['user']= $this->session->userdata('user_logged');
		$data['tahun']=$this->db->get_where('tahun',['status'=>'y'])->row_array();
		$data['pendaftaran']=$this->db->get_where('pendaftaran',['ta'=>$data['tahun']['tahun']])->result();
		$data['jurusan']=$this->db->get('jurusan')->result();
		$data['users']=$this->db->get_where('users',['lvl_user'=>2])->result();
		$data['title']="Dashboard";
		$this->load->view('admin/dashboard', $data);
	}
}
