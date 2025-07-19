<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_projects extends CI_Migration {

    public function up() {
        $this->dbforge->add_field([
            'id' => ['type' => 'INT','auto_increment' => TRUE,'unsigned' => TRUE],
            'group_id' => ['type' => 'INT','unsigned' => TRUE, 'null' => TRUE],
            'name' => ['type' => 'VARCHAR','constraint' => 100],
            'description' => ['type' => 'TEXT','null' => TRUE],
            'nature' => ['type' => 'VARCHAR','constraint' => 100,'null' => TRUE],
            'repo_url' => ['type' => 'VARCHAR','constraint' => 255,'null' => TRUE],
			'deployment_type'=>['type' => 'VARCHAR','constraint' => 100],
            'deployment_url' => ['type' => 'VARCHAR','constraint' => 255,'null' => TRUE],
            'status' => ["type" => "ENUM('planning','active','on_hold','completed','cancelled')", "default" => 'active'],
			'order'=>['type' => 'INT','unsigned' => TRUE, 'null' => TRUE],
			'priority'=>['type'=> 'INT', 'constraint'=>1, 'default'=>0],
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
        $this->dbforge->add_field('CONSTRAINT FOREIGN KEY (group_id) REFERENCES project_groups(id) ON DELETE SET NULL');
        $this->dbforge->create_table('projects');
    }

    public function down() {
        $this->dbforge->drop_table('projects');
    }
}
