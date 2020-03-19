select nis, siswa.nama, kelas.alias as kelas, kelas.jurusan, semester, nilai.akademik,nilai.prestasi, nilai.sikap, (nilai.akademik+nilai.prestasi+nilai.sikap)/3 as avg,  guru.nama as "wali kelas" from siswa join kelas on siswa.kelas = kelas.id join guru on kelas.wali = guru.nik join nilai on nilai.siswa = siswa.nis