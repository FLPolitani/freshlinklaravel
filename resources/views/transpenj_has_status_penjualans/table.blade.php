<table class="table table-responsive" id="transpenjHasStatusPenjualans-table">
    <thead>
        <tr>
            <th>Transaksi Penjualans Id</th>
        <th>Status Penjualans Id</th>
        <th>Users Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($transpenjHasStatusPenjualans as $transpenjHasStatusPenjualan)
        <tr>
            <td>{!! $transpenjHasStatusPenjualan->transaksi_penjualans_id !!}</td>
            <td>{!! $transpenjHasStatusPenjualan->status_penjualans_id !!}</td>
            <td>{!! $transpenjHasStatusPenjualan->users_id !!}</td>
            <td>
                {!! Form::open(['route' => ['transpenjHasStatusPenjualans.destroy', $transpenjHasStatusPenjualan->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('transpenjHasStatusPenjualans.show', [$transpenjHasStatusPenjualan->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('transpenjHasStatusPenjualans.edit', [$transpenjHasStatusPenjualan->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>