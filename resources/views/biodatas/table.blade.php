<table class="table table-responsive" id="biodatas-table">
    <thead>
        <tr>
            <th>Users Id</th>
        <th>Nik</th>
        <th>Tanggal Lahir</th>
        <th>Jenis Kelamin</th>
        <th>Status Perkawinan</th>
        <th>Pendidikan Terakhir</th>
        <th>Agama Id</th>
        <th>Foto</th>
        <th>Kontak</th>
        <th>Longitude</th>
        <th>Latitude</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($biodatas as $biodata)
        <tr>
            <td>{!! $biodata->users_id !!}</td>
            <td>{!! $biodata->nik !!}</td>
            <td>{!! $biodata->tanggal_lahir !!}</td>
            <td>{!! $biodata->jenis_kelamin !!}</td>
            <td>{!! $biodata->status_perkawinan !!}</td>
            <td>{!! $biodata->pendidikan_terakhir !!}</td>
            <td>{!! $biodata->agama_id !!}</td>
            <td>{!! $biodata->foto !!}</td>
            <td>{!! $biodata->kontak !!}</td>
            <td>{!! $biodata->longitude !!}</td>
            <td>{!! $biodata->latitude !!}</td>
            <td>
                {!! Form::open(['route' => ['biodatas.destroy', $biodata->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('biodatas.show', [$biodata->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('biodatas.edit', [$biodata->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>