<!-- Nama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama', 'Nama:') !!}
    {!! Form::text('nama', null, ['class' => 'form-control']) !!}
</div>

<!-- Jenis Produk Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jenis_produk_id', 'Jenis Produk Id:') !!}
    {!! Form::number('jenis_produk_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Satuan Terkecil Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('satuan_terkecil_id', 'Satuan Terkecil Id:') !!}
    {!! Form::number('satuan_terkecil_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Kategori Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kategori_id', 'Kategori Id:') !!}
    {!! Form::number('kategori_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Keterangan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('keterangan', 'Keterangan:') !!}
    {!! Form::text('keterangan', null, ['class' => 'form-control']) !!}
</div>

<!-- Harga Petani Field -->
<div class="form-group col-sm-6">
    {!! Form::label('harga_petani', 'Harga Petani:') !!}
    {!! Form::number('harga_petani', null, ['class' => 'form-control']) !!}
</div>

<!-- Harga Jual Field -->
<div class="form-group col-sm-6">
    {!! Form::label('harga_jual', 'Harga Jual:') !!}
    {!! Form::number('harga_jual', null, ['class' => 'form-control']) !!}
</div>

<!-- Foto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('foto', 'Foto:') !!}
    {!! Form::text('foto', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('produks.index') !!}" class="btn btn-default">Cancel</a>
</div>
