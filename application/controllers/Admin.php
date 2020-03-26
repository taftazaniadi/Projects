<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	private $data;
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_Admin', 'Admin');
		//load data siswa
		$this->load->model('M_Siswa', 'Siswa');
		$this->data['siswa'] = $this->Siswa->get_list();
		$this->data['total'] = $this->Siswa->count(); //data statistik->partial/js.php
		$this->data['kelas'] = $this->Siswa->get_kelas();
		//load data nilai
		$this->load->model('M_Nilai', 'Nilai');
		$this->data['nilai'] = $this->Nilai->get_list();
		$this->data['count'] = $this->Nilai->count();//data statistik->partial/js.php
		$this->data['listnama'] = $this->Nilai->get_siswa();
		//load data kriteria
		$this->load->model('M_Kriteria', 'Kriteria');
		$this->data['kriteria'] = $this->Kriteria->count();//data statistik->partial/js.php
		$this->data['listkriteria'] = $this->Kriteria->get_list();
	}

	public function index()
	{
		$this->load->view('interface/home', $this->data);
	}
	//kriteria
	public function Kriteria()
	{
		$this->load->view('interface/kriteria', $this->data);
	}
	public function Tambah_kriteria()
	{
		if ($this->input->post('submit')) {
			$this->Kriteria->save();
			redirect("Admin/Kriteria");
		}
	}
	public function Edit_kriteria($id)
	{
		if ($this->input->post('submit')) {
			$this->Kriteria->edit($id);
			redirect("Admin/Kriteria");
		}
	}
	public function Hapus_kriteria($id)
	{
		$this->Kriteria->delete($id);
		redirect("Admin/Kriteria");
	}
	//siswa
	public function Siswa()
	{


		$this->load->view('interface/siswa', $this->data);
	}
	public function Tambah_siswa()
	{
		if ($this->input->post('submit')) {
			$this->Siswa->save();
			redirect("Admin/Siswa");
		}
	}
	public function Edit_siswa($nis)
	{
		if ($this->input->post('submit')) {
			$this->Siswa->edit($nis);
			redirect("Admin/Siswa");
		}
	}
	public function Hapus_siswa($nis)
	{
		$this->Siswa->delete($nis);
		redirect("Admin/Siswa");
	}
	//nilai
	public function Nilai()
	{
		$this->load->view('interface/nilai', $this->data);
	}
	public function Tambah_nilai()
	{
		if ($this->input->post('submit')) {
			$this->Nilai->save();

			redirect("Admin/Nilai");
		}
	}
	public function Edit_nilai($id)
	{
		if ($this->input->post('submit')) {
			$this->Nilai->edit($id);
			redirect("Admin/Nilai");
		}
	}
	public function Hapus_nilai($id)
	{
		$this->Nilai->delete($id);
		redirect("Admin/Nilai");
	}
	//alternatif
	public function Alternatif()
	{
		$this->load->view('interface/alternatif');
	}
	//proses
	public function Proses()
	{
		$this->load->view('interface/proses');
	}
}
