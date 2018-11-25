@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Status Penjualan
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($statusPenjualan, ['route' => ['statusPenjualans.update', $statusPenjualan->id], 'method' => 'patch']) !!}

                        @include('status_penjualans.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection