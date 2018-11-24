@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Trans Pen Has Jen Pembayaran
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'transPenHasJenPembayarans.store']) !!}

                        @include('trans_pen_has_jen_pembayarans.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
