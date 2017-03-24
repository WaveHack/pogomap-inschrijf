@extends('layouts.master')

@section('page-header', ('Admin ' . $user->name))

@section('content')
    <div class="row">
        <div class="col-sm-6">

            <div class="box">
                <div class="box-header with-title">
                    <h3 class="box-title">Algemene Informatie</h3>
                </div>
                <div class="box-body">
                    <div class="row form-group">
                        <div class="col-sm-6"><strong>Naam:</strong></div>
                        <div class="col-sm-6">{{ $user->name }}</div>
                    </div>

                    <div class="row form-group">
                        <div class="col-sm-6"><strong>Email:</strong></div>
                        <div class="col-sm-6">{{ $user->email}}</div>
                    </div>
                </div>
            </div>

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Acties</h3>
                </div>
                <div class="box-body">
                    todo
                </div>
            </div>

        </div>
        <div class="col-sm-6">

            {{-- todo --}}

        </div>
    </div>
@endsection
