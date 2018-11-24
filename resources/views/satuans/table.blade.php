<table class="table table-responsive" id="satuans-table">
    <thead>
        <tr>
            <th>Nama</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($satuans as $satuan)
        <tr>
            <td>{!! $satuan->nama !!}</td>
            <td>
                {!! Form::open(['route' => ['satuans.destroy', $satuan->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('satuans.show', [$satuan->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('satuans.edit', [$satuan->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>