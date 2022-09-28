<?php

namespace App\Models;

use CodeIgniter\Model;

class Karyawan extends Model
{
    protected $table = 'karyawan';
	
	public function getData($id = false)
	{
		if ($id === false) {
			return $this->table('karyawan')
				->get()
				->getResultArray();
		} else {
			return $this->table('karyawan')
				->where('karyawan.karyawan_id', $id)
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
			return $this->db->table($this->table)->update($data, ['karyawan_id' => $id]);
		}
	
		public function deleteData($id)
		{
			return $this->db->table($this->table)->delete(['karyawan_id' => $id]);
		}
}
