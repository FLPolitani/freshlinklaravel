<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $kontaks->id !!}</p>
</div>

<!-- Nomor Field -->
<div class="form-group">
    {!! Form::label('nomor', 'Nomor:') !!}
    <p>{!! $kontaks->nomor !!}</p>
</div>

<!-- Biodatas Id Field -->
<div class="form-group">
    {!! Form::label('biodatas_id', 'Biodatas Id:') !!}
    <p>{!! $kontaks->biodatas_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $kontaks->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $kontaks->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $kontaks->deleted_at !!}</p>
</div>

