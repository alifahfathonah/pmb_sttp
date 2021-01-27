<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ta extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Tahun_model');
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
		$data['title']="Tahun Ajaran";
		$this->load->view('admin/ta/index', $data);
	}
	public function getAll()
	{
		// Datatables Variables
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));


		$tahuns = $this->Tahun_model->get_data();

		$data = array();

		foreach($tahuns->result() as $r) {

			$data[] = array(
				$r->tahun,
				$r->status,
				$r->id,
			);
		}

		$output = array(
			"draw" => $draw,
			"recordsTotal" => $tahuns->num_rows(),
			"recordsFiltered" => $tahuns->num_rows(),
			"data" => $data
		);
		echo json_encode($output);
		exit();
	}
	public function post()
	{
		$this->form_validation->set_rules('tahun','Tahun','required|min_length[4]|max_length[4]');
		$data=$this->input->post();
		$data['status']='n';
		
		if ($this->form_validation->run()) {
			$this->db->insert('tahun', $data);
			$this->session->set_flashdata('message', 'Data berhasil di input');
			redirect(site_url('adminku/ta'));
		}else{
			$this->session->set_flashdata('input', $data);
			$this->session->set_flashdata('error', validation_errors());
			redirect(site_url('adminku/ta'));
		}
	}

	public function changeS()
	{
		$id=$this->input->post('id');
		$get=$this->db->get_where('tahun', ['id'=>$id])->row_array();
		$getActive=$this->db->get_where('tahun', ['status'=>'y'])->row_array();
		if ($get['status']=='y') {
			$sts='n';
		}else{
			$sts='y';
		}
		$this->db->where('id', $id);
		$this->db->update('tahun', [
			'status'=>$sts,
		]);
		$this->db->where('id', $getActive['id']);
		$this->db->update('tahun', [
			'status'=>'n',
		]);
	}
	public function hapus()
	{
		$id=$this->input->post('id');
		$this->db->delete('tahun', ['id'=>$id]);
	}
}
