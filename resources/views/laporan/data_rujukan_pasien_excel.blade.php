<table>
    <thead>
        <tr>
            <th style="background-color:#D3D3D3 ">No reg</th>
            <th style="background-color:#D3D3D3 ">No Rujukan</th>
            <th style="background-color:#D3D3D3 ">Kode Ppk</th>
            <th style="background-color:#D3D3D3 ">Nama Ppk</th>
            <th style="background-color:#D3D3D3 ">Tanggal Kunjungan</th>
            <th style="background-color:#D3D3D3 ">Kode Poli</th>
            <th style="background-color:#D3D3D3 ">Nama Poli</th>
            <th style="background-color:#D3D3D3 ">No Pasien</th>
            <th style="background-color:#D3D3D3 ">Pisa</th>
            <th style="background-color:#D3D3D3 ">ket Pisa</th>
            <th style="background-color:#D3D3D3 ">Sex</th>
            <th style="background-color:#D3D3D3 ">Kode Diagnosa</th>
            <th style="background-color:#D3D3D3 ">Catatan</th>
            <th style="background-color:#D3D3D3 ">Kode Dokter</th>
            <th style="background-color:#D3D3D3 ">Nama Tacc</th>
            <th style="background-color:#D3D3D3 ">Alasan Tacc</th>
            <th style="background-color:#D3D3D3 ">No Kunjungan</th>
            <th style="background-color:#D3D3D3 ">Nama Diagnosa 1 </th>
            <th style="background-color:#D3D3D3 ">Nama Diagnosa 2 </th>
            <th style="background-color:#D3D3D3 ">Nama Diagnosa 3 </th>
            <th style="background-color:#D3D3D3 ">Tanggal Eskusi Rujuk </th>
            <th style="background-color:#D3D3D3 ">Tanggal Akhir Rujuk </th>
            <th style="background-color:#D3D3D3 ">Jadwal </th>
            <th style="background-color:#D3D3D3 ">Nama Dokter </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $row)
            <tr>
                <td>{{ $row->kodeRs }}</td>
                <td>{{ $row->noRujukan }}</td>
                <td>{{ $row->kdPpk }}</td>
                <td>{{ $row->nmPpk }}</td>
                <td>{{ $row->tglKunjungan }}</td>
                <td>{{ $row->kdPoli }}</td>
                <td>{{ $row->nmPoli }}</td>
                <td>{{ $row->nokaPst }}</td>
                <td>{{ $row->nmPst }}</td>
                <td>{{ $row->tglLahir }}</td>
                <td>{{ $row->pisa }}</td>
                <td>{{ $row->ketPisa }}</td>
                <td>{{ $row->sex=="L"?"Laki-Laki":"Wanita" }}</td>
                <td>{{ $row->kdDiag1 }}</td>
                <td>{{ $row->catatan }}</td>
                <td>{{ $row->kdDokter }}</td>
                <td>{{ $row->nmTacc }}</td>
                <td>{{ $row->alasanTacc }}</td>
                <td>{{ $row->infoDenda }}</td>
                <td>{{ $row->noKunjungan }}</td>
                <td>{{ $row->nmKR }}</td>
                <td>{{ $row->nmDiag1 }}</td>
                <td>{{ $row->nmDiag2 }}</td>
                <td>{{ $row->nmDiag3 }}</td>
                <td>{{ $row->tglEstRujuk }}</td>
                <td>{{ $row->tglAkhirRujuk }}</td>
                <td>{{ $row->jadwal }}</td>
                <td>{{ $row->nmDokter }}</td>
                
            </tr>
        @endforeach
    </tbody>
</table>
