<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation
{
    //--------------------------------------------------------------------
    // Setup
    //--------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    //--------------------------------------------------------------------
    // Rules
    //--------------------------------------------------------------------

	
// data karyawan 
public $penerimaan = [
	
	'pelamar_id'   				=> 'required',
	'tanggal_interview'   		=> 'required',
	'start_kontrak'   			=> 'required',
	'end_kontrak'   			=> 'required',
	'status'   					=> 'required',
	'deskripsi'   				=> 'required',


];

public $penerimaan_errors = [
	'pelamar_id'   				=>  [
		'required'				=> 'Nama   Wajib DiInputkan,  Tidak Boleh Kosong!'
	],
	'tanggal_interview'   		=>  [
		'required'				=> 'Tanggal Interview Wajib DiInputkan,  Tidak Boleh Kosong!'
	],
	'start_kontrak'   			=>  [
		'required'				=> 'Start Kontrak  Wajib DiInputkan,  Tidak Boleh Kosong!'
	],
	'end_kontrak'   			=>  [
		'required'				=> 'End Kontrak Wajib DiInputkan,  Tidak Boleh Kosong!'
	],
	'status'  				 	=>  [
		'required'				=> 'Status Wajib DiInputkan,  Tidak Boleh Kosong!'
	],
	'deskripsi'   				=>  [
		'required'				=> 'Deskripsi Wajib DiInputkan,  Tidak Boleh Kosong!'
	],


];


// data karyawan 
public $karyawan = [
	
	'nama'   				=> 'required',
	'nik'   				=> 'required',
	'telephone'   			=> 'required',
	'alamat'   				=> 'required',
	'tanggal_lahir'   		=> 'required',
	'tanggal_masuk'   		=> 'required',
	'ijazah'   				=> 'required',
	'ktp'   				=> 'required',
	'perjanjian_kerja'   	=> 'required',
	'jabatan'   			=> 'required',
	'status'   				=> 'required',


];

public $karyawan_errors = [
	'nama'   			=>  [
		'required'		=> 'Nama Kayawan  Wajib DiInputkan,  Tidak Boleh Kosong!'
	],
	'nik'   			=>  [
		'required'		=> 'Nomer Ktp Wajib DiInputkan,  Tidak Boleh Kosong!'
	],
	'telephone'   		=>  [
		'required'		=> 'Nomer Telephone  Wajib DiInputkan,  Tidak Boleh Kosong!'
	],
	'alamat'   			=>  [
		'required'		=> 'Alamat Wajib DiInputkan,  Tidak Boleh Kosong!'
	],
	'ijazah'   			=>  [
		'required'		=> 'Ijazah Wajib DiInputkan,  Tidak Boleh Kosong!'
	],
	'ktp'   			=>  [
		'required'		=> 'Ktp Wajib DiInputkan,  Tidak Boleh Kosong!'
	],
	'perjanjian_kerja'  =>  [
		'required'		=> 'Perjanjian Kerja Wajib DiInputkan,  Tidak Boleh Kosong!'
	],
	'tanggal_lahir'		=> [
		'required'		=> 'Tanggal Lahir Wajib DiInputkan,  Tidak Boleh Kosong!'
	],
	'tanggal_masuk'   	=>  [
		'required'		=> 'Tanggal Masuk Wajib DiInputkan,  Tidak Boleh Kosong!'
	],
	'jabatan'   		=>  [
		'required'		=> 'Jabatan Pekerjaan Wajib DiInputkan,  Tidak Boleh Kosong!'
	],
	'status'   			=>  [
		'required'		=> 'Status Pekerjaan Wajib DiInputkan,  Tidak Boleh Kosong!'
	],

];

// data lowongan

public $lowongan = [
		
	'nama_lowongan'   				=> 'required',
	'tanggal_input'   				=> 'required',


];

public $lowongan_errors = [
	'nama_lowongan'   	=>  [
		'required'		=> 'Nama Lowongan  Wajib DiInputkan,  Tidak Boleh Kosong!'
	],
	'tanggal_input'   			=>  [
		'required'		=> 'Tanggal Terdata  Wajib DiInputkan,  Tidak Boleh Kosong!'
	],
];


// data pelamar 
public $pelamar = [
	
	'nama'   				=> 'required',
	'tanggal_lahir'   		=> 'required',
	'agama'   				=> 'required',
	'alamat'   				=> 'required',
	'pendidikan_terakhir'  	=> 'required',
	'pengalaman'   			=> 'required',
	'status'				=> 'required',
	'deskripsi'				=> 'required',
	'lowongan_id'   		=> 'required',


];

public $pelamar_errors = [
	'nama'   =>  [
		'required'		=> 'Nama Pelamar Wajib DiInputkan,  Tidak Boleh Kosong!'
	],
	'tanggal_lahir'   	=>  [
		'required'		=> 'Tanggal Lahir Wajib DiInputkan,  Tidak Boleh Kosong!'
	],
	'alamat'   =>  [
		'required'		=> 'Alamat Wajib DiInputkan,  Tidak Boleh Kosong!'
	],
	'agama' => [
		'required'		=> 'Agama Wajib DiInputkan,  Tidak Boleh Kosong!'
	],
	'pendidikan_terakhir'   =>  [
		'required'		=> 'Pendidikan Terakhir Wajib DiInputkan,  Tidak Boleh Kosong!'
	],
	'pengalaman'   =>  [
		'required'		=> 'Pengalaman Wajib DiInputkan,  Tidak Boleh Kosong!'
	],
	'ijazah'   =>  [
		'required'		=> 'Ijazah Wajib DiInputkan,  Tidak Boleh Kosong!'
	],
	'ktp'   =>  [
		'required'		=> 'Ktp Wajib DiInputkan,  Tidak Boleh Kosong!'
	],
	'kk'   =>  [
		'required'		=> 'KK Wajib DiInputkan,  Tidak Boleh Kosong!'
	],
	'lowongan_id'   =>  [
		'required'		=> 'Nama Lowongan Wajib DiInputkan,  Tidak Boleh Kosong!'
	],
	'status'   =>  [
		'required'		=> 'Status Wajib DiInputkan,  Tidak Boleh Kosong!'
	],
	'deskripsi'   =>  [
		'required'		=> 'Deskripsi Wajib DiInputkan,  Tidak Boleh Kosong!'
	]
];

	// tindakan
	public $penilaian = [
	
		'penilaian_atas'	=> 'required',
		'karyawan_id'   	=> 'required',	
		'nilai'   			=> 'required',	
		'periode'   		=> 'required',	

	];

	public $penilaian_errors = [
		'penilaian_atas'   =>  [
			'required'		=> 'Keterangan harus di isi!,  Tidak Boleh Kosong!'
		],
		'karyawan_id'   	=>  [
			'required'		=> 'Nama Karyawan Harus Di isi,  Tidak Boleh Kosong!'
		],
		'nilai'   	=>  [
			'required'		=> 'Nilai Harus Di isi,  Tidak Boleh Kosong!'
		],
		'periode'   	=>  [
			'required'		=> 'Periode Harus Di isi,  Tidak Boleh Kosong!'
		]
	];

	// tindakan
	public $training = [
	
		'event'				=> 'required',
		'karyawan_id'   	=> 'required',	
		'tanggal_training'  => 'required',	

	];

	public $training_errors = [
		'event'   =>  [
			'required'		=> 'Event harus di isi!,  Tidak Boleh Kosong!'
		],
		'karyawan_id'   	=>  [
			'required'		=> 'Nama Karyawan Harus Di isi,  Tidak Boleh Kosong!'
		],
		'tanggal_training'   	=>  [
			'required'		=> 'Tanggal Training Harus Di isi,  Tidak Boleh Kosong!'
		]
	];

	// talent
	public $talent = [
	
		'nama'   				=> 'required',
		'tanggal_lahir'   		=> 'required',
		'alamat'   				=> 'required',
		'salary'   				=> 'required',
		'role'   				=> 'required',
		'pendidikan_terakhir'   => 'required',
		'pengalaman'   			=> 'required',
		'ijazah'   				=> 'required',
		'ktp'   				=> 'required',
		'kk'   					=> 'required',
		'lowongan_id'   		=> 'required',

	];

	public $talent_errors = [
		'nama'   =>  [
			'required'		=> 'Nama Pelamar Wajib DiInputkan,  Tidak Boleh Kosong!'
		],
		'tanggal_lahir'   	=>  [
			'required'		=> 'Tanggal Lahir Wajib DiInputkan,  Tidak Boleh Kosong!'
		],
		'alamat'   =>  [
			'required'		=> 'Alamat Wajib DiInputkan,  Tidak Boleh Kosong!'
		],
		'salary'   =>  [
			'required'		=> 'Salary Wajib DiInputkan,  Tidak Boleh Kosong!'
		],
		'role'   =>  [
			'required'		=> 'Role Wajib DiInputkan,  Tidak Boleh Kosong!'
		],
		'pendidikan_terakhir'   =>  [
			'required'		=> 'Pendidikan Terakhir Wajib DiInputkan,  Tidak Boleh Kosong!'
		],
		'pengalaman'   =>  [
			'required'		=> 'Pengalaman Wajib DiInputkan,  Tidak Boleh Kosong!'
		],
		'ijazah'   =>  [
			'required'		=> 'Ijazah Wajib DiInputkan,  Tidak Boleh Kosong!'
		],
		'ktp'   =>  [
			'required'		=> 'Ktp Wajib DiInputkan,  Tidak Boleh Kosong!'
		],
		'kk'   =>  [
			'required'		=> 'KK Wajib DiInputkan,  Tidak Boleh Kosong!'
		],
		'lowongan_id'   =>  [
			'required'		=> 'Nama Lowongan Wajib DiInputkan,  Tidak Boleh Kosong!'
		]
	];


	// data users 

	public $users = [
		
		'nama_user'   			=> 'required',
		'username'   			=> 'required',
		'password'   			=> 'required',
		'level'   				=> 'required',



	];

	public $users_errors = [
		'nama_user'   =>  [
			'required'		=> 'Nama  Wajib DiInputkan,  Tidak Boleh Kosong!'
		],
		'username'   	=>  [
			'required'		=> 'Username  Wajib DiInputkan,  Tidak Boleh Kosong!'
		],
		'password'   	=>  [
			'required'		=> 'Password  Wajib DiInputkan,  Tidak Boleh Kosong!'
		],
		'level'   		=>  [
			'required'		=> 'Level user Wajib DiInputkan,  Tidak Boleh Kosong!'
		]

	];
	
}
