<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Karyawan;
use App\Models\Training;
use TCPDF;

class TrainingController extends BaseController
{
    public function __construct()
    {
        helper(['form']);
        $this->training_model = new Training();
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
        $data['training']   = $this->training_model->join('karyawan', 'karyawan.karyawan_id = training.karyawan_id', 'INNER JOIN')->paginate($paginate, 'training');
        echo view('training/index', $data);
    }

    public function pdf()
    {
        if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
        // proteksi halaman		
        $data = array(
            'training'    => $this->training_model->getData(),
        );
        $html =  view('training/pdf', $data);

        // test pdf

        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'A4', true, 'UTF-8', false);
        // set font tulisan
        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Mia Safitri');
        $pdf->SetTitle('Report Data training');
        $pdf->SetSubject('REPORT Data training');

        // set default header data
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, 'Data training PT Afour Erawijaya ', '');

        // set header and footer fonts
        $pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

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
        $pdf->Output('data_training.pdf', 'I');
    }

    public function create()
    {
        if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
        $karyawan = $this->karyawan_model->findAll();
        $data['karyawan'] = ['' => 'karyawan'] + array_column($karyawan, 'nama', 'karyawan_id');
        return view('training/create', $data);
    }

    public function store()
    {
        if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
        $validation =  \Config\Services::validation();
        $data = array(

            'event'             => $this->request->getPost('event'),
            'tanggal_training'  => $this->request->getPost('tanggal_training'),
            'karyawan_id'       => $this->request->getPost('karyawan_id'),

        );

        if ($validation->run($data, 'training') == FALSE) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('training/create'));
        } else {
            // insert
            $simpan = $this->training_model->insertData($data);
            if ($simpan) {
                session()->setFlashdata('success', 'Tambah Data Berhasil');
                return redirect()->to(base_url('training/index'));
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
        $data['training'] = $this->training_model->getData($id);
        echo view('training/edit', $data);
    }

    public function update()
    {
        if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
        $id = $this->request->getPost('training_id');

        $validation =  \Config\Services::validation();

        $data = array(
            'event'             => $this->request->getPost('event'),
            'tanggal_training'  => $this->request->getPost('tanggal_training'),
            'karyawan_id'       => $this->request->getPost('karyawan_id'),

        );
        if ($validation->run($data, 'training') == FALSE) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('training/edit/' . $id));
        } else {
            $ubah = $this->training_model->updateData($data, $id);
            if ($ubah) {
                session()->setFlashdata('info', 'Update Data Berhasil');
                return redirect()->to(base_url('training/index'));
            }
        }
    }

    public function delete($id)
    {
        if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
        $hapus = $this->training_model->deleteData($id);
        if ($hapus) {
            session()->setFlashdata('warning', 'Delete Data  Berhasil');
            return redirect()->to(base_url('training/index'));
        }
    }
}
