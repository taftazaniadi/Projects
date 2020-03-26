<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_Parameter extends CI_Model
{
    public function count(){
        $this->db->select('count(*) as c');
        return $this->db->get('parameter')->row();
    }
    public function get_list(){
        $this->db->select('*, parameter.id as pid');
        $this->db->join('kriteria','parameter.kriteria = kriteria.id');
        return $this->db->get('parameter')->result();
    }
    public function save(){
        $data = $this->input->post();
        array_pop($data);
        $this->db->insert('parameter',$data);
    }
    public function delete($id){
        $this->db->where('id',$id);
        $this->db->delete('parameter');
    }
    public function edit($id){
        $data=$this->input->post();
        array_pop($data);
        $this->db->where('id',$id);
        $this->db->update('parameter',$data);
    }
}
