<table class="table table-responsive" id="detailPurchaseOrders-table">
    <thead>
        <tr>
            <th>Purchase Orders Id</th>
        <th>Produk Id</th>
        <th>Jumlah</th>
        <th>Satuan Id</th>
        <th>Harga Jual</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($detailPurchaseOrders as $detailPurchaseOrder)
        <tr>
            <td>{!! $detailPurchaseOrder->purchase_orders_id !!}</td>
            <td>{!! $detailPurchaseOrder->produk_id !!}</td>
            <td>{!! $detailPurchaseOrder->jumlah !!}</td>
            <td>{!! $detailPurchaseOrder->satuan_id !!}</td>
            <td>{!! $detailPurchaseOrder->harga_jual !!}</td>
            <td>
                {!! Form::open(['route' => ['detailPurchaseOrders.destroy', $detailPurchaseOrder->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('detailPurchaseOrders.show', [$detailPurchaseOrder->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('detailPurchaseOrders.edit', [$detailPurchaseOrder->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>