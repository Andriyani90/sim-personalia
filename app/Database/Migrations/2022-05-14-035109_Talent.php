<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Talent extends Migration
{
    public function up()
	{

		$this->forge->addField([
			'talent_id'          	=> [
				'type'           	=> 'INT',
				'constraint'     	=> 11,
				'unsigned'       	=> TRUE,
				'auto_increment' 	=> TRUE
			],
			'nama'      	        => [
				'type'           	=> 'VARCHAR',
				'constraint'     	=> '50',
			],
            'tanggal_lahir'			=> [
				'type'				=> 'DATE',
			],
            'alamat'      		  	=> [
				'type'           	=> 'VARCHAR',
				'constraint'     	=> '50'
			],
            'salary'      		  	=> [
				'type'           	=> 'VARCHAR',
				'constraint'     	=> '50'
			],
            'role'				    => [
				'type'           	=> 'enum',
                'constraint'		=> "'Enggineer','Quality Control','Sales'"
			],
			'pendidikan_terakhir'   => [
				'type'           	=> 'enum',
                'constraint'		=> "'SMK','SMA','SARJANA','MAGISTER'"

            ],
            'pengalaman'      		=> [
				'type'           	=> 'VARCHAR',
				'constraint'     	=> '50'
            ],
			'ijazah'				=> [
				'type'           	=> 'VARCHAR',
				'constraint'     	=> '250'
			],
			'ktp'				    => [
				'type'           	=> 'VARCHAR',
				'constraint'     	=> '250'
			],
			'kk'				    => [
				'type'           	=> 'VARCHAR',
				'constraint'     	=> '250'
			],
			'lowongan_id'			=> [
				'type'				=> 'INT',
				'constraint'		=> 11,
				'unsigned'			=> TRUE,
				'null'				=> TRUE
			],
			
		]);
		//primary key
		$this->forge->addKey('talent_id', TRUE);
		$this->forge->addForeignKey('lowongan_id', 'lowongan', 'lowongan_id', 'cascade', 'cascade');
		$this->forge->createTable('talent', TRUE);
	}

	public function down()
	{
		$this->forge->dropTable('talent');
	}
}
