<table class="table table-responsive" id="dataUsahas-table">
    <thead>
        <tr>
            <th>User Id</th>
        <th>Nama</th>
        <th>Jenis</th>
        <th>Kontak</th>
        <th>Alamat</th>
        <th>Npwp Usaha</th>
        <th>Scan Npwp</th>
        <th>Nomor Siup</th>
        <th>Scan Siup</th>
        <th>Nomor Situ</th>
        <th>Scan Situ</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($dataUsahas as $dataUsaha)
        <tr>
            <td>{!! $dataUsaha->user_id !!}</td>
            <td>{!! $dataUsaha->nama !!}</td>
            <td>{!! $dataUsaha->jenis !!}</td>
            <td>{!! $dataUsaha->kontak !!}</td>
            <td>{!! $dataUsaha->alamat !!}</td>
            <td>{!! $dataUsaha->npwp_usaha !!}</td>
            <td>{!! $dataUsaha->scan_npwp !!}</td>
            <td>{!! $dataUsaha->nomor_siup !!}</td>
            <td>{!! $dataUsaha->scan_siup !!}</td>
            <td>{!! $dataUsaha->nomor_situ !!}</td>
            <td>{!! $dataUsaha->scan_situ !!}</td>
            <td>
                {!! Form::open(['route' => ['dataUsahas.destroy', $dataUsaha->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('dataUsahas.show', [$dataUsaha->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('dataUsahas.edit', [$dataUsaha->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>