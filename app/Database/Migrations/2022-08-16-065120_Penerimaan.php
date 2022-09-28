<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Penerimaan extends Migration
{
  
 public function up()
 {

     $this->forge->addField([
         'penerimaan_id'          	=> [
             'type'           	=> 'INT',
             'constraint'     	=> 11,
             'unsigned'       	=> TRUE,
             'auto_increment' 	=> TRUE
         ],
         'pelamar_id'			=> [
            'type'				=> 'INT',
            'constraint'		=> 11,
            'unsigned'			=> TRUE,
            'null'				=> TRUE
        ],
        'tanggal_interview'     => [
            'type'           	=> 'VARCHAR',
            'constraint'     	=> '50'
        ],        
         'start_kontrak'        => [
             'type'           	=> 'VARCHAR',
             'constraint'     	=> '50',
         ],
         'end_kontrak'			=> [
             'type'				=> 'DATE',
         ],
         'status'				=> [
             'type'           	=> 'enum',
             'constraint'		=> "'Daftar','Proses', 'Terima','Reject','Tolak'"
         ],
         'deskripsi'				=> [
             'type'           	=> 'VARCHAR',
             'constraint'     	=> '50'
         ],
     ]);
     //primary key
     $this->forge->addKey('penerimaan_id', TRUE);
     $this->forge->addForeignKey('pelamar_id', 'pelamar', 'pelamar_id', 'cascade', 'cascade');
     $this->forge->createTable('penerimaan', TRUE);
 }

 public function down()
 {
     $this->forge->dropTable('penerimaan');
 }
}
