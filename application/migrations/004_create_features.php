<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_features extends CI_Migration {

    public function up() {
        $this->dbforge->add_field([
            'id' => ['type' => 'INT','auto_increment' => TRUE,'unsigned' => TRUE],
            'project_id' => ['type' => 'INT','unsigned' => TRUE],
            'name' => ['type' => 'VARCHAR','constraint' => 100],
            'description' => ['type' => 'TEXT','null' => TRUE],
			'status' => ["type" => "ENUM('planning','active','on_hold','completed','cancelled')", "default" => 'active'],
			'order'=>['type' => 'INT','unsigned' => TRUE, 'null' => TRUE],
			'priority'=>['type'=> 'INT', 'constraint'=>1, 'default'=>0],
            'created_at' => [
				'type' => 'DATETIME',
				'null' => FALSE,
			],
        ]);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->add_field('CONSTRAINT FOREIGN KEY (project_id) REFERENCES projects(id) ON DELETE CASCADE');
        $this->dbforge->create_table('features');
    }

    public function down() {
        $this->dbforge->drop_table('features');
    }
}
