<?php

namespace App\Models;

use CodeIgniter\Model;

class Talent extends Model
{
    protected $table = 'talent';

	public function getData($id = false)
	{
		if ($id === false) {
			return $this->table('talent')
				->join('lowongan', 'lowongan.lowongan_id = talent.lowongan_id')
				->get()
				->getResultArray();
		} else {
			return $this->table('talent')
				->join('lowongan', 'lowongan.lowongan_id = talent.lowongan_id')
				->where('talent.talent_id', $id)
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
		return $this->db->table($this->table)->update($data, ['talent_id' => $id]);
	}
	public function deleteData($id)
	{
		return $this->db->table($this->table)->delete(['talent_id' => $id]);
	}
}
