<?php

namespace App\Models;

use CodeIgniter\Model;

class DashboardModel extends Model
{
	protected $table = 'users';

	public function getCountKaryawan()
	{
		return $this->db->table("karyawan")->countAll();
	}

	public function getCountUser()
	{
		return $this->db->table("users")->countAll();
	}
	

	public function getCountLowongan()
	{
		return $this->db->table("lowongan")->countAll();
	}

	public function getCountPelamar()
	{
		return $this->db->table("pelamar")->countAll();
	}

	public function getCountPenilaian()
	{
		return $this->db->table("penilaian")->countAll();
	}

	public function getCountTalent()
	{
		return $this->db->table("talent")->countAll();
	}

    public function getCountTraining()
	{
		return $this->db->table("training")->countAll();
	}
}
