<table class="table table-responsive" id="transPenHasStatusPenjualans-table">
    <thead>
        <tr>
            <th>Transaksi Penjualans Id</th>
        <th>Status Penjualans Id</th>
        <th>Users Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($transPenHasStatusPenjualans as $transPenHasStatusPenjualan)
        <tr>
            <td>{!! $transPenHasStatusPenjualan->transaksi_penjualans_id !!}</td>
            <td>{!! $transPenHasStatusPenjualan->status_penjualans_id !!}</td>
            <td>{!! $transPenHasStatusPenjualan->users_id !!}</td>
            <td>
                {!! Form::open(['route' => ['transPenHasStatusPenjualans.destroy', $transPenHasStatusPenjualan->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('transPenHasStatusPenjualans.show', [$transPenHasStatusPenjualan->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('transPenHasStatusPenjualans.edit', [$transPenHasStatusPenjualan->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>