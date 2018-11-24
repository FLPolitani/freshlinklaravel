<!-- Purchase Orders Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('purchase_orders_id', 'Purchase Orders Id:') !!}
    {!! Form::number('purchase_orders_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('transaksiPenjualans.index') !!}" class="btn btn-default">Cancel</a>
</div>
