<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project_model extends CI_Model
{
    protected $table = 'projects';

    public function get_all()
{
    $this->db->select('projects.*, project_groups.name as group_name');
    $this->db->from($this->table . ' as projects');
    $this->db->join('project_groups', 'projects.group_id = project_groups.id', 'left'); // left join so it still works if group_id is NULL

    return $this->db->get()->result();
}

    public function get($id)
    {
        return $this->db->get_where($this->table, ['id' => $id])->row();
    }

    public function get_by_group($group_id)
    {
        return $this->db->get_where($this->table, ['group_id' => $group_id])->result();
    }

    public function create($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function update($id, $data)
    {
        return $this->db->update($this->table, $data, ['id' => $id]);
    }

    public function delete($id)
    {
        return $this->db->delete($this->table, ['id' => $id]);
    }
	    public function get_all_count()
{
    return $this->db->count_all($this->table);
}

}
