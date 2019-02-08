# Host: localhost  (Version 5.5.5-10.1.32-MariaDB)
# Date: 2018-12-09 08:00:12
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Structure for table "t_bidang_studi"
#

DROP TABLE IF EXISTS `t_bidang_studi`;
CREATE TABLE `t_bidang_studi` (
  `kd_bidang_studi` varchar(11) NOT NULL DEFAULT '',
  `nama` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`kd_bidang_studi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "t_bidang_studi"
#


#
# Structure for table "t_golongan"
#

DROP TABLE IF EXISTS `t_golongan`;
CREATE TABLE `t_golongan` (
  `kd_golongan` varchar(11) NOT NULL DEFAULT '',
  `nama` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`kd_golongan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "t_golongan"
#


#
# Structure for table "t_jabatan"
#

DROP TABLE IF EXISTS `t_jabatan`;
CREATE TABLE `t_jabatan` (
  `kd_jabatan` varchar(11) NOT NULL DEFAULT '',
  `nama` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`kd_jabatan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "t_jabatan"
#


#
# Structure for table "t_jenis_pembayaran"
#

DROP TABLE IF EXISTS `t_jenis_pembayaran`;
CREATE TABLE `t_jenis_pembayaran` (
  `kd_jenis_pembayaran` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`kd_jenis_pembayaran`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "t_jenis_pembayaran"
#


#
# Structure for table "t_jenjang_pendidikan"
#

DROP TABLE IF EXISTS `t_jenjang_pendidikan`;
CREATE TABLE `t_jenjang_pendidikan` (
  `kd_jenjang_pendidikan` varchar(11) NOT NULL DEFAULT '',
  `nama` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`kd_jenjang_pendidikan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "t_jenjang_pendidikan"
#


#
# Structure for table "t_jurusan"
#

DROP TABLE IF EXISTS `t_jurusan`;
CREATE TABLE `t_jurusan` (
  `kd_jurusan` varchar(11) NOT NULL DEFAULT '',
  `nama` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`kd_jurusan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "t_jurusan"
#


#
# Structure for table "t_kelas"
#

DROP TABLE IF EXISTS `t_kelas`;
CREATE TABLE `t_kelas` (
  `kd_kelas` varchar(11) NOT NULL DEFAULT '',
  `nama` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`kd_kelas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "t_kelas"
#


#
# Structure for table "t_kelas_jenjang_bayar"
#

DROP TABLE IF EXISTS `t_kelas_jenjang_bayar`;
CREATE TABLE `t_kelas_jenjang_bayar` (
  `kd_kelas_jenjang_bayar` varchar(11) NOT NULL DEFAULT '',
  `fk_kd_kelas` varchar(11) DEFAULT NULL,
  `fk_kd_jurusan` varchar(11) DEFAULT NULL,
  `fk_tahun_akademik` varchar(11) DEFAULT NULL,
  `wajib_bayar` int(11) DEFAULT NULL,
  PRIMARY KEY (`kd_kelas_jenjang_bayar`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "t_kelas_jenjang_bayar"
#


#
# Structure for table "t_pegawai"
#

DROP TABLE IF EXISTS `t_pegawai`;
CREATE TABLE `t_pegawai` (
  `kd_pegawai` varchar(11) NOT NULL DEFAULT '',
  `nip` varchar(11) NOT NULL DEFAULT '',
  `nama` varchar(255) DEFAULT NULL,
  `alamat` text,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jenis_kelamin` varchar(11) DEFAULT NULL,
  `fk_kd_jenjang_pendidikan` varchar(11) DEFAULT NULL,
  `fk_kd_bidang_studi` varchar(11) DEFAULT NULL,
  `fk_kd_golongan` varchar(11) DEFAULT NULL,
  `fk_kd_jabatan` varchar(11) DEFAULT NULL,
  `fk_kd_pegawai_status` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`kd_pegawai`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "t_pegawai"
#


#
# Structure for table "t_pegawai_status"
#

DROP TABLE IF EXISTS `t_pegawai_status`;
CREATE TABLE `t_pegawai_status` (
  `kd_pegawai_status` varchar(11) NOT NULL DEFAULT '',
  `nama` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`kd_pegawai_status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "t_pegawai_status"
#


#
# Structure for table "t_ruang"
#

DROP TABLE IF EXISTS `t_ruang`;
CREATE TABLE `t_ruang` (
  `kd_ruang` varchar(11) NOT NULL DEFAULT '',
  `nama` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`kd_ruang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "t_ruang"
#


#
# Structure for table "t_siswa"
#

DROP TABLE IF EXISTS `t_siswa`;
CREATE TABLE `t_siswa` (
  `kd_siswa` varchar(11) NOT NULL DEFAULT '',
  `nis` varchar(11) NOT NULL DEFAULT '',
  `nisn` varchar(11) NOT NULL DEFAULT '',
  `nama` varchar(255) NOT NULL DEFAULT '',
  `alamat` text,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jenis_kelamin` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`kd_siswa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "t_siswa"
#


#
# Structure for table "t_siswa_bayar"
#

DROP TABLE IF EXISTS `t_siswa_bayar`;
CREATE TABLE `t_siswa_bayar` (
  `kd_siswa_bayar` varchar(11) NOT NULL DEFAULT '',
  `fk_kd_siswa_kewajiban_bayar` varchar(255) DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `jml_bayar` int(11) DEFAULT NULL,
  PRIMARY KEY (`kd_siswa_bayar`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "t_siswa_bayar"
#


#
# Structure for table "t_siswa_kelas"
#

DROP TABLE IF EXISTS `t_siswa_kelas`;
CREATE TABLE `t_siswa_kelas` (
  `kd_siswa_kelas` varchar(11) NOT NULL DEFAULT '',
  `fk_kd_tahun_akademik` varchar(11) DEFAULT NULL,
  `fk_kd_jurusan` varchar(11) DEFAULT NULL,
  `fk_kd_kelas` varchar(11) DEFAULT NULL,
  `fk_kd_ruang` varchar(11) DEFAULT NULL,
  `fk_kd_siswa` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`kd_siswa_kelas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "t_siswa_kelas"
#


#
# Structure for table "t_siswa_kewajiban_bayar"
#

DROP TABLE IF EXISTS `t_siswa_kewajiban_bayar`;
CREATE TABLE `t_siswa_kewajiban_bayar` (
  `kd_siswa_kewajiban_bayar` varchar(11) NOT NULL DEFAULT '',
  `fk_kd_siswa_kelas` varchar(11) DEFAULT NULL,
  `fk_kd_kelas_jenjang_bayar` varchar(11) DEFAULT NULL,
  `status_bayar` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`kd_siswa_kewajiban_bayar`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "t_siswa_kewajiban_bayar"
#


#
# Structure for table "t_tahun_akademik"
#

DROP TABLE IF EXISTS `t_tahun_akademik`;
CREATE TABLE `t_tahun_akademik` (
  `kd_tahun_akademik` varchar(11) NOT NULL DEFAULT '',
  `tahun_pertama` varchar(4) NOT NULL DEFAULT '',
  `tahun_kedua` varchar(4) NOT NULL DEFAULT '',
  PRIMARY KEY (`kd_tahun_akademik`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "t_tahun_akademik"
#


#
# Structure for table "t_user"
#

DROP TABLE IF EXISTS `t_user`;
CREATE TABLE `t_user` (
  `kd_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `fk_kd_user_level` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`kd_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "t_user"
#


#
# Structure for table "t_user_level"
#

DROP TABLE IF EXISTS `t_user_level`;
CREATE TABLE `t_user_level` (
  `kd_user_level` varchar(11) NOT NULL DEFAULT '',
  `nama` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`kd_user_level`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "t_user_level"
#

