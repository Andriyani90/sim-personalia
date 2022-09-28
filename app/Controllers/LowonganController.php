<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Lowongan;
use TCPDF;

class LowonganController extends BaseController
{
  
    protected $helpers = [];
    public $db;

    public function __construct()
    {
        helper(['form']);
        $this->lowongan_model = new Lowongan();
        $this->db = \Config\Database::connect();
    }


    public function index()
    {

        $currentPage = $this->request->getVar('page_lowongan') ? $this->request->getVar('page_lowongan') : 1;
        $paginate = 1000000;
        $data = [
            'lowongan'      =>  $this->lowongan_model->paginate($paginate, 'lowongan'),
            'pager'         =>  $this->lowongan_model->pager,
            'currentPage'   => $currentPage,
        ];
        echo view('lowongan/index', $data);
    }


	public function pdf(){
		
		$data = array(
			'lowongan'	=> $this->lowongan_model->getData(),	
		);
		$html =  view('lowongan/pdf', $data);

		// test pdf

        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'A4', true, 'UTF-8', false);
		// set font tulisan
		// set document information
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('Mia Safitri');
		$pdf->SetTitle('Report Data lowongan');
		$pdf->SetSubject('REPORT Data lowongan');

		// set default header data
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH,'Data Lowongan Pkerjaan PT Afour Erawijaya','');

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
		$pdf->Output('data_lowongan.pdf', 'I');


	}


    public function create()
    {
        return view('lowongan/create');
    }

    public function store()
    {
        // proteksi halaman
        if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
        $validation =  \Config\Services::validation();


        $data = array(
            'nama_lowongan'                => $this->request->getPost('nama_lowongan'),
            'tanggal_input'                 => $this->request->getPost('tanggal_input')
        );

        if ($validation->run($data, 'lowongan') == FALSE) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('lowongan/create'));
        } else {

            $simpan = $this->lowongan_model->insertData($data);
            if ($simpan) {
                session()->setFlashdata('success', 'Tambah Data Berhasil');
                return redirect()->to(base_url('lowongan/index'));
            }
        }
    }
    public function edit($id)
    {
        // proteksi halaman
        if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
        $data['lowongan'] = $this->lowongan_model->getData($id);
        echo view('lowongan/edit', $data);
    }

    public function update()
    {
        // proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
        $id = $this->request->getPost('lowongan_id');

        $validation =  \Config\Services::validation();


        $data = array(
            'nama_lowongan'                => $this->request->getPost('nama_lowongan'),
            'tanggal_input'                => $this->request->getPost('tanggal_input')

        );

        if ($validation->run($data, 'lowongan') == FALSE) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('lowongan/edit/' . $id));
        } else {

            $ubah = $this->lowongan_model->updateData($data, $id);
            if ($ubah) {
                session()->setFlashdata('info', 'Update Data Berhasil');
                return redirect()->to(base_url('lowongan/index'));
            }
        }
    }

    public function delete($id)
    {
        // proteksi halaman
        if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
        $hapus = $this->lowongan_model->deleteData($id);
        if ($hapus) {
            session()->setFlashdata('warning', 'Delete Data Berhasil');
            return redirect()->to(base_url('lowongan/index'));
        }
    }
}
