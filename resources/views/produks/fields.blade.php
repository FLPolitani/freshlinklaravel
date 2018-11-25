<!-- Nama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama', 'Nama:') !!}
    {!! Form::text('nama', null, ['class' => 'form-control']) !!}
</div>

<!-- Jenis Produk Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jenis_produk_id', 'Jenis Produk Id:') !!}
    {!! Form::select('jenis_produk_id', $jenisProduk, ['class' => 'form-control']) !!}
</div>

<!-- Satuan Terkecil Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('satuan_terkecil_id', 'Satuan Terkecil Id:') !!}
    {!! Form::select('satuan_terkecil_id', $satuanTerkecil, ['class' => 'form-control']) !!}
</div>

<!-- Kategori Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kategori_id', 'Kategori Id:') !!}
    {!! Form::select('kategori_id', $kategori, ['class' => 'form-control']) !!}
</div>

<!-- Keterangan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('keterangan', 'Keterangan:') !!}
    {!! Form::text('keterangan', null, ['class' => 'form-control']) !!}
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

<!-- Foto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('foto', 'Foto:') !!}
    {!! Form::file('foto', null, ['class' => 'form-control']) !!}
    <br \>
    <img id="cropfoto" src="{{isset($produks->foto)?file_exists( public_path() . '/' . $produks->foto)?asset($produks->foto):asset('assets/images/no-image.png'):asset('assets/images/no-image.png')}}" alt="your image"  width="200" height="200"  />
    {{ Form::hidden('foto', isset($produks->foto)?file_exists( public_path() . '/' . $produks->foto)?$produks->foto:'':'') }}

    <script type="text/javascript">
        function readFoto(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#cropfoto').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#foto").change(function(){
            readFoto(this);
        });
    </script>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('produks.index') !!}" class="btn btn-default">Cancel</a>
</div>
