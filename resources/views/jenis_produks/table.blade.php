<table class="table table-responsive" id="jenisProduks-table">
    <thead>
        <tr>
            <th>Nama Jenis Produk</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($jenisProduks as $jenisProduk)
        <tr>
            <td>{!! $jenisProduk->nama_jenis_produk !!}</td>
            <td>
                {!! Form::open(['route' => ['jenisProduks.destroy', $jenisProduk->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('jenisProduks.show', [$jenisProduk->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('jenisProduks.edit', [$jenisProduk->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>