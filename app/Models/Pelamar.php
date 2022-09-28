<?php

namespace App\Models;

use CodeIgniter\Model;

class Pelamar extends Model
{
	protected $table = 'pelamar';

	public function getData($id = false)
	{
		if ($id === false) {
			return $this->table('pelamar')
				->join('lowongan', 'lowongan.lowongan_id = pelamar.lowongan_id')
				->get()
				->getResultArray();
		} else {
			return $this->table('pelamar')
				->join('lowongan', 'lowongan.lowongan_id = pelamar.lowongan_id')
				->where('pelamar.pelamar_id', $id)
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
		return $this->db->table($this->table)->update($data, ['pelamar_id' => $id]);
	}
	public function deleteData($id)
	{
		return $this->db->table($this->table)->delete(['pelamar_id' => $id]);
	}
}
