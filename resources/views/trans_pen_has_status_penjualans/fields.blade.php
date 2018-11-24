<!-- Transaksi Penjualans Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('transaksi_penjualans_id', 'Transaksi Penjualans Id:') !!}
    {!! Form::number('transaksi_penjualans_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Penjualans Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status_penjualans_id', 'Status Penjualans Id:') !!}
    {!! Form::number('status_penjualans_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Users Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('users_id', 'Users Id:') !!}
    {!! Form::number('users_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('transPenHasStatusPenjualans.index') !!}" class="btn btn-default">Cancel</a>
</div>
