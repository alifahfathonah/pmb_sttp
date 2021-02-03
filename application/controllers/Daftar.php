<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['jur']=$this->db->get('jurusan')->result();
		$this->load->view('form_daftar', $data);
	}
	public function post()
	{
		$this->form_validation->set_rules('gol_drh','Golongan Darah','required|max_length[2]');
		$this->form_validation->set_rules('nik','NIK','required|max_length[16]');
		$this->form_validation->set_rules('nisn','NISN','required|max_length[10]');
		$data=$this->input->post();
		unset($data['g-recaptcha-response']);
		// google captcha
		$recaptchaResponse = trim($this->input->post('g-recaptcha-response'));
		$userIp=$this->input->ip_address();
        $secret='6LcrSkgaAAAAAEDbk8d4BEN4I4Fl9P7n7NkncLlH'; // ini adalah Secret key yang didapat dari google, silahkan disesuaikan
        $credential = array(
        	'secret' => $secret,
        	'response' => $this->input->post('g-recaptcha-response')
        );
        $verify = curl_init();
        curl_setopt($verify, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
        curl_setopt($verify, CURLOPT_POST, true);
        curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($credential));
        curl_setopt($verify, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($verify);

        $status= json_decode($response, true);

        if($status['success']){ 
            //$this->db->insert('users',$data); 
        	$this->session->set_flashdata('message', 'Google Recaptcha Successful');
        }else{
        	$this->session->set_flashdata('error', 'Sorry Google Recaptcha Unsuccessful!!');
        	$this->session->set_flashdata('input', $data);
        	redirect(site_url('daftar'));

        	die();
        }
        // redirect(base_url('login'));
		// end google captcha
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
        	$this->db->insert('pendaftaran', $data);
        	$this->session->set_flashdata('berhasil', $data['no_daftar']);
        	redirect(site_url('daftar/success'));
        }else{
        	$this->session->set_flashdata('error', validation_errors());
        	$this->session->set_flashdata('input', $data);
        	redirect(site_url('daftar'));
        }
    }
    public function cek()
    {
    	$data['jur']=$this->db->get('jurusan')->result();
    	if ($this->session->userdata('user_logged')) {
    		$data['calon']=$this->db->get_where('pendaftaran',['id_dftr'=>$this->input->post('src')])->row_array();
    		$this->load->view('success2', $data);
			// echo $this->input->post('src');
    	}else{
    		$data['calon']=$this->db->get_where('pendaftaran',['no_daftar'=>$this->input->post('src')])->row_array();
    		$this->load->view('success', $data);
    	}
    }
    public function success()
    {
    	$no_daftar=$this->session->flashdata('berhasil');
    	$data['calon']=$this->db->get_where('pendaftaran',['no_daftar'=>$no_daftar])->row_array();
    	$data['jur']=$this->db->get('jurusan')->result();
    	$this->load->view('success', $data);
    }
    public function cetak($no_daftar)
    {
    	$this->generateQr($no_daftar);
    	$this->load->library('pdf');
    	$data['calon']=$this->db->get_where('pendaftaran',['no_daftar'=>$no_daftar])->row_array();
    	$data['jur']=$this->db->get('jurusan')->result();
		// $this->load->view('CetakPendaftaran',$data);
    	$this->pdf->setPaper('A4', 'potrait');
    	$this->pdf->filename = "BuktiDaftar_".$no_daftar.".pdf";
    	$this->pdf->load_view('CetakPendaftaran', $data);

    }
    public function generateQr($no_daftar)
    {
    	$calon=$this->db->get_where('pendaftaran',['no_daftar'=>$no_daftar])->row_array();
    	$jur=$this->db->get_where('jurusan',['id_jur'=>$calon['pil']])->row_array();
		$this->load->library('ciqrcode'); //pemanggilan library QR CODE

        $config['cacheable']    = true; //boolean, the default is true
        $config['cachedir']     = './assets/'; //string, the default is application/cache/
        $config['errorlog']     = './assets/'; //string, the default is application/logs/
        $config['imagedir']     = './assets/qr/'; //direktori penyimpanan qr code
        $config['quality']      = true; //boolean, the default is true
        $config['size']         = '1024'; //interger, the default is 1024
        $config['black']        = array(224,255,255); // array, default is array(255,255,255)
        $config['white']        = array(70,130,180); // array, default is array(0,0,0)
        $this->ciqrcode->initialize($config);

        $image_name=$no_daftar.'.png'; //buat name dari qr code sesuai dengan nim

        $params['data'] = $no_daftar.', '.$calon['nm_lkp'].', '.$jur['nm_jur'].', '.site_url('daftar/cetak/').$no_daftar; //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
        $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
    }
}
