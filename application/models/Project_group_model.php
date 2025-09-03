<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project_group_model extends CI_Model
{
    protected $table = 'project_groups';

    public function get_all()
    {
        // 1. Get all groups + project counts
        $this->db->select('g.id, g.name, g.description, COUNT(p.id) as project_count');
        $this->db->from($this->table . ' g');
        $this->db->join('projects p', 'p.group_id = g.id', 'left');
        $this->db->group_by('g.id');
        $groups = $this->db->get()->result();

        // 2. Count projects without group
        $this->db->select('COUNT(id) as project_count');
        $this->db->from('projects');
        $this->db->where('group_id IS NULL OR group_id = 0', null, false);
        $no_group_count = $this->db->get()->row()->project_count;

        if ($no_group_count > 0) {
            $groups[] = (object) [
                'id'            => null,
                'name'          => 'No Group',
                'description'   => 'Projects without a group',
                'project_count' => $no_group_count
            ];
        }

        return $groups;
    }

    public function get($id)
    {
        return $this->db->get_where($this->table, ['id' => $id])->row();
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
}
