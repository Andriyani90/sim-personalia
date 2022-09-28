<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Lowongan extends Migration
{
    public function up()
	{
		$this->forge->addField([
			'lowongan_id'         => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => TRUE,
				'auto_increment' => TRUE
			],
			'nama_lowongan'          => [
				'type'           => 'VARCHAR',
				'constraint'     => '50',
			],
            'tanggal_input'        => [
                'type'           => 'date'
            ]
		
		]);
		$this->forge->addKey('lowongan_id', TRUE);
		$this->forge->createTable('lowongan', TRUE);
	}

	public function down()
	{
		$this->forge->dropTable('lowongan');
	}
}
