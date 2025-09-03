<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Group extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Project_group_model', 'group');
        $this->load->model('Project_model', 'project');
    }

    /**
     * Show list of all groups
     */
    public function index()
    {
        $data['groups'] = $this->group->get_all();
        $this->load->view('groups/index', $data);
    }

    /**
     * Show details of one group + its projects
     * 
     * @param int $id Group ID
     */
    public function view($id = null)
    {
        if (!$id) {
            show_404();
        }

        $data['group']    = $this->group->get($id);
        $data['projects'] = $this->project->get_by_group($id);

        if (empty($data['group'])) {
            show_404();
        }

        $this->load->view('groups/view', $data);
    }
}
