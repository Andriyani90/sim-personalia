<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pelamar extends Migration
{
 public function up()
	{

		$this->forge->addField([
			'pelamar_id'          	=> [
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
            'agama'					=> [
				'type'				=> 'VARCHAR',
				'constraint'        => '50'
			],
            'alamat'      		  	=> [
				'type'           	=> 'VARCHAR',
				'constraint'     	=> '50'
			],
			'pendidikan_terakhir'   => [
				'type'           	=> 'enum',
                'constraint'		=> "'SMK','SMA','SARJANA','MAGISTER'"
            ],
            'pengalaman'      		=> [
				'type'           	=> 'VARCHAR',
				'constraint'     	=> '50'
            ],
			'ijazah'				    => [
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
			'status'				=> [
				'type'           	=> 'enum',
				'constraint'		=> "'Daftar', 'Proses', 'Terima','reject','Tolak'"
			],
			'deskripsi'				=> [
				'type'           	=> 'VARCHAR',
				'constraint'     	=> '50'
			],
			'lowongan_id'			=> [
				'type'				=> 'INT',
				'constraint'		=> 11,
				'unsigned'			=> TRUE,
				'null'				=> TRUE
			],
			
		]);
		//primary key
		$this->forge->addKey('pelamar_id', TRUE);
		$this->forge->addForeignKey('lowongan_id', 'lowongan', 'lowongan_id', 'cascade', 'cascade');
		$this->forge->createTable('pelamar', TRUE);
	}

	public function down()
	{
		$this->forge->dropTable('pelamar');
	}
}
