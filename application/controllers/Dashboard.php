<?php
class Dashboard extends CI_Controller {
    public function index() {
        if (!$this->session->userdata('user_id')) {
            redirect('auth/login');
        }

        $this->load->view('dashboard');
    }
}
