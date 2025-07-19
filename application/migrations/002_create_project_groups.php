<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_project_groups extends CI_Migration {

    public function up() {
        $this->dbforge->add_field([
            'id' => ['type' => 'INT','auto_increment' => TRUE,'unsigned' => TRUE],
            'name' => ['type' => 'VARCHAR','constraint' => 100],
            'description' => ['type' => 'TEXT','null' => TRUE],
            'created_at' => [
				'type' => 'DATETIME',
				'null' => FALSE,
			],

        ]);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('project_groups');
    }

    public function down() {
        $this->dbforge->drop_table('project_groups');
    }
}
