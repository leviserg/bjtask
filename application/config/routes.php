<?php
	return [
		'' => [
			'controller' => 'main',
			'action' => 'index',
		],
		'main/index' => [
			'controller' => 'main',
			'action' => 'index',
			'page' => 'index'
		],
		'main/index/{page:\d+}' => [
			'controller' => 'main',
			'action' => 'index'
		],
		'task/add' => [
			'controller' => 'main',
			'action' => 'add'
		],
		'task/{id:\d+}' => [
			'controller' => 'main',
			'action' => 'gettask',
		],
		'task/edit/{id:\d+}' => [
			'controller' => 'main',
			'action' => 'edit'
		],
		'task/delete/{id:\d+}' => [
			'controller' => 'main',
			'action' => 'delete'
		],
		'main/datedesc' => [
			'controller' => 'main',
			'action' => 'datedesc'
		],
		'main/dateasc' => [
			'controller' => 'main',
			'action' => 'dateasc'
		],
		'main/datedesc/{page:\d+}' => [
			'controller' => 'main',
			'action' => 'datedesc'
		],
		'main/dateasc/{page:\d+}' => [
			'controller' => 'main',
			'action' => 'dateasc'
		],
		'main/namedesc' => [
			'controller' => 'main',
			'action' => 'namedesc'
		],
		'main/nameasc' => [
			'controller' => 'main',
			'action' => 'nameasc'
		],
		'main/namedesc/{page:\d+}' => [
			'controller' => 'main',
			'action' => 'namedesc'
		],
		'main/nameasc/{page:\d+}' => [
			'controller' => 'main',
			'action' => 'nameasc'
		],
		'main/emaildesc' => [
			'controller' => 'main',
			'action' => 'emaildesc'
		],
		'main/emailasc' => [
			'controller' => 'main',
			'action' => 'emailasc'
		],
		'main/emaildesc/{page:\d+}' => [
			'controller' => 'main',
			'action' => 'emaildesc'
		],
		'main/emailasc/{page:\d+}' => [
			'controller' => 'main',
			'action' => 'emailasc'
		],
		'main/stsdesc' => [
			'controller' => 'main',
			'action' => 'stsdesc'
		],
		'main/stsasc' => [
			'controller' => 'main',
			'action' => 'stsasc'
		],
		'main/stsdesc/{page:\d+}' => [
			'controller' => 'main',
			'action' => 'stsdesc'
		],
		'main/stsasc/{page:\d+}' => [
			'controller' => 'main',
			'action' => 'stsasc'
		],
		'admin/login' => [
			'controller' => 'admin',
			'action' => 'login'
		],
		'admin/logout' => [
			'controller' => 'admin',
			'action' => 'logout'
		]
	];
?>