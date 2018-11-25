<!-- Purchase Orders Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('purchase_orders_id', 'Purchase Orders Id:') !!}
    {!! Form::select('purchase_orders_id', $purchaseOrders, ['class' => 'form-control']) !!}
</div>

<!-- Produk Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('produk_id', 'Produk Id:') !!}
    {!! Form::select('produk_id', $produk, ['class' => 'form-control']) !!}
</div>

<!-- Jumlah Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jumlah', 'Jumlah:') !!}
    {!! Form::number('jumlah', null, ['class' => 'form-control']) !!}
</div>

<!-- Satuan Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('satuan_id', 'Satuan Id:') !!}
    {!! Form::select('satuan_id', $satuan, ['class' => 'form-control']) !!}
</div>

<!-- Harga Jual Field -->
<div class="form-group col-sm-6">
    {!! Form::label('harga_jual', 'Harga Jual:') !!}
    {!! Form::number('harga_jual', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('detailPurchaseOrders.index') !!}" class="btn btn-default">Cancel</a>
</div>
