@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Trans Pen Has Jen Pembayarans</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('transPenHasJenPembayarans.create') !!}">Add New</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('trans_pen_has_jen_pembayarans.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

