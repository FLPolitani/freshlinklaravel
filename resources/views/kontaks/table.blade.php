<table class="table table-responsive" id="kontaks-table">
    <thead>
        <tr>
            <th>Nomor</th>
        <th>Biodatas Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($kontaks as $kontak)
        <tr>
            <td>{!! $kontak->nomor !!}</td>
            <td>{!! $kontak->biodatas_id !!}</td>
            <td>
                {!! Form::open(['route' => ['kontaks.destroy', $kontak->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('kontaks.show', [$kontak->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('kontaks.edit', [$kontak->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>