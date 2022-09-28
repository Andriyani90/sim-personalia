<?php

namespace App\Models;

use CodeIgniter\Model;

class Training extends Model
{
    protected $table = 'training';

	public function getData($id = false)
	{
		if ($id === false) {
			return $this->table('training')
				->join('karyawan', 'karyawan.karyawan_id = training.karyawan_id')
				->get()
				->getResultArray();
		} else {
			return $this->table('training')
				->join('karyawan', 'karyawan.karyawan_id = training.karyawan_id')
				->where('training.training_id', $id)
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
		return $this->db->table($this->table)->update($data, ['training_id' => $id]);
	}
	public function deleteData($id)
	{
		return $this->db->table($this->table)->delete(['training_id' => $id]);
	}
}
