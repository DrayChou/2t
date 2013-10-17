<?php

return CMap::mergeArray(
	require(dirname(__FILE__).'/main.php'),
	array(
		'components'=>array(
			'fixture'=>array(
				'class'=>'system.test.CDbFixtureManager',
			),
			'mongodb' => array(
				'class'            => 'EMongoDB',
				'connectionString' => 'mongodb://localhost',
				'dbName'           => '2t',
				'fsyncFlag'        => true,
				'safeFlag'         => true,
				'useCursor'        => false
			),
			// 'db'=>array(
			// 	'connectionString'=>'sqlite:'.dirname(__FILE__).'/../data/blog-test.db',
			// ),
			// uncomment the following to use a MySQL database
			/*
			'db'=>array(
				'connectionString' => 'mysql:host=localhost;dbname=blog-test',
				'emulatePrepare' => true,
				'username' => 'root',
				'password' => '',
				'charset' => 'utf8',
			),
			*/
		),
	)
);
