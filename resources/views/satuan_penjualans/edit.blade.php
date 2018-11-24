@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Satuan Penjualan
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($satuanPenjualan, ['route' => ['satuanPenjualans.update', $satuanPenjualan->id], 'method' => 'patch']) !!}

                        @include('satuan_penjualans.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection