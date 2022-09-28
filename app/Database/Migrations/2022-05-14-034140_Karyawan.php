<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Karyawan extends Migration
{
    public function up()
	{

		$this->forge->addField([
			'karyawan_id'          	=> [
				'type'           	=> 'INT',
				'constraint'     	=> 11,
				'unsigned'       	=> TRUE,
				'auto_increment' 	=> TRUE
			],
			'nama'      	        => [
				'type'           	=> 'VARCHAR',
				'constraint'     	=> '50',
			],
			'nik'      		  	    => [
				'type'           	=> 'VARCHAR',
				'constraint'     	=> '50'
            ],
            'telephone'      		=> [
				'type'           	=> 'VARCHAR',
				'constraint'     	=> '50'
            ],
			'alamat'      		  	=> [
				'type'           	=> 'VARCHAR',
				'constraint'     	=> '50'
			],
			'tanggal_lahir'			=> [
				'type'           	=>	'DATE',
			],
            'tanggal_masuk'			=> [
				'type'				=> 'DATE',
			],
			'ijazah'				    => [
				'type'           	=> 'VARCHAR',
				'constraint'     	=> '255'
			],
			'ktp'				    => [
				'type'           	=> 'VARCHAR',
				'constraint'     	=> '255'
			],
			'perjanjian_kerja'		=> [
				'type'           	=> 'VARCHAR',
				'constraint'     	=> '255'
			],
			'jabatan'				=> [
				'type'				=> 'ENUM',
				'constraint'		=> "'Manager','HRD' ,'Staff Operator', 'Operator','Accounting'",
			],
			'status'				=> [
				'type'				=> 'ENUM',
				'constraint'		=> "'KONTRAK','TETAP'",
			],
			
		]);
		//primary key
		$this->forge->addKey('karyawan_id', TRUE);
		$this->forge->createTable('karyawan', TRUE);
	}

	public function down()
	{
		$this->forge->dropTable('karyawan');
	}
}
