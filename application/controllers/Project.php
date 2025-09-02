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

		// Load env variables
        $env = require APPPATH.'config/env.php';

        
    }

    public function index()
    {
        $data['projects'] = $this->Project_model->get_all();
        $this->load->view('projects/index', $data);
    }

 public function view($id = null)
{
    // Ensure an ID is provided and it's numeric
    if ($id === null || !is_numeric($id)) {
        show_404();
    }

    // Get the project from the model
    $project = $this->Project_model->get((int) $id);

    // If no project found, show 404
    if (empty($project)) {
        show_404();
    }

    // Load env variables
    $env = require APPPATH.'config/env.php';
    $cloudName = $env['CLOUDINARY_CLOUD_NAME'];

    // Generate Cloudinary screenshot URL
    // Replace 'project_url' with the field that stores the project’s live URL
    $siteUrl = $project->deployment_url ?? ''; 
$encodedUrl = urlencode($siteUrl);

// If deployment_url is empty, snapshotUrl is blank
$snapshotUrl = !empty($siteUrl) 
    ? "https://api.apiflash.com/v1/urltoimage?access_key=a3533aee243e4d8294835842ff5bbb89&url={$encodedUrl}&format=webp&wait_until=dom_loaded" 
    : '';


    // Pass project and snapshot URL to the view
    $data = [
        'project' => $project,
        'snapshotUrl' => $snapshotUrl
    ];

    $this->load->view('projects/view', $data);
}



    public function add()
{
    // Validate core project fields
    $this->form_validation->set_rules('name', 'Project Name', 'required');
    $this->form_validation->set_rules('nature', 'Nature', 'required');

    // If 'Add New Project' selected, validate new group fields
    if ($this->input->post('group_id') === 'other') {
        $this->form_validation->set_rules('new_group_name', 'New Project Group Name', 'required');
        $this->form_validation->set_rules('new_group_description', 'Project Group Description', 'required');
    }

    if ($this->form_validation->run() === FALSE) {
        $data['groups'] = $this->Project_group_model->get_all();
        $this->load->view('projects/create', $data);
    } else {
        $group_id = $this->input->post('group_id');

        // Case: Create new group
        if ($group_id === 'other') {
            $newGroupData = [
                'name' => $this->input->post('new_group_name'),
                'description' => $this->input->post('new_group_description'),
            ];

            // Insert and get the new group ID
            $group_id = $this->Project_group_model->create($newGroupData); // Must return insert_id
        }
        // Case: No group selected at all
        elseif ($group_id === '') {
            $group_id = null; // Prevent foreign key violation
        }
		$now = date('Y-m-d H:i:s');
        // Project data
        $projectData = [
            'group_id'     => $group_id,
            'name'         => $this->input->post('name'),
            'description'  => $this->input->post('description'),
            'nature'       => $this->input->post('nature'),
            'repo_url'    => $this->input->post('repo_link'),
            'deployment_type'  => $this->input->post('deploy_type'),
			'order' => 0,
            'deployment_url'  => $this->input->post('deploy_link'),
			'created_at'      => $now,
   			'updated_at'      => $now
        ];

        $this->Project_model->create($projectData);

        redirect('dashboard');
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
