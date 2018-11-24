<!-- Produk Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('produk_id', 'Produk Id:') !!}
    {!! Form::number('produk_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Jumlah Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jumlah', 'Jumlah:') !!}
    {!! Form::number('jumlah', null, ['class' => 'form-control']) !!}
</div>

<!-- Satuan Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('satuan_id', 'Satuan Id:') !!}
    {!! Form::number('satuan_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Transaksi Penjualans Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('transaksi_penjualans_id', 'Transaksi Penjualans Id:') !!}
    {!! Form::number('transaksi_penjualans_id', null, ['class' => 'form-control']) !!}
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

<!-- Petani Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('petani_id', 'Petani Id:') !!}
    {!! Form::number('petani_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('detailPenjualans.index') !!}" class="btn btn-default">Cancel</a>
</div>
