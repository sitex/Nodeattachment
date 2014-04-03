<?php

class NodeattachmentFixture extends CroogoTestFixture {

	public $name = 'Nodeattachment';


	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'lenght' => 8, 'key' => 'primary'),
		'node_id' => array('type' => 'integer', 'null' => false, 'lenght' => 8),
		'slug' => array('type' => 'string', 'null' => false, 'lenth' => 250),
		'path' => array('type' => 'string', 'null' => false, 'default' => NULL),
		'mime_type' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 100),
		'type' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100),
		'title' => array('type' => 'string', 'null' => false, 'lenth' => 200),
		'description' => array('type' => 'text', 'null' => true),
		'licence' => array('type' => 'string', 'null' => true, 'lenth' => 200),
		'author' => array('type' => 'string', 'null' => true, 'lenth' => 200),
		'author_url' => array('type' => 'string', 'null' => true, 'lenth' => 200),
		'priority' => array('type' => 'integer', 'lenght' => 3, 'null' => true, 'default' => 1),
		'status' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'updated' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'InnoDB')
	);

	public $records = array(
		array(
			'id' => 1,
			'node_id' => 1,
			'slug' => 'hello',
			'path' => '/uploads/file.jpg',
			'mime_type' => 'mime',
			'type' => 'image',
			'title' => 'hello',
			'description' => '',
			'licence' => '',
			'author' => '',
			'author_url' => '',
			'priority' => 1,
			'status' => 0,
			'updated' => '2009-12-25 11:00:00',
			'created' => '2009-12-25 11:00:00'
		),
		array(
			'id' => 2,
			'node_id' => 2,
			'slug' => 'bye',
			'path' => '/uploads/file2.jpg',
			'mime_type' => 'mime',
			'type' => 'image',
			'title' => 'bye',
			'description' => '',
			'licence' => '',
			'author' => '',
			'author_url' => '',
			'priority' => 1,
			'status' => 0,
			'updated' => '2009-12-25 11:00:00',
			'created' => '2009-12-25 11:00:00'
		),
	);
}
