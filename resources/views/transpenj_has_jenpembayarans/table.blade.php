<table class="table table-responsive" id="transpenjHasJenpembayarans-table">
    <thead>
        <tr>
            <th>Transaksi Penjualans Id</th>
        <th>Jenis Pembayarans Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($transpenjHasJenpembayarans as $transpenjHasJenpembayaran)
        <tr>
            <td>{!! $transpenjHasJenpembayaran->transaksi_penjualans_id !!}</td>
            <td>{!! $transpenjHasJenpembayaran->jenis_pembayarans_id !!}</td>
            <td>
                {!! Form::open(['route' => ['transpenjHasJenpembayarans.destroy', $transpenjHasJenpembayaran->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('transpenjHasJenpembayarans.show', [$transpenjHasJenpembayaran->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('transpenjHasJenpembayarans.edit', [$transpenjHasJenpembayaran->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>