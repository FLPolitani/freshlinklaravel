@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Transpenj Has Jenpembayaran
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($transpenjHasJenpembayaran, ['route' => ['transpenjHasJenpembayarans.update', $transpenjHasJenpembayaran->id], 'method' => 'patch']) !!}

                        @include('transpenj_has_jenpembayarans.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection