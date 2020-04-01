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
		//load data guru
		$this->load->model('M_Guru', 'Guru');
		$this->data['guru'] = $this->Guru->get_list();
		$this->data['cguru'] = $this->Guru->count();
		//load data kelas
		$this->load->model('M_Kelas', 'Kelas');
		$this->data['kelas'] = $this->Kelas->get_list();
		$this->data['ckelas'] = $this->Kelas->count();
		//load data jurusan
		$this->load->model('M_Jurusan', 'Jurusan');
		$this->data['jurusan'] = $this->Jurusan->get_list();
		$this->data['cjurusan'] = $this->Jurusan->count();

		//load data nilai
		$this->load->model('M_Nilai', 'Nilai');
		$this->data['nilai'] = $this->Nilai->get_list();
		$this->data['dsiswa'] = $this->Nilai->get_distinct();
		$this->data['csiswa'] = $this->Nilai->count_distinct();
		$this->data['count'] = $this->Nilai->count(); //data statistik->partial/js.php
		$this->data['listnama'] = $this->Nilai->get_siswa();
		$this->data['listsiswa'] = $this->Nilai->list_siswa();
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
		$this->Ranking->reset();
		$this->Nilai->Reset_kriteria($id);
		$this->Kriteria->delete($id);
		redirect("Admin/Kriteria");
	}
	public function Reset_kriteria()
	{
		//nilai berpatok pada kriteia
		//jika kriteria dihapus, nilai juga harus dihapus
		$this->Ranking->reset();
		$this->Nilai->reset_Data();
		$this->Kriteria->reset();
		redirect('Admin/Kriteria');
	}
	//siswa
	public function Siswa($err = 0)
	{
		$this->data['err'] = $err;
		// echo json_encode($this->data['kelas']);
		$this->load->view('interface/siswa', $this->data);
	}
	public function Tambah_siswa()
	{
		if ($this->input->post('submit')) {
			$nis = $this->input->post('nis');
			$c = $this->Siswa->isExist($nis);
			if ($c->c > 0)
				$err = 1;
			else
				$this->Siswa->save();
			redirect("Admin/Siswa/" . $err);
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
		$this->Nilai->delete($nis);
		$this->Siswa->delete($nis);
		$this->Ranking->reset();

		redirect("Admin/Siswa");
	}
	public function Reset_Siswa()
	{
		//nilai berpatok pada Siswa
		//jika Siswa dihapus, nilai juga harus dihapus
		$this->Ranking->reset();
		$this->Nilai->reset_Data();

		$this->Siswa->reset();
		redirect('Admin/Siswa');
	}
	//guru
	public function Guru($err = 0)
	{
		$this->data['err'] = $err;
		$this->load->view('interface/guru', $this->data);
	}
	public function Tambah_guru()
	{
		if ($this->input->post('submit')) {
			$nik = $this->input->post('nik');
			$c = $this->Guru->isExist($nik);
			if ($c->c > 0)
				$err = 1;
			else
				$this->Guru->save();
			redirect("Admin/Guru/" . $err);
		}
	}
	public function Edit_guru($nik)
	{
		if ($this->input->post('submit')) {
			$this->Guru->edit($nik);
			redirect("Admin/Guru");
		}
	}
	public function Hapus_guru($nik)
	{
		// $this->Nilai->delete($nik);
		// $this->Kelas->delete($id);
		// $this->Siswa->delKelas($id);
		$r = $this->Kelas->byWali($nik);
		foreach ($r as $perkelas) {
			$this->Kelas->delete($perkelas->id);
			$this->Siswa->delKelas($perkelas->id);
		}
		$this->Guru->delete($nik);
		$this->Ranking->reset();
		redirect("Admin/Guru");
	}
	public function Reset_guru()
	{
		$this->Kelas->reset();
		$this->Siswa->reset();
		$this->Guru->reset();
		$this->Ranking->reset();
		redirect('Admin/Guru');
	}
	//jurusan
	public function Jurusan()
	{
		$this->load->view('interface/jurusan', $this->data);
	}
	public function Tambah_jurusan()
	{
		if ($this->input->post('submit')) {
			$nik = $this->input->post('id');
			$this->Jurusan->save();
			redirect("Admin/Jurusan/");
		}
	}
	public function Edit_jurusan($id)
	{
		if ($this->input->post('submit')) {
			$this->Jurusan->edit($id);
			redirect("Admin/Jurusan");
		}
	}
	public function Hapus_jurusan($id)
	{
		// $this->Nilai->delete($nik);
		// $this->Jurusan->delete($id);
		$kel = $this->Kelas->byJurusan($id);
		echo json_encode($kel);
		foreach ($kel as $kelas) {
			$this->Kelas->delete($kelas->id);
			$this->Siswa->delKelas($kelas->id);
		}
		$this->Jurusan->delete($id);
		$this->Ranking->reset();
		redirect("Admin/Jurusan");
	}
	public function Reset_jurusan()
	{
		$this->Jurusan->reset();
		$this->Kelas->reset();
		$this->Siswa->reset();
		$this->Ranking->reset();
		redirect('Admin/Jurusan');
	}
	//kelas
	public function Kelas($err = 0)
	{
		$this->data['err'] = $err;
		$this->load->view('interface/kelas', $this->data);
	}
	public function Tambah_Kelas()
	{
		if ($this->input->post('submit')) {
			$alias = $this->input->post('alias');
			$jurusan = $this->input->post('jurusan');
			$c = $this->Kelas->isExist($alias, $jurusan);
			if ($c->c > 0)
				$err = 1;
			else
				$this->Kelas->save();
			redirect("Admin/Kelas/" . $err);
		}
	}
	public function Edit_Kelas($id)
	{
		if ($this->input->post('submit')) {
			$this->Kelas->edit($id);
			redirect("Admin/Kelas");
		}
	}
	public function Hapus_Kelas($id)
	{
		// $this->Nilai->delete($nik);
		$this->Kelas->delete($id);
		$this->Siswa->delKelas($id);
		$this->Ranking->reset();
		redirect("Admin/Kelas");
	}
	public function Reset_Kelas()
	{
		$this->Kelas->reset();
		$this->Siswa->reset();
		$this->Ranking->reset();
		redirect('Admin/Kelas');
	}
	//nilai
	public function Nilai($nis = 0)
	{
		if ($nis == 0)
			$this->load->view('interface/nilai', $this->data);
		else {
			$this->data['nilai'] = $this->Nilai->bySiswa($nis);
			$this->load->view('interface/nilai_detail', $this->data);
		}
	}
	public function Tambah_nilai()
	{
		if ($this->input->post('submit')) {
			$r = $this->Nilai->count_siswa($this->input->post('siswa'));
			echo json_encode($r);
			if ($r->c == 0) {
				$this->Nilai->save();
				redirect("Admin/Nilai");
			} else
				$this->load->view('interface/nilai_err');
		}
	}
	public function Edit_nilai($id, $nis)
	{
		if ($this->input->post('submit')) {
			$this->Nilai->edit($id);
			redirect("Admin/Nilai/" . $nis);
		}
		// echo json_encode($this->input->post);
	}
	public function Hapus_nilai($id)
	{
		$this->Nilai->delete($id);
		$this->Ranking->reset();
		redirect("Admin/Nilai");
	}
	public function Reset_Nilai()
	{
		$this->Nilai->reset_Data();
		$this->Ranking->reset();
		redirect('Admin/Nilai');
	}
	//proses SAW
	public function Proses($err = 0)
	{
		//cek apakah jumlah siswa mencukupi
		$this->data['over'] = $err;
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
			if ($this->data['err'] > $this->data['csiswa']->c || $this->data['err'] < 0)
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
	public function Reset()
	{
		$this->Ranking->reset();
		$this->Nilai->reset();
		redirect('Admin/Ranking');
	}
	public function Cetak()
	{
		$text = '
		<page>
			<style>
			table{
				border:1px solid black;
				font-size:120%;
				margin-left:40px;
				margin-top:60px;
				display:block;
			}
			
			th{
					text-align:center;
			}
			.break{
				border-bottom:1px solid black;
				padding:0;
			}

			</style>
			<table cellspacing="30">';
		$text .= '
				<tr>
				<th>Raking</th>
				<th>NIS</th>
				<th>Nama</th>
				<th>Total</th>
				<th>Kelas</th>
				<th>Keputusan</th>
				</tr>
				';
		foreach ($this->data['ranking'] as $r) {
			$text .= "
					<tr><td colspan='6' class='break'></td></tr>
					<tr>
					<td>$r->peringkat</td>
					<td>$r->nis</td>
					<td>$r->nama</td>
					<td>$r->total</td>
					<td>$r->alias ($r->jurusan)</td>
					<td>$r->keputusan</td>
					</tr>";
		}
		$text .= '</table></page>';

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
