<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $kontak->id !!}</p>
</div>

<!-- Nomor Field -->
<div class="form-group">
    {!! Form::label('nomor', 'Nomor:') !!}
    <p>{!! $kontak->nomor !!}</p>
</div>

<!-- Biodatas Id Field -->
<div class="form-group">
    {!! Form::label('biodatas_id', 'Biodatas Id:') !!}
    <p>{!! $kontak->biodatas_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $kontak->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $kontak->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $kontak->deleted_at !!}</p>
</div>

