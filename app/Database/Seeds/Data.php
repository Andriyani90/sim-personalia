<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Data extends Seeder
{
    public function run()
	{
		$users = [
			[
				'id'		=> 1,
				'nama_user'	=> 'Miya Andriani',
				'username'	=> 'miya002',
				'password'	=> 'miya002',
				'level'		=> 2
			],

			[
				'id'		=> 2,
				'nama_user'	=> 'Lia',
				'username'	=> 'lia002',
				'password'	=> 'lia002',
				'level'		=> 2
			],

			[
				'id'		=> 3,
				'nama_user'	=> 'Daryono',
				'username'	=> 'daryono001',
				'password'	=> 'daryono001',
				'level'		=> 1
			],

			[
				'id'		=> 4,
				'nama_user'	=> 'Bambang',
				'username'	=> 'bambang001',
				'password'	=> 'bambang001',
				'level'		=> 1
			]
		];

		$this->db->table('users')->insertBatch($users);

	}
}
