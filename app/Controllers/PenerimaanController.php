<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Pelamar;
use App\Models\Penerimaan;

class PenerimaanController extends BaseController
{
   
    public function __construct()
    {
        helper(['form']);
        $this->penerimaan_model = new Penerimaan();
        $this->pelamar_model = new Pelamar();
    }



    public function index()
    {

        // paginate
        $paginate = 5000;
        $data['penerimaan']   = $this->penerimaan_model->join('pelamar', 'pelamar.pelamar_id = penerimaan.pelamar_id', 'INNER JOIN')->paginate($paginate, 'penerimaan');
        echo view('penerimaan/index', $data);
    }


    public function pdf()
    {
        // proteksi halaman		
        $data = array(
            'penerimaan'    => $this->penerimaan_model->getData(),
        );
        $html =  view('penerimaan/pdf', $data);

        // test pdf

        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'A4', true, 'UTF-8', false);
        // set font tulisan
        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Mia Safitri');
        $pdf->SetTitle('Report Data penerimaan');
        $pdf->SetSubject('REPORT Data penerimaan');

        // set default header data
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, 'Data penerimaan PT Afour Erawijaya ', '');

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
        $pdf->Output('data_penerimaan.pdf', 'I');
    }

    public function create()
    {
        $pelamar = $this->pelamar_model->findAll();
        $data['pelamar'] = ['' => 'pelamar'] + array_column($pelamar, 'nama', 'pelamar_id');
        return view('penerimaan/create', $data);
    }


    public function penerimaan()
    {
        $pelamar = $this->pelamar_model->findAll();
        $data['pelamar'] = ['' => 'pelamar'] + array_column($pelamar, 'nama', 'pelamar_id');
        return view('penerimaan/form', $data);
    }

    public function store()
    {
        $validation =  \Config\Services::validation();

        $data = array(
            'tanggal_interview'     => $this->request->getPost('tanggal_interview'),
            'start_kontrak'         => $this->request->getPost('start_kontrak'),
            'end_kontrak'           => $this->request->getPost('end_kontrak'),
            'status'                => $this->request->getPost('status'),
            'deskripsi'             => $this->request->getPost('deskripsi'),
            'pelamar_id'            => $this->request->getPost('pelamar_id'),

        );
        session()->setFlashdata('success', 'penerimaan Berhasil diupload');

        if ($validation->run($data, 'penerimaan') == FALSE) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('penerimaan/create'));
        } else {
            // insert
            $simpan = $this->penerimaan_model->insertData($data);
            if ($simpan) {
                session()->setFlashdata('success', 'Tambah Data Berhasil');
                return redirect()->to(base_url('penerimaan/index'));
            }
        }
    }


    public function edit($id)
    {
        $pelamar = $this->pelamar_model->findAll();
        $data['pelamar'] = ['' => 'Pilih pelamar'] + array_column($pelamar, 'nama', 'pelamar_id');
        $data['penerimaan'] = $this->penerimaan_model->getData($id);
        echo view('penerimaan/edit', $data);
    }

    public function update()
    {
        $id = $this->request->getPost('penerimaan_id');

        $validation =  \Config\Services::validation();

        $data = array(
            'tanggal_interview'     => $this->request->getPost('tanggal_interview'),
            'start_kontrak'         => $this->request->getPost('start_kontrak'),
            'end_kontrak'           => $this->request->getPost('end_kontrak'),
            'status'                => $this->request->getPost('status'),
            'deskripsi'             => $this->request->getPost('deskripsi'),
            'pelamar_id'            => $this->request->getPost('pelamar_id'),

        );
        if ($validation->run($data, 'penerimaan') == FALSE) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('penerimaan/edit/' . $id));
        } else {
            $ubah = $this->penerimaan_model->updateData($data, $id);
            if ($ubah) {
                session()->setFlashdata('info', 'Update Data Berhasil');
                return redirect()->to(base_url('penerimaan/index'));
            }
        }
    }

    public function delete($id)
    {
        $hapus = $this->penerimaan_model->deleteData($id);
        if ($hapus) {
            session()->setFlashdata('warning', 'Delete Data  Berhasil');
            return redirect()->to(base_url('penerimaan/index'));
        }
    }
}
