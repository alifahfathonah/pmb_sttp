<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('User_model');
		$session = $this->session->userdata('user_logged');
		// print_r($session);
		// die();
		if ($this->session->userdata('user_logged')===null) {
			redirect(site_url('adminku/auth'));
		};
		if($session['lvl_user']==2) {
			$this->load->view('errors/html/error_404');
			die();
		};
	}

	public function index()
	{
		$data['user']= $this->session->userdata('user_logged');
		$data['title']="User";
		$this->load->view('admin/user/index', $data);
	}
	public function getAll()
	{
		// Datatables Variables
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));


		$users = $this->User_model->get_data();

		$data = array();

		foreach($users->result() as $r) {

			$data[] = array(
				$r->name_user,
				$r->word_pass,
				"<button class='btn btn-primary' data-toggle='modal' data-target='#modal-edit' onclick='edit($r->id_user)'>Edit</button> ".
				"<button id='hps".$r->id_user."' class='btn btn-danger' onclick='hapus($r->id_user)'>Hapus</button>",
			);
		}

		$output = array(
			"draw" => $draw,
			"recordsTotal" => $users->num_rows(),
			"recordsFiltered" => $users->num_rows(),
			"data" => $data
		);
		echo json_encode($output);
		exit();
	}
	public function post()
	{
		$data=$this->input->post();
		$data['lvl_user']=2;
		$this->db->insert('users', $data);
		$this->session->set_flashdata('message', 'Data berhasil di input');
		redirect(site_url('adminku/user'));
	}

	public function edit()
	{
		$id=$this->input->post('id');
		$data['calon']=$this->db->get_where('users',['id_user'=>$id])->row_array();
		$this->load->view('admin/user/edit', $data);
	}

	public function update()
	{
		$data=$this->input->post();
		$this->db->where('id_user', $data['id_user']);
		$this->db->update('users', $data);
		$this->session->set_flashdata('message', 'Data berhasil di update');
		redirect(site_url('adminku/user'));
	}

	public function hapus()
	{
		$id=$this->input->post('id');
		$this->db->delete('users', ['id_user'=>$id]);
	}
}
