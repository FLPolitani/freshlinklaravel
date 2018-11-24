<table class="table table-responsive" id="transPenHasJenPembayarans-table">
    <thead>
        <tr>
            <th>Transaksi Penjualans Id</th>
        <th>Jenis Pembayarans Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($transPenHasJenPembayarans as $transPenHasJenPembayaran)
        <tr>
            <td>{!! $transPenHasJenPembayaran->transaksi_penjualans_id !!}</td>
            <td>{!! $transPenHasJenPembayaran->jenis_pembayarans_id !!}</td>
            <td>
                {!! Form::open(['route' => ['transPenHasJenPembayarans.destroy', $transPenHasJenPembayaran->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('transPenHasJenPembayarans.show', [$transPenHasJenPembayaran->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('transPenHasJenPembayarans.edit', [$transPenHasJenPembayaran->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>