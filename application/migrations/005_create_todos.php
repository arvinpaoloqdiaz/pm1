<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_todos extends CI_Migration {

    public function up() {
        $this->dbforge->add_field([
            'id' => ['type' => 'INT','auto_increment' => TRUE,'unsigned' => TRUE],
            'feature_id' => ['type' => 'INT','unsigned' => TRUE],
            'title' => ['type' => 'VARCHAR','constraint' => 150],
            'description' => ['type' => 'TEXT','null' => TRUE],
            'status' => ["type" => "ENUM('todo','in_progress','done')", "default" => 'todo'],
            'priority' => ["type" => "ENUM('low','medium','high')", "default" => 'medium'],
            'due_date' => ['type' => 'DATE','null' => TRUE],
            'created_at' => [
				'type' => 'DATETIME',
				'null' => FALSE,
			],
			'updated_at' => [
				'type' => 'DATETIME',
				'null' => FALSE,
			],
        ]);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->add_field('CONSTRAINT FOREIGN KEY (feature_id) REFERENCES features(id) ON DELETE CASCADE');
        $this->dbforge->create_table('todos');
    }

    public function down() {
        $this->dbforge->drop_table('todos');
    }
}
