<table class="table table-responsive" id="statusPenjualans-table">
    <thead>
        <tr>
            <th>Nama Status</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($statusPenjualans as $statusPenjualan)
        <tr>
            <td>{!! $statusPenjualan->nama_status !!}</td>
            <td>
                {!! Form::open(['route' => ['statusPenjualans.destroy', $statusPenjualan->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('statusPenjualans.show', [$statusPenjualan->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('statusPenjualans.edit', [$statusPenjualan->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>