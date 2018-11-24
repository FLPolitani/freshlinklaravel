<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::number('user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Nama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama', 'Nama:') !!}
    {!! Form::text('nama', null, ['class' => 'form-control']) !!}
</div>

<!-- Jenis Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jenis', 'Jenis:') !!}
    {!! Form::text('jenis', null, ['class' => 'form-control']) !!}
</div>

<!-- Kontak Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kontak', 'Kontak:') !!}
    {!! Form::text('kontak', null, ['class' => 'form-control']) !!}
</div>

<!-- Alamat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('alamat', 'Alamat:') !!}
    {!! Form::text('alamat', null, ['class' => 'form-control']) !!}
</div>

<!-- Npwp Usaha Field -->
<div class="form-group col-sm-6">
    {!! Form::label('npwp_usaha', 'Npwp Usaha:') !!}
    {!! Form::text('npwp_usaha', null, ['class' => 'form-control']) !!}
</div>

<!-- Scan Npwp Field -->
<div class="form-group col-sm-6">
    {!! Form::label('scan_npwp', 'Scan Npwp:') !!}
    {!! Form::text('scan_npwp', null, ['class' => 'form-control']) !!}
</div>

<!-- Nomor Siup Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nomor_siup', 'Nomor Siup:') !!}
    {!! Form::text('nomor_siup', null, ['class' => 'form-control']) !!}
</div>

<!-- Scan Siup Field -->
<div class="form-group col-sm-6">
    {!! Form::label('scan_siup', 'Scan Siup:') !!}
    {!! Form::text('scan_siup', null, ['class' => 'form-control']) !!}
</div>

<!-- Nomor Situ Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nomor_situ', 'Nomor Situ:') !!}
    {!! Form::text('nomor_situ', null, ['class' => 'form-control']) !!}
</div>

<!-- Scan Situ Field -->
<div class="form-group col-sm-6">
    {!! Form::label('scan_situ', 'Scan Situ:') !!}
    {!! Form::text('scan_situ', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('dataUsahas.index') !!}" class="btn btn-default">Cancel</a>
</div>
