<?php
class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Project_model');
        $this->load->model('Project_group_model'); // optional
        $this->load->helper(['form', 'url']);
        $this->load->library('form_validation');
    }

    public function index()
    {
        if (!$this->session->userdata('user_id')) {
            redirect('auth/login');
        }

        // Get counts
        $data['project_count'] = $this->Project_model->get_all_count();

        // Example: if you want active project count
        // $data['active_projects'] = $this->Project_model->count_by_status('active');

        // Pass to view
        $this->load->view('dashboard', $data);
    }
}
