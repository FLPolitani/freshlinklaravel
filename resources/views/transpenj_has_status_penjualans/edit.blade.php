@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Transpenj Has Status Penjualan
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($transpenjHasStatusPenjualan, ['route' => ['transpenjHasStatusPenjualans.update', $transpenjHasStatusPenjualan->id], 'method' => 'patch']) !!}

                        @include('transpenj_has_status_penjualans.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection