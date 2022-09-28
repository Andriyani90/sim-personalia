<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Karyawan;
use App\Models\Penilaian;
use TCPDF;

class PenilaianController extends BaseController
{

public function __construct(){
    helper(['form']);
    $this->penilaian_model = new Penilaian();
    $this->karyawan_model = new Karyawan();
}



    public function index()
    {
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
	// paginate
	$paginate = 5000;
	$data['penilaian']   = $this->penilaian_model->join('karyawan', 'karyawan.karyawan_id = penilaian.karyawan_id','INNER JOIN')->paginate($paginate, 'penilaian');
	echo view('penilaian/index', $data);
    }

    public function pdf(){
    		// proteksi halaman		
		$data = array(
			'penilaian'	=> $this->penilaian_model->getData(),	
		);
		$html =  view('penilaian/pdf', $data);

		// test pdf

        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'A4', true, 'UTF-8', false);
		// set font tulisan
		// set document information
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('Mia Safitri');
		$pdf->SetTitle('Report Data Penilaian');
		$pdf->SetSubject('REPORT Data Penilaian');

		// set default header data
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH,'Data Penilaian PT Afour Erawijaya ','');

		// set header and footer fonts
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
		// set margins
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

		// set auto page breaks
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

		$pdf->SetFont('dejavusans', '', 10);
		$pdf->AddPage();
		// write html
		$pdf->writeHTML($html, true, false, true, false, '');
		$this->response->setContentType('application/pdf');
		// ouput pdf
		$pdf->Output('data_penilaian.pdf', 'I');



 
    }

    public function create()
    {
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
		$karyawan = $this->karyawan_model->findAll();
		$data['karyawan'] = ['' => 'karyawan'] + array_column($karyawan, 'nama', 'karyawan_id');
		return view('penilaian/create', $data);
    }

    public function store(){
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
		$validation =  \Config\Services::validation();
		$data = array(
		
			'penilaian_atas'        => $this->request->getPost('penilaian_atas'),
			'nilai'        			=> $this->request->getPost('nilai'),
			'periode'        		=> $this->request->getPost('periode'),
			'karyawan_id'        	=> $this->request->getPost('karyawan_id'),

		);

		if ($validation->run($data, 'penilaian') == FALSE) {
			session()->setFlashdata('inputs', $this->request->getPost());
			session()->setFlashdata('errors', $validation->getErrors());
			return redirect()->to(base_url('penilaian/create'));
		} else {
			// insert
			$simpan = $this->penilaian_model->insertData($data);
			if ($simpan) {
				session()->setFlashdata('success', 'Tambah Data Berhasil');
				return redirect()->to(base_url('penilaian/index'));
			}
		}
    }

	public function edit($id)
	{
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
		$karyawan = $this->karyawan_model->findAll();
		$data['karyawan'] = ['' => 'Pilih karyawan'] + array_column($karyawan, 'nama', 'karyawan_id');
		$data['penilaian'] = $this->penilaian_model->getData($id);
		echo view('penilaian/edit', $data);
	}

    public function update(){
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
        $id = $this->request->getPost('penilaian_id');

		$validation =  \Config\Services::validation();

		$data = array(
			'penilaian_atas'        => $this->request->getPost('penilaian_atas'),
			'nilai'        			=> $this->request->getPost('nilai'),
			'periode'        		=> $this->request->getPost('periode'),
			'karyawan_id'        	=> $this->request->getPost('karyawan_id'),

		);
		if ($validation->run($data, 'penilaian') == FALSE) {
			session()->setFlashdata('inputs', $this->request->getPost());
			session()->setFlashdata('errors', $validation->getErrors());
			return redirect()->to(base_url('penilaian/edit/' . $id));
		} else {
			$ubah = $this->penilaian_model->updateData($data, $id);
			if ($ubah) {
				session()->setFlashdata('info', 'Update Data Berhasil');
				return redirect()->to(base_url('penilaian/index'));
			}
		}
    }

    public function delete($id){
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
        $hapus = $this->penilaian_model->deleteData($id);
		if ($hapus) {
			session()->setFlashdata('warning', 'Delete Data  Berhasil');
			return redirect()->to(base_url('penilaian/index'));
		}
    }
}
