<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $jenisProduk->id !!}</p>
</div>

<!-- Nama Jenis Produk Field -->
<div class="form-group">
    {!! Form::label('nama_jenis_produk', 'Nama Jenis Produk:') !!}
    <p>{!! $jenisProduk->nama_jenis_produk !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $jenisProduk->updated_at !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $jenisProduk->created_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $jenisProduk->deleted_at !!}</p>
</div>

