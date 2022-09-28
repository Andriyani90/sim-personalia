<?php

namespace App\Models;

use CodeIgniter\Model;

class Lowongan extends Model
{

	protected $table = 'lowongan';

	public function getData($id = false)
	{
		if ($id === false) {
			return $this->table('lowongan')
				->get()
				->getResultArray();
		} else {
			return $this->table('lowongan')
				->where('lowongan.lowongan_id', $id)
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
		return $this->db->table($this->table)->update($data, ['lowongan_id' => $id]);
	}

	public function deleteData($id)
	{
		return $this->db->table($this->table)->delete(['lowongan_id' => $id]);
	}
}
