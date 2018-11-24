<table class="table table-responsive" id="kontaks-table">
    <thead>
        <tr>
            <th>Nomor</th>
        <th>Biodatas Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($kontaks as $kontaks)
        <tr>
            <td>{!! $kontaks->nomor !!}</td>
            <td>{!! $kontaks->biodatas_id !!}</td>
            <td>
                {!! Form::open(['route' => ['kontaks.destroy', $kontaks->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('kontaks.show', [$kontaks->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('kontaks.edit', [$kontaks->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>