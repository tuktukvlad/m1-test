<?php 

$config = [
	'title' => 'Тестовое задание M1',
	'router' => [
		'rules' => [
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