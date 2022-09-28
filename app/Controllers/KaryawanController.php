<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Karyawan;
use TCPDF;

class KaryawanController extends BaseController
{
    protected $helpers = [];
    public $db;

    public function __construct()
    {
        helper(['form']);
        $this->karyawan_model = new Karyawan();
        $this->db = \Config\Database::connect();
    }


    public function index()
    {
       // proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}

        $currentPage = $this->request->getVar('page_karyawan') ? $this->request->getVar('page_karyawan') : 1;
        $paginate = 1000000;
        $data = [
            'karyawan'      =>  $this->karyawan_model->paginate($paginate, 'karyawan'),
            'pager'         =>  $this->karyawan_model->pager,
            'currentPage'   => $currentPage,
        ];
        echo view('karyawan/index', $data);
    }


	public function pdf(){
		// proteksi halaman		
		$data = array(
			'karyawan'	=> $this->karyawan_model->getData(),	
		);
		$html =  view('karyawan/pdf', $data);

		// test pdf

        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'A4', true, 'UTF-8', false);
		// set font tulisan
		// set document information
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('Mia Safitri');
		$pdf->SetTitle('Report Data Karyawan');
		$pdf->SetSubject('REPORT Data Karyawan');

		// set default header data
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH,'Data Karyawan PT Afour Erawijaya ','');

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
		$pdf->Output('data_karyawan.pdf', 'I');


	}


    public function create()
    {
        return view('karyawan/create');
    }

    public function store()
    {
        // proteksi halaman
        if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
        $validation =  \Config\Services::validation();

        $dataIjazah = $this->request->getFile('ijazah');
        $dataKtp = $this->request->getFile('ktp');
        $dataPerjanjianKerja = $this->request->getFile('perjanjian_kerja');
        $fileIjazah = $dataIjazah->getName();
        $fileKtp = $dataKtp->getName();
        $filePerjanjianKerja = $dataPerjanjianKerja->getName();

        $data = array(
            'nama'                => $this->request->getPost('nama'),
            'ijazah'              => $fileIjazah,
            'ktp'                 => $fileKtp,
            'perjanjian_kerja'    => $filePerjanjianKerja,
            'tanggal_lahir'       => $this->request->getPost('tanggal_lahir'),
            'nik'                 => $this->request->getPost('nik'),
            'telephone'           => $this->request->getPost('telephone'),
            'alamat'              => $this->request->getPost('alamat'),
            'tanggal_masuk'       => $this->request->getPost('tanggal_masuk'),
            'jabatan'             => $this->request->getPost('jabatan'),
            'status'              => $this->request->getPost('status')
        );
        $dataKtp->move('uploads/ktp/', $fileKtp);
        $dataPerjanjianKerja->move('uploads/perjanjiankerja/', $filePerjanjianKerja);
        $dataIjazah->move('uploads/ijazah/', $fileIjazah);

        if ($validation->run($data, 'karyawan') == FALSE) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('karyawan/create'));
        } else {

            $simpan = $this->karyawan_model->insertData($data);
            if ($simpan) {
                session()->setFlashdata('success', 'Tambah Data Berhasil');
                return redirect()->to(base_url('karyawan/index'));
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
        $data['karyawan'] = $this->karyawan_model->getData($id);
        echo view('karyawan/edit', $data);
    }

    public function update()
    {
       // proteksi halaman
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
        $id = $this->request->getPost('karyawan_id');

        $validation =  \Config\Services::validation();


        $dataIjazah = $this->request->getFile('ijazah');
        $dataKtp = $this->request->getFile('ktp');
        $dataPerjanjianKerja = $this->request->getFile('perjanjian_kerja');
        $fileIjazah = $dataIjazah->getName();
        $fileKtp = $dataKtp->getName();
        $filePerjanjianKerja = $dataPerjanjianKerja->getName();


        $data = array(
            'nama'                => $this->request->getPost('nama'),
            'ijazah'              => $fileIjazah,
            'ktp'                 => $fileKtp,
            'perjanjian_kerja'    => $filePerjanjianKerja,
            'nik'                 => $this->request->getPost('nik'),
            'telephone'           => $this->request->getPost('telephone'),
            'alamat'              => $this->request->getPost('alamat'),
            'tanggal_lahir'       => $this->request->getPost('tanggal_lahir'),
            'tanggal_masuk'       => $this->request->getPost('tanggal_masuk'),
            'jabatan'             => $this->request->getPost('jabatan'),
            'status'              => $this->request->getPost('status')

        );
        $dataKtp->move('uploads/ktp/', $fileKtp);
        $dataPerjanjianKerja->move('uploads/perjanjiankerja/', $filePerjanjianKerja);
        $dataIjazah->move('uploads/ijazah/', $fileIjazah);
        if ($validation->run($data, 'karyawan') == FALSE) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('karyawan/edit/' . $id));
        } else {

            $ubah = $this->karyawan_model->updateData($data, $id);
            if ($ubah) {
                session()->setFlashdata('info', 'Update Data Berhasil');
                return redirect()->to(base_url('karyawan/index'));
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
        $hapus = $this->karyawan_model->deleteData($id);
        if ($hapus) {
            session()->setFlashdata('warning', 'Delete Data Berhasil');
            return redirect()->to(base_url('karyawan/index'));
        }
    }
}
