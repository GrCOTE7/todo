<?php

return
[
	'paths' => [
		'migrations' => '%%PHINX_CONFIG_DIR%%/db/migrations',
		'seeds'      => '%%PHINX_CONFIG_DIR%%/db/seeds',
	],
	'environments' => [
		'default_migration_table' => 'phinxlog',
		'default_environment'     => 'development',
		'development'             => [
			'adapter' => 'mysql',
			'host'    => APP['database']['host'],
			'name'    => APP['database']['dbname'],
			'user'    => APP['database']['user'],
			'pass'    => APP['database']['password'],
			'port'    => '3306',
			'charset' => 'utf8',
		],
	],
	'version_order' => 'creation',
];