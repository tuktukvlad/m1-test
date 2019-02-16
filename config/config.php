<?php 

$config = [
	'title' => 'Тестовое задание M1',
	'router' => [
		'rules' => [
			'audio/update/([0-9]+)' => 'audio/update/$1',
			'audio/delete/([0-9]+)' => 'audio/delete/$1',
			'audio/create' => 'audio/create',
			'audio/([0-9]+)' => 'audio/view/$1',
			'about' => 'main/about',
			'' => 'main/index',
		]
	],
	'db' => [
		'host' => 'localhost',
		'dbname' => 'm1-test',
		'user' => 'root',
		'password' => '',
	]
];


?>