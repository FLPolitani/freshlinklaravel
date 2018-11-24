<!-- Pembeli Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pembeli_id', 'Pembeli Id:') !!}
    {!! Form::number('pembeli_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('purchaseOrders.index') !!}" class="btn btn-default">Cancel</a>
</div>
