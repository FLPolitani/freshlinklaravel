@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Trans Pen Has Jen Pembayaran
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('trans_pen_has_jen_pembayarans.show_fields')
                    <a href="{!! route('transPenHasJenPembayarans.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
