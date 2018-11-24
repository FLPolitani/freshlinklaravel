@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Purchase Order
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($purchaseOrder, ['route' => ['purchaseOrders.update', $purchaseOrder->id], 'method' => 'patch']) !!}

                        @include('purchase_orders.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection