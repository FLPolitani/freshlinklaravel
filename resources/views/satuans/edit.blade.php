@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Satuan
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($satuan, ['route' => ['satuans.update', $satuan->id], 'method' => 'patch']) !!}

                        @include('satuans.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection