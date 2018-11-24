<table class="table table-responsive" id="jenisPembayarans-table">
    <thead>
        <tr>
            <th>Nama</th>
        <th>Keterangan</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($jenisPembayarans as $jenisPembayaran)
        <tr>
            <td>{!! $jenisPembayaran->nama !!}</td>
            <td>{!! $jenisPembayaran->keterangan !!}</td>
            <td>
                {!! Form::open(['route' => ['jenisPembayarans.destroy', $jenisPembayaran->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('jenisPembayarans.show', [$jenisPembayaran->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('jenisPembayarans.edit', [$jenisPembayaran->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>