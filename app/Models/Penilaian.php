<?php

namespace App\Models;

use CodeIgniter\Model;

class Penilaian extends Model
{
    protected $table = 'penilaian';

	public function getData($id = false)
	{
		if ($id === false) {
			return $this->table('penilaian')
				->join('karyawan', 'karyawan.karyawan_id = penilaian.karyawan_id')
				->get()
				->getResultArray();
		} else {
			return $this->table('penilaian')
				->join('karyawan', 'karyawan.karyawan_id = penilaian.karyawan_id')
				->where('penilaian.penilaian_id', $id)
				->get()
				->getRowArray();
		}
	}
	public function insertData($data)
	{
		return $this->db->table($this->table)->insert($data);
	}

	public function updateData($data, $id)
	{
		return $this->db->table($this->table)->update($data, ['penilaian_id' => $id]);
	}
	public function deleteData($id)
	{
		return $this->db->table($this->table)->delete(['penilaian_id' => $id]);
	}
}
