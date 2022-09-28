<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;

class UsersController extends BaseController
{

	public function __construct()
	{
		helper(['form']);
		$this->users_model = new User();
	}

	public function index()
	{
		// lindugi halaman agar user / orang yang mau masuk harus login terlebih dahulu
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
		// membuat halaman otomatis berubah ketika berpindah halaman 
		$currentPage = $this->request->getVar('page_users') ? $this->request->getVar('page_users') : 1;
		// paginate
		$paginate = 100000;
		$data['users']   = $this->users_model->paginate($paginate, 'users');
		$data['pager']        = $this->users_model->pager;
		$data['currentPage']  = $currentPage;
		echo view('users/index', $data);
	}
	
	public function create()
	{
		return view('users/create');
	}

	public function store()
	{
		// lindugi halaman agar user / orang yang mau masuk harus login terlebih dahulu
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
		$validation =  \Config\Services::validation();


		$data = array(
			'nama_user'             => $this->request->getPost('nama_user'),
			'username'              => $this->request->getPost('username'),
			'password'              => $this->request->getPost('password'),
			'level'                 => $this->request->getPost('level'),

		);

		if ($validation->run($data, 'users') == FALSE) {
			session()->setFlashdata('inputs', $this->request->getPost());
			session()->setFlashdata('errors', $validation->getErrors());
			return redirect()->to(base_url('users/create'));
		} else {

			$simpan = $this->users_model->insertData($data);
			if ($simpan) {
				session()->setFlashdata('success', 'Tambah Data Berhasil');
				return redirect()->to(base_url('users/index'));
			}
		}
	}


	public function edit($id)
	{
		// lindugi halaman agar user / orang yang mau masuk harus login terlebih dahulu
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
		$data['users'] = $this->users_model->getData($id);
		echo view('users/edit', $data);
	}

	public function update()
	{
		// lindugi halaman agar user / orang yang mau masuk harus login terlebih dahulu
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
		$id = $this->request->getPost('id');

		$validation =  \Config\Services::validation();


		$data = array(
			'nama_user'             => $this->request->getPost('nama_user'),
			'username'              => $this->request->getPost('username'),
			'password'              => $this->request->getPost('password'),
			'level'                 => $this->request->getPost('level'),

		);

		if ($validation->run($data, 'users') == FALSE) {
			session()->setFlashdata('inputs', $this->request->getPost());
			session()->setFlashdata('errors', $validation->getErrors());
			return redirect()->to(base_url('users/edit/' . $id));
		} else {

			$ubah = $this->users_model->updateData($data, $id);
			if ($ubah) {
				session()->setFlashdata('info', 'Update Data Berhasil');
				return redirect()->to(base_url('users/index'));
			}
		}
	}

	public function delete($id)
	{
		// lindugi halaman agar user / orang yang mau masuk harus login terlebih dahulu
		if (session()->get('username') == '') {
			session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
			return redirect()->to(base_url('login'));
		}
		$hapus = $this->users_model->deleteData($id);
		if ($hapus) {
			session()->setFlashdata('warning', 'Delete Data Berhasil');
			return redirect()->to(base_url('users/index'));
		}
	}
}
