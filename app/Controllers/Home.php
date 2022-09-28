<?php

namespace App\Controllers;

use App\Models\DashboardModel;

class Home extends BaseController
{
 
	public function __construct(){
		$this->dashboard_model = new DashboardModel();
	}	

	public function frontend(){
		return view('frontend');
	}


	public function login(){
		return view('login');
	}

	public function index(){

	$data['total_karyawan']       = $this->dashboard_model->getCountKaryawan();
	$data['total_users']    	  = $this->dashboard_model->getCountUser();
	$data['total_lowongan']  	  = $this->dashboard_model->getCountLowongan();
	$data['total_pelamar']        = $this->dashboard_model->getCountPelamar();
	$data['total_penilaian']      = $this->dashboard_model->getCountPenilaian();
	$data['total_talent']         = $this->dashboard_model->getCountTalent();
	$data['total_training']	 	  = $this->dashboard_model->getCountTraining();


	return view('index',  $data);

	}
}
