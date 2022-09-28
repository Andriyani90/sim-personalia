<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Lowongan;
use App\Models\Talent;
use TCPDF;


class TalentController extends BaseController
{

    public function __construct()
    {
        helper(['form']);
        $this->talent_model = new Talent();
        $this->lowongan_model = new Lowongan();
    }



    public function index()
    {

        // paginate
        $paginate = 5000;
        $data['talent']   = $this->talent_model->join('lowongan', 'lowongan.lowongan_id = talent.lowongan_id', 'INNER JOIN')->paginate($paginate, 'talent');
        echo view('talent/index', $data);
    }

    public function pdf()
    {
        // proteksi halaman		
        $data = array(
            'talent'    => $this->talent_model->getData(),
        );
        $html =  view('talent/pdf', $data);

        // test pdf

        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'A3', true, 'UTF-8', false);
        // set font tulisan
        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Mia Safitri');
        $pdf->SetTitle('Report Data talent');
        $pdf->SetSubject('REPORT Data talent');

        // set default header data
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, 'Data talent PT Afour Erawijaya ', '');

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
        $pdf->Output('data_talent.pdf', 'I');
    }

    public function create()
    {
        $lowongan = $this->lowongan_model->findAll();
        $data['lowongan'] = ['' => 'lowongan'] + array_column($lowongan, 'nama_lowongan', 'lowongan_id');
        return view('talent/create', $data);
    }

    public function store()
    {
        $validation =  \Config\Services::validation();
        $dataIjazah = $this->request->getFile('ijazah');
        $dataKtp = $this->request->getFile('ktp');
        $dataKK = $this->request->getFile('kk');
        $fileIjazah = $dataIjazah->getName();
        $fileKtp = $dataKtp->getName();
        $fileKK = $dataKK->getName();
        $data = array(

            'nama'                  => $this->request->getPost('nama'),
            'tanggal_lahir'         => $this->request->getPost('tanggal_lahir'),
            'alamat'                => $this->request->getPost('alamat'),
            'salary'                => $this->request->getPost('salary'),
            'role'                  => $this->request->getPost('role'),
            'pendidikan_terakhir'   => $this->request->getPost('pendidikan_terakhir'),
            'pengalaman'            => $this->request->getPost('pengalaman'),
            'ijazah'                => $fileIjazah,
            'ktp'                   => $fileKtp,
            'kk'                    => $fileKK,
            'lowongan_id'           => $this->request->getPost('lowongan_id'),

        );
        // $dataCv->move('uploads/cv/', $fileCv);
        $dataKtp->move('uploads/ktp/', $fileKtp);
        $dataKK->move('uploads/kk/', $fileKK);
        $dataIjazah->move('uploads/ijazah/', $fileIjazah);
        session()->setFlashdata('success', 'Pelamar Berhasil diupload');
        if ($validation->run($data, 'talent') == FALSE) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('talent/create'));
        } else {
            // insert
            $simpan = $this->talent_model->insertData($data);
            if ($simpan) {
                session()->setFlashdata('success', 'Tambah Data Berhasil');
                return redirect()->to(base_url('talent/index'));
            }
        }
    }

    public function edit($id)
    {
        $lowongan = $this->lowongan_model->findAll();
        $data['lowongan'] = ['' => 'Pilih lowongan'] + array_column($lowongan, 'nama_lowongan', 'lowongan_id');
        $data['talent'] = $this->talent_model->getData($id);
        echo view('talent/edit', $data);
    }

    public function update()
    {
        $id = $this->request->getPost('talent_id');

        $validation =  \Config\Services::validation();
        $dataIjazah = $this->request->getFile('ijazah');
        $dataKtp = $this->request->getFile('ktp');
        $dataKK = $this->request->getFile('kk');
        $fileIjazah = $dataIjazah->getName();
        $fileKtp = $dataKtp->getName();
        $fileKK = $dataKK->getName();

        $data = array(
            'nama'                  => $this->request->getPost('nama'),
            'tanggal_lahir'         => $this->request->getPost('tanggal_lahir'),
            'alamat'                => $this->request->getPost('alamat'),
            'salary'                => $this->request->getPost('salary'),
            'role'                  => $this->request->getPost('role'),
            'pendidikan_terakhir'   => $this->request->getPost('pendidikan_terakhir'),
            'pengalaman'            => $this->request->getPost('pengalaman'),
            'ijazah'                => $fileIjazah,
            'ktp'                   => $fileKtp,
            'kk'                    => $fileKK,
            'lowongan_id'           => $this->request->getPost('lowongan_id'),
        );
        if ($validation->run($data, 'talent') == FALSE) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('talent/edit/' . $id));
        } else {
            $ubah = $this->talent_model->updateData($data, $id);
            if ($ubah) {
                session()->setFlashdata('info', 'Update Data Berhasil');
                return redirect()->to(base_url('talent/index'));
            }
        }
    }

    public function delete($id)
    {
        $hapus = $this->talent_model->deleteData($id);
        if ($hapus) {
            session()->setFlashdata('warning', 'Delete Data  Berhasil');
            return redirect()->to(base_url('talent/index'));
        }
    }
}
