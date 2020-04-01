<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_Nilai extends CI_Model
{
    public function get_list()
    {
        $this->db->select('*,nilai.id as nid,kriteria.nama as knama');
        $this->db->join('kriteria', 'kriteria.id = nilai.kriteria');
        $this->db->join('siswa', 'siswa.nis = nilai.siswa');
        return $this->db->get('nilai')->result();
    }
    public function bySiswa($nis)
    {
        $this->db->select('*,nilai.id as nid,kriteria.nama as knama, kriteria.id as kid');
        $this->db->join('kriteria', 'kriteria.id = nilai.kriteria');
        $this->db->join('siswa', 'siswa.nis = nilai.siswa');
        $this->db->where('nis',$nis);
        return $this->db->get('nilai')->result();
    }
    public function list_siswa()
    {
        $this->db->select('distinct(nis),siswa.nama, kelas.alias, jurusan.jurusan, nilai.semester');
        $this->db->join('kelas', 'siswa.kelas = kelas.id');
        $this->db->join('jurusan', 'jurusan.id = kelas.jurusan');
        $this->db->join('nilai', 'nilai.siswa = siswa.nis');
        return $this->db->get('siswa')->result();
    }
    public function get_distinct()
    {
        $this->db->select('siswa.nama, siswa.nis');
        $this->db->join('siswa', 'siswa.nis = nilai.siswa');
        $this->db->distinct();
        return $this->db->get('nilai')->result();
    }
    public function count_distinct()
    {
        return $this->db->query('select count(*) as c from (SELECT DISTINCT(siswa) FROM `nilai`) as s')->row();
        // return $this->db->get('nilai')->result();
    }
    public function count()
    {
        $this->db->select('count(*) as c');
        return $this->db->get('nilai')->row();
    }
    public function count_siswa($nis)
    {
        $this->db->select('count(*) as c');
        $this->db->where('siswa',$nis);
        return $this->db->get('nilai')->row();
    }
    public function get_siswa()
    {
        $this->db->select('nis,nama');
        return $this->db->get('siswa')->result();
    }
    public function save()
    {
        $data = $this->input->post();
        array_pop($data);
        //fetch data satu2 sesuai kriteria
        foreach($data['k'] as $k){
            $temp=Array(
                'siswa'=>$data['siswa'],
                'semester'=>$data['semester'],
                'kriteria'=>$k['id'],
                'nilai'=>$k['val'],
                'normalisasi'=>0,
                'preferensi'=>0
            );
        $this->db->insert('nilai', $temp);
        }
        // return $data;
        // $this->db->insert('nilai', $data);
    }
    public function edit($id)
    {
        $data = $this->input->post();
        array_pop($data);
        $this->db->where('id', $id);
        $this->db->update('nilai', $data);
    }
    public function delete($id)
    {
        $this->db->where('siswa', $id);
        $this->db->delete('nilai');
    }
    public function get_max($id)
    {
        $this->db->select('max(nilai) as m');
        $this->db->where('kriteria', $id);
        return $this->db->get('nilai')->row();
    }
    public function get_min($id)
    {
        $this->db->select('min(nilai) as m');
        $this->db->where('kriteria', $id);
        return $this->db->get('nilai')->row();
    }
    public function normalisasi($id, $val)
    {
        $v = array('normalisasi' => $val);
        $this->db->set($v);
        $this->db->where('id', $id);
        $this->db->update('nilai', $v);
    }
    public function preferensi($id, $val)
    {
        $v = array('preferensi' => $val);
        $this->db->set($v);
        $this->db->where('id', $id);
        $this->db->update('nilai', $v);
    }
    public function reset()
    {
        $v = array(
            'normalisasi' => 0,
            'preferensi' => 0
        );
        $this->db->set($v);
        $this->db->update('nilai', $v);
    }
    public function reset_Kriteria($id){
        $this->db->where('kriteria', $id);
        $this->db->delete('nilai');
    }
    public function reset_Data(){
        $this->db->empty_table('nilai');
        $this->db->query('alter table nilai auto_increment 1');
    }
    public function get_result(){
        $this->db->select('siswa, sum(preferensi) as total');
        $this->db->group_by('siswa');
        $this->db->order_by('sum(preferensi)','desc');
        return $this->db->get('nilai')->result();
    }
}
