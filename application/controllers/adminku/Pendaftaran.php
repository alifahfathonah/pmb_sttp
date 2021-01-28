<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftaran extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Pendaftaran_model');
		$session = $this->session->userdata();
		if ($this->session->userdata('user_logged')===null) {
			redirect(site_url('adminku/auth'));
		};
	}

	public function index()
	{
		$data['user']= $this->session->userdata('user_logged');
		$data['jur']= $this->db->get('jurusan')->result();
		$data['title']="Pendaftaran";
		$this->load->view('admin/pendaftaran/index', $data);
	}
	public function getAll()
	{
		$taActive=$this->db->get_where('tahun',['status'=>'y'])->row_array()['tahun'];
		// Datatables Variables
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));


		$pendaftars = $this->Pendaftaran_model->get_data($taActive);

		$data = array();

		foreach($pendaftars->result() as $r) {

			$data[] = array(
				$r->no_daftar,
				$r->nm_lkp,
				$r->nisn,
				$this->db->get_where('jurusan',['id_jur'=>$r->pil])->row_array()['nm_jur'],
				"<button class='btn btn-primary' data-toggle='modal' data-target='#modal-detail' onclick='detail($r->id_dftr)'>Detail</button> ".
				"<a href='".site_url('daftar/cetak/').$r->no_daftar."' target='_blank' class='btn btn-warning' >Cetak</a> ".
				"<button class='btn btn-success' data-toggle='modal' data-target='#modal-edit' onclick='edit($r->id_dftr)'>Edit</button> ".
				"<button id='hps".$r->id_dftr."' class='btn btn-danger' onclick='hapus($r->id_dftr)'>Hapus</button>",
			);
		}

		$output = array(
			"draw" => $draw,
			"recordsTotal" => $pendaftars->num_rows(),
			"recordsFiltered" => $pendaftars->num_rows(),
			"data" => $data
		);
		echo json_encode($output);
		exit();
	}
	public function post()
	{
		$this->form_validation->set_rules('gol_drh','Golongan Darah','required|max_length[2]');
		$this->form_validation->set_rules('nik','NIK','required|max_length[16]');
		$this->form_validation->set_rules('nisn','NISN','required|max_length[10]');
		$data=$this->input->post();
		$taActive=$this->db->get_where('tahun',['status'=>'y'])->row_array()['tahun'];
		if ($taActive==null) {
			echo 'Belum ada tahun aktif !';
			die();
		};
		$data['ta']=$taActive;
		// no_pendaftaran
		$this->db->select('*');
		$this->db->from('pendaftaran');
		$this->db->order_by('created_at','desc');
		$this->db->where('pendaftaran.ta',$data['ta']);
		$last=$this->db->get()->row_array();

		if ($last!=null) {
			$getLast=substr(strval($last['no_daftar']), -3);
			$lastId=intval($getLast)+1;
		}else{
			$lastId=1;
		};
		$data['jur']=$this->db->get('jurusan')->result();	
		$data['created_at']=date('Y-m-d h:m:i');
		
		$year=substr( date('Y'), -2);
		$month=substr( date('m'), -2);
		$jurkode=$this->db->get_where('jurusan',['id_jur'=>$data['pil']])->row_array()['sym'];
		$data['no_daftar']=$jurkode.$year.$month.str_pad($lastId, 3, '0', STR_PAD_LEFT);
		// end of no pendaftaran
		if ($this->form_validation->run()) {
			unset($data['jur']);
			$data['nm_lkp']=strtoupper($data['nm_lkp']);
			$data['tmp_lhr']=strtoupper($data['tmp_lhr']);
			$data['alm_lkp']=strtoupper($data['alm_lkp']);
			$data['gol_drh']=strtoupper($data['gol_drh']);
			$data['wrg_ngr']=strtoupper($data['wrg_ngr']);
			$data['nm_ortu']=strtoupper($data['nm_ortu']);
			$data['pkrj_ortu']=strtoupper($data['pkrj_ortu']);
			$data['nm_skl']=strtoupper($data['nm_skl']);
			$data['alm_skl']=strtoupper($data['alm_skl']);
			$data['jrs_skl']=strtoupper($data['jrs_skl']);
			$this->db->insert('pendaftaran', $data);
			$this->session->set_flashdata('message', 'Data berhasil di input');
			redirect(site_url('adminku/pendaftaran'));
		}else{
			$this->session->set_flashdata('error', validation_errors());
			$this->session->set_flashdata('input', $data);
			redirect(site_url('adminku/pendaftaran'));
		}

	}
	public function edit()
	{
		$id=$this->input->post('id');
		$data['calon']=$this->db->get_where('pendaftaran',['id_dftr'=>$id])->row_array();
		$data['jur']=$this->db->get('jurusan')->result();
		$this->load->view('admin/pendaftaran/edit', $data);
	}
	public function update()
	{
		$data=$this->input->post();
		$data['nm_lkp']=strtoupper($data['nm_lkp']);
		$data['tmp_lhr']=strtoupper($data['tmp_lhr']);
		$data['alm_lkp']=strtoupper($data['alm_lkp']);
		$data['gol_drh']=strtoupper($data['gol_drh']);
		$data['wrg_ngr']=strtoupper($data['wrg_ngr']);
		$data['nm_ortu']=strtoupper($data['nm_ortu']);
		$data['pkrj_ortu']=strtoupper($data['pkrj_ortu']);
		$data['nm_skl']=strtoupper($data['nm_skl']);
		$data['alm_skl']=strtoupper($data['alm_skl']);
		$data['jrs_skl']=strtoupper($data['jrs_skl']);
		$calon=$this->db->get_where('pendaftaran',['id_dftr'=>$data['id_dftr']])->row_array();
		if ($_FILES['photo'] && $_FILES['photo']['name'] != null) {
			$current_file = "uploads/".$calon['photo'];
			if(file_exists($current_file)){
				unlink($current_file);
			};
			$config['upload_path']          = './uploads/foto/';
			$config['file_name']            = 'mhs_'.date('YmdHis').'_'.uniqid();
			$config['allowed_types']        = 'jpg';
			$config['max_size']             = 1024;
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('photo')){
				$this->session->set_flashdata('errPE', $this->upload->display_errors());
				redirect(site_url('adminku/pendaftaran'));
			}else{
				$data['photo'] = 'foto/'.$this->upload->data("file_name");
				if ($data['pil']!=$calon['pil']) {
					$data['no_daftar']=$this->db->get_where('jurusan',['id_jur'=>$data['pil']])->row_array()['sym'].substr($calon['no_daftar'], 2, 7);
				}
				$this->db->where('id_dftr', $data['id_dftr']);
				$this->db->update('pendaftaran', $data);
				$this->session->set_flashdata('message', 'Data dan foto berhasil di update');
				redirect(site_url('adminku/pendaftaran'));
			}
		}
		if ($data['pil']!=$calon['pil']) {
			$data['no_daftar']=$this->db->get_where('jurusan',['id_jur'=>$data['pil']])->row_array()['sym'].substr($calon['no_daftar'], 2, 7);
		}
		$this->db->where('id_dftr', $data['id_dftr']);
		$this->db->update('pendaftaran', $data);
		$this->session->set_flashdata('message', 'Data berhasil di update');
		redirect(site_url('adminku/pendaftaran'));
	}
	public function hapus()
	{
		$id=$this->input->post('id');
		$calon = $this->db->get_where('pendaftaran',['id_dftr'=>$id])->row_array();
		$current_file = "uploads/".$calon['photo'];
		if(file_exists($current_file)){
			unlink($current_file);
		};
		$this->db->delete('pendaftaran', ['id_dftr'=>$id]);
	}
}
