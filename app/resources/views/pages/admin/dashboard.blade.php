<?php
/**
 * @var \Illuminate\Support\Collection $registrations
 * @var array $load
 */
?>

@extends('layouts.master')

@section('page-header', 'Dashboard')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <div class="col-sm-6">
                    <div class="info-box">
                        @php($color = $registrations->count() > 0 ? 'aqua' : 'green')
                        <span class="info-box-icon bg-{{ $color }}">
                            <i class="fa fa-group"></i>
                        </span>
                        <div class="info-box-content">
                            <div class="info-box-text">Nieuwe registraties</div>
                            <div class="info-box-number">
                                {{ $registrations->count() }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="info-box">
                        @php($color = $load[0] >= 4 ? 'red' : ($load[0] >= 2 ? 'orange' : 'green'))
                        <span class="info-box-icon bg-{{ $color }}">
                            <i class="fa fa-dashboard"></i>
                        </span>
                        <div class="info-box-content">
                            <div class="info-box-text">CPU Load</div>
                            <div class="info-box-number">
                                {{ $load[0] }} <small>{{ $load[1] }} {{ $load[2] }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Nieuwe registraties</h3>
                </div>
                <div class="box-body">
                    @if (!$registrations->isEmpty())
                        <table class="table">
                            <colgroup>
                                <col>
                                <col width="200">
                            </colgroup>
                            <thead>
                            <tr>
                                <th>Gebruiker</th>
                                <th>Wanneer</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($registrations as $registration)
                                <?php /** @var \App\Models\Registration $registration */ ?>
                                <tr>
                                    <td><a href="{{ route('admin.registrations.show', $registration) }}">{{ $registration->username }}</a></td>
                                    <td>
                                        <abbr title="{{ $registration->created_at }}">{{ $registration->created_at->diffForHumans() }}</abbr>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>Geen nieuwe registraties</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
