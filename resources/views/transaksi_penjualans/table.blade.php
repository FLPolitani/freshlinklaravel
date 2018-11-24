<table class="table table-responsive" id="transaksiPenjualans-table">
    <thead>
        <tr>
            <th>Purchase Orders Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($transaksiPenjualans as $transaksiPenjualan)
        <tr>
            <td>{!! $transaksiPenjualan->purchase_orders_id !!}</td>
            <td>
                {!! Form::open(['route' => ['transaksiPenjualans.destroy', $transaksiPenjualan->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('transaksiPenjualans.show', [$transaksiPenjualan->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('transaksiPenjualans.edit', [$transaksiPenjualan->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>