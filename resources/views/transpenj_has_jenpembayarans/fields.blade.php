<!-- Transaksi Penjualans Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('transaksi_penjualans_id', 'Transaksi Penjualans Id:') !!}
    {!! Form::number('transaksi_penjualans_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Jenis Pembayarans Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jenis_pembayarans_id', 'Jenis Pembayarans Id:') !!}
    {!! Form::number('jenis_pembayarans_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('transpenjHasJenpembayarans.index') !!}" class="btn btn-default">Cancel</a>
</div>
