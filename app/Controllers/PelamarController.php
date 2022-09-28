<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Lowongan;
use App\Models\Pelamar;
use TCPDF;

class PelamarController extends BaseController
{

    public function __construct()
    {
        helper(['form']);
        $this->pelamar_model = new Pelamar();
        $this->lowongan_model = new Lowongan();
    }



    public function index()
    {

        // paginate
        $paginate = 5000;
        $data['pelamar']   = $this->pelamar_model->join('lowongan', 'lowongan.lowongan_id = pelamar.lowongan_id', 'INNER JOIN')->paginate($paginate, 'pelamar');
        echo view('pelamar/index', $data);
    }


    public function pdf()
    {
        // proteksi halaman		
        $data = array(
            'pelamar'    => $this->pelamar_model->getData(),
        );
        $html =  view('pelamar/pdf', $data);

        // test pdf

        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'A4', true, 'UTF-8', false);
        // set font tulisan
        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Mia Safitri');
        $pdf->SetTitle('Report Data pelamar');
        $pdf->SetSubject('REPORT Data pelamar');

        // set default header data
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, 'Data pelamar PT Afour Erawijaya ', '');

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
        $pdf->Output('data_pelamar.pdf', 'I');
    }

    public function create()
    {
        $lowongan = $this->lowongan_model->findAll();
        $data['lowongan'] = ['' => 'lowongan'] + array_column($lowongan, 'nama_lowongan', 'lowongan_id');
        return view('pelamar/create', $data);
    }


    public function pelamar()
    {
        $lowongan = $this->lowongan_model->findAll();
        $data['lowongan'] = ['' => 'lowongan'] + array_column($lowongan, 'nama_lowongan', 'lowongan_id');
        return view('pelamar/form', $data);
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
            'agama'                => $this->request->getPost('agama'),
            'pendidikan_terakhir'   => $this->request->getPost('pendidikan_terakhir'),
            'pengalaman'            => $this->request->getPost('pengalaman'),
            'status'                => $this->request->getPost('status'),
            'deskripsi'             => $this->request->getPost('deskripsi'),
            'ijazah'                => $fileIjazah,
            'ktp'                   => $fileKtp,
            'kk'                    => $fileKK,
            'lowongan_id'           => $this->request->getPost('lowongan_id'),

        );
        $dataKtp->move('uploads/ktp/', $fileKtp);
        $dataKK->move('uploads/kk/', $fileKK);
        $dataIjazah->move('uploads/ijazah/', $fileIjazah);
        session()->setFlashdata('success', 'Pelamar Berhasil diupload');

        if ($validation->run($data, 'pelamar') == FALSE) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('pelamar/create'));
        } else {
            // insert
            $simpan = $this->pelamar_model->insertData($data);
            if ($simpan) {
                session()->setFlashdata('success', 'Tambah Data Berhasil');
                return redirect()->to(base_url('pelamar/index'));
            }
        }
    }



    public function register()
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
            'agama'                 => $this->request->getPost('agama'),
            'pendidikan_terakhir'   => $this->request->getPost('pendidikan_terakhir'),
            'pengalaman'            => $this->request->getPost('pengalaman'),
            'status'                => $this->request->getPost('status'),
            'deskripsi'             => $this->request->getPost('deskripsi'),
            'ijazah'                => $fileIjazah,
            'ktp'                   => $fileKtp,
            'kk'                    => $fileKK,
            'lowongan_id'           => $this->request->getPost('lowongan_id'),

        );
        $dataKtp->move('uploads/ktp/', $fileKtp);
        $dataKK->move('uploads/kk/', $fileKK);
        $dataIjazah->move('uploads/ijazah/', $fileIjazah);
        session()->setFlashdata('success', 'Pelamar Berhasil diupload');

        if ($validation->run($data, 'pelamar') == FALSE) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('index/pelamar/form'));
        } else {
            // insert
            $simpan = $this->pelamar_model->insertData($data);
            if ($simpan) {
                session()->setFlashdata('success', 'Data Lamaran Anda Berhasil Masuk Ke Data Kami, Untuk Proses Selanjutnya Akan Di Hubungi oleh Team HRD Kami, Terimakasih ');
                return redirect()->to(base_url('index/pelamar/form'));
            }
        }
    }

    public function edit($id)
    {
        $lowongan = $this->lowongan_model->findAll();
        $data['lowongan'] = ['' => 'Pilih lowongan'] + array_column($lowongan, 'nama_lowongan', 'lowongan_id');
        $data['pelamar'] = $this->pelamar_model->getData($id);
        echo view('pelamar/edit', $data);
    }

    public function update()
    {
        $id = $this->request->getPost('pelamar_id');

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
            'agama'                 => $this->request->getPost('agama'),
            'pendidikan_terakhir'   => $this->request->getPost('pendidikan_terakhir'),
            'pengalaman'            => $this->request->getPost('pengalaman'),
            'status'                => $this->request->getPost('status'),
            'deskripsi'             => $this->request->getPost('deskripsi'),
            'ijazah'                => $fileIjazah,
            'ktp'                   => $fileKtp,
            'kk'                    => $fileKK,
            'lowongan_id'           => $this->request->getPost('lowongan_id'),
        );
        if ($validation->run($data, 'pelamar') == FALSE) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('pelamar/edit/' . $id));
        } else {
            $ubah = $this->pelamar_model->updateData($data, $id);
            if ($ubah) {
                session()->setFlashdata('info', 'Update Data Berhasil');
                return redirect()->to(base_url('pelamar/index'));
            }
        }
    }

    public function delete($id)
    {
        $hapus = $this->pelamar_model->deleteData($id);
        if ($hapus) {
            session()->setFlashdata('warning', 'Delete Data  Berhasil');
            return redirect()->to(base_url('pelamar/index'));
        }
    }
}
