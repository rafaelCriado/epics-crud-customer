@extends('adminlte::page')

@section('title', 'Epics - Customers')

@section('content_header')
    @include('layouts.includes._messages')
    <div class="row">
        <div class="col-6">
            <h1 class="m-0 text-dark">Edit Customer</h1>
        </div>
        <div class="col-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Start</a></li>
              <li class="breadcrumb-item"><a href="{{ route('customer.index') }}">Customers</a></li>
              <li class="breadcrumb-item active">Edit Customer</li>
            </ol>
          </div>
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="container-fluid">
                        @include('dashboard.customer.avatar.component')
                        <form action="{{ route('customer.save', $customer->id) }}" method="POST">
                            <input type="hidden" name="_method" value="PUT">
                            {!! csrf_field() !!}

                            @include('dashboard.customer._form')
                            @include('dashboard.customer._formAddress')
                            <button class="btn btn-success float-right" type="submit">Save</button>
                          </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
