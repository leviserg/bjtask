<?php
	return [
		'' => [
			'controller' => 'main',
			'action' => 'index',
		],
		'main/index/{column:\w+}/{order:\w+}' => [
			'controller' => 'main',
			'action' => 'index',
			'column' => '{column}',
			'order' => '{order}',
			'page' => 'index'
		],
		'main/index/{column:\w+}/{order:\w+}/{page:\d+}' => [
			'controller' => 'main',
			'action' => 'index',
			'column' => '{column}',
			'order' => '{order}'			
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