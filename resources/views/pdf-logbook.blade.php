<html>
    <head>
        <title>Lembar Kegiatan Bimbingan Mahasiswa</title>
    </head>
    <body>
        <table>
            <tr align="center">
                <td><img src="adminlte/img/logopdf.png" style="width: 120px"></td>
                <td style="vertical-align: top">
                    <div style="text-align:center;"><span style="font-size:14pt; font-family:times new roman,times,serif">KEMENTERIAN PENDIDIKAN DAN KEBUDAYAAN</span></div>
                    <div style="text-align:center;"><span style="font-size:14pt; font-family:times new roman,times,serif ">UNIVERSITAS NEGERI JAKARTA</span></div>
                    <div style="text-align:center;"><span style="font-size:13pt; font-family:times new roman,times,serif"><strong>FAKULTAS TEKNIK</strong></span></div>
                    <div style="text-align:center;"><span style="font-size:11,5pt; font-family:times new roman,times,serif">Gedung L Kampus A Universitas Negeri Jakarta, Jalan Rawamangun Muka, Jakarta 13220</span></p></div>
                    <div style="text-align:center;"><span style="font-size:11,5pt; font-family:times new roman,times,serif">&nbsp;Telepon : ( 62-21 ) 4890046 ext. 213, 4751523, 47864808 Fax. 47864808</span></p></div>
                    <div style="text-align:center;"><span style="font-size:11,5pt; font-family:times new roman,times,serif">Laman: <a href="http://ft.unj.ac.id/">http://ft.unj.ac.id</a> email: <a href="mailto:ft@unj.ac.id">ft@unj.ac.id</a></p></div>
                </td>
            </tr>
            <tr><hr style="height: 1px"></tr>
        </table>
        <table align="center" border="1" cellspacing="0" cellpadding="0" style="width:600px;">
            <tr>
                    <td style="text-align: center;"><span style="font-size:10pt;"><strong>No.Dokumen</strong></span></td>
                    <td style="text-align: center;"><span style="font-size:10pt;"><strong>Edisi</strong></span></td>
                    <td style="text-align: center;"><span style="font-size:10pt;"><strong>Revisi</strong></span></td>
                    <td style="text-align: center;"><span style="font-size:10pt;"><strong>Berlaku Efektif</strong></span></td>
                    <td style="text-align: center;"><span style="font-size:10pt;"><strong>Halaman</strong></span></td>
                </tr>
                <tr>
                    <td style="text-align: center;"><span style="font-size:11px;">QMS-FT/SOP/S5-23/III/2011</span></td>
                    <td style="text-align: center;"><span style="font-size:11px;">01</span></td>
                    <td style="text-align: center;"><span style="font-size:11px;">01</span></td>
                    <td style="text-align: center;"><span style="font-size:11px;">21 Juni 2011</span></td>
                    <td style="text-align: center;"><span style="font-size:11px;"><strong>2 dari 1</strong></span></td>
                </tr>
        </table>
        <br>
        <table align="center">
            <tr>
                <th style="text-align: center;"><span style="font-size:10pt; font-family: Arial, Helvetica, sans-serif">LEMBAR KONSULTASI PROPOSAL SKRIPSI/<del>KOMPREHENSIF/KARYA INOVATIF</del></th>
            </tr>
        </table>
        <br>
        <table style="font-size: 12pt; width: 80%;" align="center">
            <tr>
                <td><span style="font-family: Arial, Helvetica, sans-serif">Nama Mahasiswa</td>
                <td>:</td>
                <td><b style="font-family: Arial, Helvetica, sans-serif">{{ $mahasiswa->nama }}</b></td>
            </tr>
            <tr>
                <td><span style="font-family: Arial, Helvetica, sans-serif">Nomor Registrasi</td>
                <td>:</td>
                <td><span style="font-family: Arial, Helvetica, sans-serif">{{ $mahasiswa->nim }}</span></td>
            </tr>
            <tr>
                <td><span style="font-family: Arial, Helvetica, sans-serif">Prodi/Jurusan</td>
                <td>:</td>
                <td><span style="font-family: Arial, Helvetica, sans-serif">S1 Pendidikan Teknik Informatika dan Komputer</span></td>
            </tr>
            <tr>
                <td><span style="font-family: Arial, Helvetica, sans-serif">Judul</td>
                <td>:</td>
                <td><span style="font-family: Arial, Helvetica, sans-serif">{{ $dospem[0]->judul_skripsi }}</span></td>
            </tr>
            <tr>
                <td><span style="font-family: Arial, Helvetica, sans-serif">Dosen Pembimbing </td>
                <td>:</td>
                <td><span style="font-family: Arial, Helvetica, sans-serif">1. {{ $dospem[0]->dosen()->first()->nama }}</span></td>
            </tr>
            <tr>
                <td><span style="font-family: Arial, Helvetica, sans-serif"></td>
                <td></td>
                <td><span style="font-family: Arial, Helvetica, sans-serif">2. {{ $dospem[1]->dosen()->first()->nama }}</span></td>
            </tr>
            <tr>
                <td><span style="font-family: Arial, Helvetica, sans-serif">Tanggal Pertemuan Pertama</span></td>
                <td>:</td>
                <td align="right"><span style="font-family: Arial, Helvetica, sans-serif"></span>Paraf KPSJ *</td>
                <td><span style="font-family: Arial, Helvetica, sans-serif"></span>......</td>
            </tr>
        </table>
        <br>
        <table border="1" align="center" cellspacing="0" cellpadding="0" style="font-size: 11pt; width: 90%;">
            <tr>
                <td align="center">
                    <div><span style="font-family: Arial, Helvetica, sans-serif;">PERTEMUAN/</div>
                    <div><span style="font-family: Arial, Helvetica, sans-serif;">TANGGAL</div>
                </td>
                <td align="center"><span style="font-family: Arial, Helvetica, sans-serif">MATERI BAHASAN</td>
                <td align="center">
                    <div><span style="font-family: Arial, Helvetica, sans-serif;">PARAF</div>
                    <div><span style="font-family: Arial, Helvetica, sans-serif;">DOSEN</div>
                </td>
                <td align="center">
                    <div><span style="font-family: Arial, Helvetica, sans-serif">KET.</div>
                </td>
            </tr>
            @foreach ($catatan as $data)
            <tr>
                <td rowspan="2" height="50" align="center"><span style="font-family: Arial, Helvetica, sans-serif">{{ $data->tanggal }}</td>
                <td rowspan="2" align="center"><span style="font-family: Arial, Helvetica, sans-serif">{{ $data->materi }}</td>
                <td rowspan="2"></td>
                <td rowspan="2"></td>
            </tr>
            <tr>

            </tr>
            @endforeach
        </table>
        <br>
        <br>
        <table align="right" style="font-size: 12pt; width: 37%;" cellspacing="0" cellpadding="0">
            <tr>
                <td>
                    <div><span style="font-family: Arial, Helvetica, sans-serif">Mengetahui,</div>
                    <div><span style="font-family: Arial, Helvetica, sans-serif">Koordinator Penyelesaian Studi</div>
                    <div><span style="font-family: Arial, Helvetica, sans-serif">Prodi S1 Pendidikan TIK</div>
                </td>
            </tr>
            <tr>
                <td height="70"><img src="adminlte/img/ttdpakwid.png" style="width: 120px"></td>
            </tr>
            <tr>
                <td>
                    <div><span style="font-family: Arial, Helvetica, sans-serif">Dr. Widodo, M.Kom</div>
                    <div><span style="font-family: Arial, Helvetica, sans-serif">NIP. 197203252005011002</div>
                </td>
            </tr>
        </table>
        <br>
        <br>
        <div><span style="font-family: Arial, Helvetica, sans-serif; font-size: 12pt">* Diisi dan diparaf paling lambat 2 minggu setelah mendapatkan dosen pembimbing</div>
        </body>
</html>
