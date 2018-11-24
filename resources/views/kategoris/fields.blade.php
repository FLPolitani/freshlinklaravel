<!-- Nama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama', 'Nama:') !!}
    {!! Form::text('nama', null, ['class' => 'form-control']) !!}
</div>

<!-- Parent Kategori Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('parent_kategori_id', 'Parent Kategori Id:') !!}
    {!! Form::number('parent_kategori_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('kategoris.index') !!}" class="btn btn-default">Cancel</a>
</div>
