<table class="table table-responsive" id="produks-table">
    <thead>
        <tr>
            <th>Nama</th>
        <th>Jenis Produk Id</th>
        <th>Satuan Terkecil Id</th>
        <th>Kategori Id</th>
        <th>Keterangan</th>
        <th>Harga Petani</th>
        <th>Harga Jual</th>
        <th>Foto</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($produks as $produk)
        <tr>
            <td>{!! $produk->nama !!}</td>
            <td>{!! $produk->jenis_produk_id !!}</td>
            <td>{!! $produk->satuan_terkecil_id !!}</td>
            <td>{!! $produk->kategori_id !!}</td>
            <td>{!! $produk->keterangan !!}</td>
            <td>{!! $produk->harga_petani !!}</td>
            <td>{!! $produk->harga_jual !!}</td>
            <td>{!! $produk->foto !!}</td>
            <td>
                {!! Form::open(['route' => ['produks.destroy', $produk->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('produks.show', [$produk->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('produks.edit', [$produk->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>