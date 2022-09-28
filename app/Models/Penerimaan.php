<?php

namespace App\Models;

use CodeIgniter\Model;

class Penerimaan extends Model
{
    protected $table = 'penerimaan';

	public function getData($id = false)
	{
		if ($id === false) {
			return $this->table('penerimaan')
				->join('pelamar', 'pelamar.pelamar_id = penerimaan.pelamar_id')
				->get()
				->getResultArray();
		} else {
			return $this->table('penerimaan')
				->join('pelamar', 'pelamar.pelamar_id = penerimaan.pelamar_id')
				->where('penerimaan.penerimaan_id', $id)
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
		return $this->db->table($this->table)->update($data, ['penerimaan_id' => $id]);
	}
	public function deleteData($id)
	{
		return $this->db->table($this->table)->delete(['penerimaan_id' => $id]);
	}
}
