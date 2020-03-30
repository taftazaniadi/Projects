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
		$this->data['count'] = $this->Nilai->count(); //data statistik->partial/js.php
		$this->data['listnama'] = $this->Nilai->get_siswa();
		//load data kriteria
		$this->load->model('M_Kriteria', 'Kriteria');
		$this->data['kriteria'] = $this->Kriteria->count(); //data statistik->partial/js.php
		$this->data['listkriteria'] = $this->Kriteria->get_list();
		//load data parameter
		$this->load->model('M_Parameter', 'Parameter');
		$this->data['listparameter'] = $this->Parameter->get_list();

		//load data ranking
		$this->load->model('M_Ranking', 'Ranking');
		$this->data['err'] = 0;
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
		// echo json_encode($this->input->post);
	}
	public function Hapus_nilai($id)
	{
		$this->Nilai->delete($id);
		redirect("Admin/Nilai");
	}
	//parameter
	public function Parameter()
	{
		$this->load->view('interface/parameter', $this->data);
	}
	public function Tambah_parameter()
	{
		if ($this->input->post('submit')) {
			$this->Parameter->save();
			redirect("Admin/Parameter");
		}
	}
	public function Edit_parameter($id)
	{
		if ($this->input->post('submit')) {
			$this->Parameter->edit($id);
			redirect("Admin/Parameter");
		}
	}
	public function Hapus_parameter($id)
	{
		$this->Parameter->delete($id);
		redirect("Admin/Parameter");
	}
	//proses
	public function Proses($err=0)
	{
		$this->data['err']=$err;
		$this->load->view('interface/proses', $this->data);
	}
	public function Hasil()
	{
		$this->Nilai->reset();
		$this->Ranking->reset();

		if ($this->input->post('submit')) {
			$this->data['err'] = $this->input->post('jumlah');

			if($this->data['err']>$this->data['total']->c || $this->data['err']<0)
				redirect('Admin/Proses/'.$this->data['err']);

			foreach ($this->data['siswa'] as $siswa) {
				foreach ($this->data['listkriteria'] as $kriteria) {
					$num = 0;
					foreach ($this->data['nilai'] as $nilai) {

						$normalisasi = 0;
						$preferensi = 0;
						if ($nilai->siswa == $siswa->nis && $nilai->kriteria == $kriteria->id) {
							$num++;
							if ($kriteria->jenis == 'benefit') {
								$max = $this->Nilai->get_max($nilai->kriteria)->m;
								$normalisasi = round($nilai->nilai / $max, 2);
							} else if ($kriteria->jenis == 'cost') {
								$min = $this->Nilai->get_min($nilai->kriteria)->m;
								$normalisasi = round($min / $nilai->nilai, 2);
							}
							$preferensi = ($normalisasi * $kriteria->bobot) / 100;
							$this->Nilai->normalisasi($nilai->nid, $normalisasi);
							$this->Nilai->preferensi($nilai->nid, $preferensi);
						}
					}
				}
			}

			$proses = $this->Nilai->get_result();
			$i = 0;
			foreach ($proses as $p) {
				$ranking = array(
					'siswa' => $p->siswa,
					'total' => round($p->total, 5),
					'peringkat' => ++$i,
					'keputusan' => $i <= $this->data['err'] ? 'diterima' : 'ditolak'
				);
				$this->Ranking->save($ranking);
			}
			echo json_encode($this->Ranking->get_list());
		}
		else{
			redirect('Admin/proses');
		}
	}
	public function Cetak()
	{
		ob_start();
		include('./assets/src/html2pdf.class.php');
		try {
			$html2pdf = new HTML2PDF('P', 'A4', 'en', true, 'UTF-8', array(0, 0, 0, 0));
			// $html2pdf->setDefaultFont("lucid");
			$html2pdf->writeHTML('<h1>Hello</h1>');
			// $url = $_SESSION['data']['no']."0".$_SESSION['data']['nim'];
			$html2pdf->Output("cetak/b.pdf", 'D');
			session_unset();
			// return $url;
			//output laporan setelah di download
		} catch (HTML2PDF_exception $e) {
			echo $e;
		}
	}
}
