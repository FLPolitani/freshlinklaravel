<table class="table table-responsive" id="pembelis-table">
    <thead>
        <tr>
            <th>Users Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($pembelis as $pembeli)
        <tr>
            <td>{!! $pembeli->users_id !!}</td>
            <td>
                {!! Form::open(['route' => ['pembelis.destroy', $pembeli->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('pembelis.show', [$pembeli->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('pembelis.edit', [$pembeli->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>