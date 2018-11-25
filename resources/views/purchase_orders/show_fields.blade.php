<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $purchaseOrders->id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $purchaseOrders->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $purchaseOrders->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $purchaseOrders->deleted_at !!}</p>
</div>

<!-- Pembeli Id Field -->
<div class="form-group">
    {!! Form::label('pembeli_id', 'Pembeli Id:') !!}
    <p>{!! $purchaseOrders->pembeli_id !!}</p>
</div>

