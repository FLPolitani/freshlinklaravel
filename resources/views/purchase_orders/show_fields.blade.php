<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $purchaseOrder->id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $purchaseOrder->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $purchaseOrder->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $purchaseOrder->deleted_at !!}</p>
</div>

<!-- Pembeli Id Field -->
<div class="form-group">
    {!! Form::label('pembeli_id', 'Pembeli Id:') !!}
    <p>{!! $purchaseOrder->pembeli_id !!}</p>
</div>

