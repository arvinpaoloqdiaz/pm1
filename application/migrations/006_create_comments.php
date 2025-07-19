<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_comments extends CI_Migration {

    public function up() {
        $this->dbforge->add_field([
            'id' => ['type' => 'INT','auto_increment' => TRUE,'unsigned' => TRUE],
            'todo_id' => ['type' => 'INT','unsigned' => TRUE],
            'message' => ['type' => 'TEXT'],
            'created_at' => [
				'type' => 'DATETIME',
				'null' => FALSE,
			],
        ]);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->add_field('CONSTRAINT FOREIGN KEY (todo_id) REFERENCES todos(id) ON DELETE CASCADE');
        $this->dbforge->create_table('comments');
    }

    public function down() {
        $this->dbforge->drop_table('comments');
    }
}
