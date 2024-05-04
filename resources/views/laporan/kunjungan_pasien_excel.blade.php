<table>
    <thead>
        <tr>
            <th style="background-color:#D3D3D3 ">No reg</th>
            <th style="background-color:#D3D3D3 ">Rekmed</th>
            <th style="background-color:#D3D3D3 ">Tgl kunjungan</th>
            <th style="background-color:#D3D3D3 ">Nama pasien</th>
            <th style="background-color:#D3D3D3 ">Jenis kelamin</th>
            <th style="background-color:#D3D3D3 ">Umur</th>
            <th style="background-color:#D3D3D3 ">Poliklinik</th>
            <th style="background-color:#D3D3D3 ">Payment</th>
            <th style="background-color:#D3D3D3 ">Kode dignosa</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $row)
            <tr>
                <td>{{ $row->noreg }}</td>
                <td>{{ $row->rekmed }}</td>
                <td>{{ $row->tglmasuk }}</td>
                <td>{{ $row->namapas }}</td>
                @if ($row->jkel == 1 || $row->jkel == '1')
                    <td>Pria</td>
                @else
                    <td>Wanita</td>
                @endif
                @php
                    $tanggal_lahir = new DateTime($row->tgllahir);
                    $tanggal_sekarang = new DateTime(date('Y-m-d'));
                    $selisih = $tanggal_lahir->diff($tanggal_sekarang);
                    $umur_tahun = $selisih->y;
                    $umur_bulan = $selisih->m;
                    $umur = $umur_tahun . ' Th ' . $umur_bulan . ' Bln';
                @endphp
                <td>{{ $umur }}</td>
                <td>{{ $row->namapost }}</td>
                @if ($row->jenispas == 'PAS1')
                    <td>Umum</td>
                @else
                    <td>{{ $row->cust_nama }}</td>
                @endif
                @php
                    $icdCodes = DB::table('tbl_icdtr')
                        ->where('noreg', $row->noreg)
                        ->pluck('icdcode');
                    $html = '';
                    foreach ($icdCodes as $icdCode) {
                        $html .= $icdCode;
                        $html .= '; ';
                    }
                @endphp
                <td>{{ $html }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
