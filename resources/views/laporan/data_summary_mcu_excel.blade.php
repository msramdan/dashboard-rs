<table>
    <thead>
        <tr>
            <th style="background-color:#D3D3D3 ">No reg</th>
            <th style="background-color:#D3D3D3 ">No rekmed</th>
            <th style="background-color:#D3D3D3 ">No Tanggal Masuk</th>
            <th style="background-color:#D3D3D3 ">Nama Pasien</th>
            <th style="background-color:#D3D3D3 ">Suhu</th>
            <th style="background-color:#D3D3D3 ">Keluhan</th>
            <th style="background-color:#D3D3D3 ">Diagnosa</th>
            <th style="background-color:#D3D3D3 ">No Surat</th>
            <th style="background-color:#D3D3D3 ">Dokter</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $row)
            <tr>
                <td> {{ $row->noreg }} </td>
                <td> {{ $row->rekmed }} </td>
                <td>{{ $row->tglmasuk }}</td>
                <td>{{ $row->namapas }}</td>
                <td>{{ $row->suhu }}</td>
                <td>{{ $row->keluhanawal }}</td>
                <td>{{ $row->diags }}</td>
                <td>{{ $row->surat1 }}</td>
                <td>{{ $row->nadokter }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
