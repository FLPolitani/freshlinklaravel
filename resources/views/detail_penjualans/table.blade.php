<table class="table table-responsive" id="detailPenjualans-table">
    <thead>
        <tr>
            <th>Produk Id</th>
        <th>Jumlah</th>
        <th>Satuan Id</th>
        <th>Transaksi Penjualans Id</th>
        <th>Harga Petani</th>
        <th>Harga Jual</th>
        <th>Petani Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($detailPenjualans as $detailPenjualan)
        <tr>
            <td>{!! $detailPenjualan->produk_id !!}</td>
            <td>{!! $detailPenjualan->jumlah !!}</td>
            <td>{!! $detailPenjualan->satuan_id !!}</td>
            <td>{!! $detailPenjualan->transaksi_penjualans_id !!}</td>
            <td>{!! $detailPenjualan->harga_petani !!}</td>
            <td>{!! $detailPenjualan->harga_jual !!}</td>
            <td>{!! $detailPenjualan->petani_id !!}</td>
            <td>
                {!! Form::open(['route' => ['detailPenjualans.destroy', $detailPenjualan->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('detailPenjualans.show', [$detailPenjualan->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('detailPenjualans.edit', [$detailPenjualan->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>