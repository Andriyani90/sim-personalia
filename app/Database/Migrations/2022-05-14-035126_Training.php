<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Training extends Migration
{
    public function up()
	{

		$this->forge->addField([
			'training_id'          	=> [
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
			'event'      	        => [
				'type'				=> 'ENUM',
				'constraint'		=> "'Soft Skill','Leadership Coaching','Training bongkar pasang mesin','Comunication Skill'",
			],
			'tanggal_training'      => [
				'type'           	=> 'date',
                ]
           
		]);
		//primary key
		$this->forge->addKey('training_id', TRUE);
        $this->forge->addForeignKey('karyawan_id', 'karyawan', 'karyawan_id', 'cascade', 'cascade');
		$this->forge->createTable('training', TRUE);
	}

	public function down()
	{
		$this->forge->dropTable('training');
	}
}
