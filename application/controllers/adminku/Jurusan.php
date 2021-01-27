<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurusan extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Jurusan_model');
		$session = $this->session->userdata('user_logged');
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
		$data['jur']= $this->db->get('jurusan')->result();
		$data['title']="Jurusan";
		$this->load->view('admin/jurusan/index', $data);
	}
	public function getAll()
	{
		// Datatables Variables
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));


		$jurusans = $this->Jurusan_model->get_data();

		$data = array();

		foreach($jurusans->result() as $r) {

			$data[] = array(
				$r->nm_jur,
				$r->sym,
				"<button class='btn btn-primary' data-toggle='modal' data-target='#modal-edit' onclick='edit($r->id_jur)'>Edit</button> ".
				"<button id='hps".$r->id_jur."' class='btn btn-danger' onclick='hapus($r->id_jur)'>Hapus</button>",
			);
		}

		$output = array(
			"draw" => $draw,
			"recordsTotal" => $jurusans->num_rows(),
			"recordsFiltered" => $jurusans->num_rows(),
			"data" => $data
		);
		echo json_encode($output);
		exit();
	}
	public function post()
	{
		$this->form_validation->set_rules('sym','Symbol','required|min_length[2]|max_length[2]');
		$data=$this->input->post();
		
		if ($this->form_validation->run()) {
			$this->db->insert('jurusan', $data);
			$this->session->set_flashdata('message', 'Data berhasil di input');
			redirect(site_url('adminku/jurusan'));
		}else{
			$this->session->set_flashdata('input', $data);
			$this->session->set_flashdata('error', validation_errors());
			redirect(site_url('adminku/jurusan'));
		}
	}

	public function edit()
	{
		$id=$this->input->post('id');
		$data['calon']=$this->db->get_where('jurusan',['id_jur'=>$id])->row_array();
		$this->load->view('admin/jurusan/edit', $data);
	}

	public function update()
	{
		$this->form_validation->set_rules('sym','Symbol','required|min_length[2]|max_length[2]');
		$data=$this->input->post();
		if ($this->form_validation->run()) {
			$this->db->where('id_jur', $data['id_jur']);
			$this->db->update('jurusan', $data);
			$this->session->set_flashdata('message', 'Data berhasil di update');
			redirect(site_url('adminku/jurusan'));
		}else{
			$this->session->set_flashdata('input', $data);
			$this->session->set_flashdata('errPE', validation_errors());
			redirect(site_url('adminku/jurusan'));	
		}
	}

	public function hapus()
	{
		$id=$this->input->post('id');
		$this->db->delete('jurusan', ['id_jur'=>$id]);
	}
}
