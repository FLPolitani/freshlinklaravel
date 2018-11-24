@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Trans Pen Has Status Penjualan
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'transPenHasStatusPenjualans.store']) !!}

                        @include('trans_pen_has_status_penjualans.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
