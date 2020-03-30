<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	//menampung seluruh data dari model
	//didistribusikan ke statistik dll
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


		//load data ranking
		$this->load->model('M_Ranking', 'Ranking');
		$this->data['ranking'] = $this->Ranking->get_list();
		$this->data['listacc'] = $this->Ranking->list_acc();
		$this->data['listdec'] = $this->Ranking->list_dec();
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
	public function Reset_kriteria(){
		//nilai berpatok pada kriteia
		//jika kriteria dihapus, nilai juga harus dihapus
		$this->Nilai->reset_Data();
		$this->Kriteria->reset();
		redirect('Admin/Kriteria');
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
	public function Reset_Siswa(){
		//nilai berpatok pada kriteia
		//jika kriteria dihapus, nilai juga harus dihapus
		$this->Siswa->reset();
		redirect('Admin/Siswa');
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
	public function Reset_Nilai(){
		$this->Nilai->reset_Data();
		redirect('Admin/Nilai');
	}
	//proses SAW
	public function Proses($err = 0)
	{
		//cek apakah jumlah siswa mencukupi
		$this->data['err'] = $err;
		$this->load->view('interface/proses', $this->data);
	}
	//SAW
	public function Hasil()
	{
		//mereset perhitungan sebelumnya (jika ada)
		$this->Nilai->reset();
		$this->Ranking->reset();

		if ($this->input->post('submit')) {
			$this->data['err'] = $this->input->post('jumlah');
			//cek jumlah siswa memenuhi atau tidak
			if ($this->data['err'] > $this->data['total']->c || $this->data['err'] < 0)
				redirect('Admin/Proses/' . $this->data['err']);

				//ambil data seluruh siswa
			foreach ($this->data['siswa'] as $siswa) {
				//ambil data seluruh kriteria per siswa
				foreach ($this->data['listkriteria'] as $kriteria) {
					$num = 0;
					//ambil data nilai per kriteria per siswa
					foreach ($this->data['nilai'] as $nilai) {
						//deklarasi normalisasi dan referensi
						$normalisasi = 0;
						$preferensi = 0;
						//jika nilai ditemukan
						if ($nilai->siswa == $siswa->nis && $nilai->kriteria == $kriteria->id) {
							$num++;
							
							if ($kriteria->jenis == 'benefit') {
								//jika benefit maka perhitnguan nilai/max
								$max = $this->Nilai->get_max($nilai->kriteria)->m;
								$normalisasi = round($nilai->nilai / $max, 2);
							} else if ($kriteria->jenis == 'cost') {
								//jika cost maka perhitungan min/nilai
								$min = $this->Nilai->get_min($nilai->kriteria)->m;
								$normalisasi = round($min / $nilai->nilai, 2);
							}
							//preferensi = normalisasi x bobot
							$preferensi = ($normalisasi * $kriteria->bobot) / 100;
							//set hasil normalisasi dan preferensi dalam database
							$this->Nilai->normalisasi($nilai->nid, $normalisasi);
							$this->Nilai->preferensi($nilai->nid, $preferensi);
						}
					}
				}
			}
			//mengambil data total preferensi per siswa untuk diranking
			$proses = $this->Nilai->get_result();
			$i = 0;
			foreach ($proses as $p) {
				//membuat array untuk data
				$ranking = array(
					'siswa' => $p->siswa,
					'total' => round($p->total, 5),
					'peringkat' => ++$i,
					'keputusan' => $i <= $this->data['err'] ? 'diterima' : 'ditolak'
				);
				//$this->data['err'] adalah jumlah siswa yang akan diterima
				//set ranking ke database
				$this->Ranking->save($ranking);
			}
			//menampilkan hasil
			redirect('Admin/Ranking');
		} else {
			//jika tidak submit redirect ke proses
			redirect('Admin/proses');
		}
	}
	public function Ranking()
	{
		$this->load->view('interface/hasil', $this->data);
	}
	public function Reset(){
		$this->Ranking->reset();
		$this->Nilai->reset();
		redirect('Admin/Ranking');

	}
	public function Cetak()
	{
		$text='
		<page>
			<style>
			table{
				border:1px solid black;
				font-size:150%;
				margin-top:60px;
				margin-left:60px;
				display:block;
			}
			
			
			.break{
				border-bottom:1px solid black;
				padding:0;
			}

			</style>
			<table cellspacing="30">';
		$text.='
				<tr>
				<th>ID</th>
				<th>NIS</th>
				<th>Nama</th>
				<th>Total</th>
				<th>Raking</th>
				<th>Keputusan</th>
				</tr>
				';
		foreach($this->data['ranking'] as $r){
			$text.="
					<tr><td colspan='6' class='break'></td></tr>
					<tr>
					<td>$r->id</td>
					<td>$r->nis</td>
					<td>$r->nama</td>
					<td>$r->total</td>
					<td>$r->peringkat</td>
					<td>$r->keputusan</td>
					</tr>";
		}
		$text.='</table></page>';

		include('./assets/src/html2pdf.class.php');
		try {
			$html2pdf = new HTML2PDF('L', 'A4', 'en', true, 'UTF-8', array(0, 0, 0, 0));
			// $html2pdf->setDefaultFont("lucid");
			$html2pdf->writeHTML($text);
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
