@extends('layouts.master')

@section('page-header', 'Nieuwe registratie')

@section('content')
    <form class="form-horizontal" action="{{ route('admin.registrations.store') }}" method="post" role="form">
        {!! csrf_field() !!}

        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Gegevens</h3>
            </div>
            <div class="box-body">

                <div class="form-group">
                    <label for="username" class="col-sm-3 control-label">In-game naam <span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                        <input type="text" name="username" class="form-control" placeholder="In-game naam" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">Email <span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                    </div>
                </div>

            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Aanmaken</button>
            </div>
        </div>
    </form>
@endsection