<table class="table table-responsive" id="purchaseOrders-table">
    <thead>
        <tr>
            <th>Pembeli Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($purchaseOrders as $purchaseOrders)
        <tr>
            <td>{!! $purchaseOrders->pembeli_id !!}</td>
            <td>
                {!! Form::open(['route' => ['purchaseOrders.destroy', $purchaseOrders->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('purchaseOrders.show', [$purchaseOrders->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('purchaseOrders.edit', [$purchaseOrders->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>