<?php namespace Config;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var array
	 */
	public $ruleSets = [
		\CodeIgniter\Validation\Rules::class,
		\CodeIgniter\Validation\FormatRules::class,
		\CodeIgniter\Validation\FileRules::class,
		\CodeIgniter\Validation\CreditCardRules::class,
		\App\Validation\LoginRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array
	 */
	

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------

	public $registro = [
		'nombre' => [
				'label' => 'Nombre',
				'rules' => 'required'
			],
			'correo' => [
				'label' => 'Correo',
				'rules' => 'required|valid_email|is_unique[ci_users.correo]'
			],
			'contrasena' => [
				'label' => 'Contraseña',
				'rules' => 'required|min_length[8]'
			],
			'contrasena2' => [
				'label' => 'Confirmar Contraseña',
				'rules' => 'required|matches[contrasena]'				
			]
	];

	public $registro_errors = [
		'nombre' => [
			'required' => 'El campo {field} no puede ir vacio.'
		],
		'correo' => [
			'required' => 'El campo {field} no puede ir vacio.',
			'valid_email'=> 'Debe ingresar un correo valido',
			'is_unique' => 'El correo ya fue registrado.'
		],
		'contrasena' => [			
			'required' => 'El campo {field} no puede ir vacio.',
			'min_length' => 'La contraseña debe ser mayor de 8 caracteres.'
		],
		'contrasena2' => [
			'required' => 'El campo {field} no puede ir vacio.',
			'matches' => 'Las contraseñas deben ser iguales.'
		]
	]; 


	public $login = [
		'correo' => [
				'label' => 'Correo',
				'rules' => 'required'
			],
			'contrasena' => [
				'label' => 'Contraseña',
				'rules' => 'required|authUser[correo,contrasena]'
			]
	];

	public $login_errors = [
		'correo' => [
			'required' => 'El campo {field} no puede ir vacio.'
		],
		'contrasena' => [			
			'required' => 'El campo {field} no puede ir vacio.',
			'authUser' => 'Usuario y/o Contraseña incorrectos.'
		]
	];

	public $items = [
		'title' => [
			'label' => 'Producto',
			'rules' => 'required'			
		],
		'price' => [
			'label' => 'Precio',
			'rules' => 'required'			
		],
		'description' => [
			'label' => 'Descripcion',
			'rules' => 'required'			
		],
		'imagen' => [
			'label' => 'Imagen',
			'rules' => 'required'			
		],
		'brand' => [
			'label' => 'Marca',
			'rules' => 'required|is_natural_no_zero'			
		],
		'category' => [
			'label' => 'Categoria',
			'rules' => 'required|is_natural_no_zero'			
		],
		'tags' => [
			'label' => 'Tags',
			'rules' => 'required'			
		]
	];

	public $items_errors = [
		'title' => [
			'required' => 'El campo {field} no puede ir vacio.'
		],
		'price' => [
			'required' => 'El campo {field} no puede ir vacio.'
		],
		'description' => [
			'required' => 'El campo {field} no puede ir vacio.'
		],
		'imagen' => [
			'required' => 'Debe seleccionar una imagen.'
		],
		'brand' => [
			'required' => 'Debe seleccionar una Marca.',
			'is_natural_no_zero' => 'Debe seleccionar una {field}.'
		],
		'category' => [
			'required' => 'Debe seleccionar una Categoria.',
			'is_natural_no_zero' => 'Debe seleccionar una {field}.'
		],
		'tags' => [
			'required' => 'El campo {field} no puede ir vacio.'
		]

	];

	public $brand = [
		'brand' => [
			'label' => 'Marca',
			'rules' => 'required'			
		]
	];

	public $brand_errors = [
		'brand' => [
			'required' => 'El campo {field} no puede ir vacio.'
		]
	]; 

	public $category = [
		'category' => [
			'label' => 'Producto',
			'rules' => 'required'			
		]
	];

	public $category_errors = [
		'category' => [
			'required' => 'El campo {field} no puede ir vacio.'
		]
	];  
}
