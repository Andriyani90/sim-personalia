<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Penilaian extends Migration
{
    public function up()
	{

		$this->forge->addField([
			'penilaian_id'          	=> [
				'type'           	=> 'INT',
				'constraint'     	=> 11,
				'unsigned'       	=> TRUE,
				'auto_increment' 	=> TRUE
			],
            'karyawan_id'			=> [
				'type'				=> 'INT',
				'constraint'		=> 11,
				'unsigned'			=> TRUE,
				'null'				=> TRUE
			],
			'penilaian_atas'      	=> [
				'type'				=> 'enum',
                'constraint'		=> "'Pencapaian Target','Performance Pekerjaan','Lain Lain'"
            ],
			'nilai'      	=> [
				'type'				=> 'VARCHAR',
                'constraint'        => '50'
            ],
			'periode'      => [
				'type'           	=> 'date',
                ]
           
		]);
		//primary key
		$this->forge->addKey('penilaian_id', TRUE);
        $this->forge->addForeignKey('karyawan_id', 'karyawan', 'karyawan_id', 'cascade', 'cascade');
		$this->forge->createTable('penilaian', TRUE);
	}

	public function down()
	{
		$this->forge->dropTable('penilaian');
	}
}
