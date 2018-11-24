<!-- Nama Jenis Produk Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama_jenis_produk', 'Nama Jenis Produk:') !!}
    {!! Form::text('nama_jenis_produk', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('jenisProduks.index') !!}" class="btn btn-default">Cancel</a>
</div>
