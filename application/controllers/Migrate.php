<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migrate extends CI_Controller {
    public function index($version = null)
    {
        $this->load->library('migration');

        if ($version !== null) {
            if ($this->migration->version($version) === FALSE) {
                show_error($this->migration->error_string());
            } else {
                echo "Migrated to version $version";
            }
        } else {
            if ($this->migration->latest() === FALSE) {
                show_error($this->migration->error_string());
            } else {
                echo "Migrated to the latest version";
            }
        }
    }
}
