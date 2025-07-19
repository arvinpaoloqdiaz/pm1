<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Project_model');
        $this->load->model('Project_group_model'); // optional, if you want group names
        $this->load->helper(['form', 'url']);
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['projects'] = $this->Project_model->get_all();
        $this->load->view('projects/index', $data);
    }

    public function view($id)
    {
        $project = $this->Project_model->get($id);

        if (!$project) {
            show_404();
        }

        $data['project'] = $project;
        $this->load->view('projects/view', $data);
    }

    public function add()
    {
        $this->form_validation->set_rules('group_id', 'Group', 'required');
        $this->form_validation->set_rules('name', 'Project Name', 'required');
        $this->form_validation->set_rules('nature', 'Nature', 'required');

        if ($this->form_validation->run() === FALSE) {
            $data['groups'] = $this->Project_group_model->get_all();
            $this->load->view('projects/create', $data);
        } else {
            $projectData = [
                'group_id'     => $this->input->post('group_id'),
                'name'         => $this->input->post('name'),
                'description'  => $this->input->post('description'),
                'nature'       => $this->input->post('nature'),
                'repo_link'    => $this->input->post('repo_link'),
                'deploy_link'  => $this->input->post('deploy_link'),
            ];

            $this->Project_model->create($projectData);
            redirect('project');
        }
    }

    public function edit($id)
    {
        $project = $this->Project_model->get($id);
        if (!$project) show_404();

        $this->form_validation->set_rules('name', 'Project Name', 'required');
        $this->form_validation->set_rules('nature', 'Nature', 'required');

        if ($this->form_validation->run() === FALSE) {
            $data['project'] = $project;
            $data['groups'] = $this->Project_group_model->get_all();
            $this->load->view('projects/edit', $data);
        } else {
            $updated = [
                'group_id'     => $this->input->post('group_id'),
                'name'         => $this->input->post('name'),
                'description'  => $this->input->post('description'),
                'nature'       => $this->input->post('nature'),
                'repo_link'    => $this->input->post('repo_link'),
                'deploy_link'  => $this->input->post('deploy_link'),
            ];

            $this->Project_model->update($id, $updated);
            redirect('project');
        }
    }

    public function delete($id)
    {
        $project = $this->Project_model->get($id);
        if (!$project) show_404();

        $this->Project_model->delete($id);
        redirect('project');
    }
}
