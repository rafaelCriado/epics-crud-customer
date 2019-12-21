@extends('adminlte::page')

@section('title', 'Epics - Customers')

@section('content_header')
    @include('layouts.includes._messages')
    <div class="row">
        <div class="col-6">
        <h1 class="m-0 text-dark"> Customer <small>#{{$customer->id}} </small></h1>
        </div>
        <div class="col-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Start</a></li>
              <li class="breadcrumb-item"><a href="{{ route('customer.index') }}">Customers</a></li>
              <li class="breadcrumb-item active">{{$customer->name}}</li>
            </ol>
          </div>
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">
            @include('dashboard.customer.informations.data')
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            @include('dashboard.customer.informations.addresses')
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 text-left">
            <form class="m-0 p-0" action="{{ route('customer.delete', $customer->id) }}" method="post">
                {!! csrf_field() !!}
                <input type="hidden" name="_method" value="delete" />

                <a class="btn btn-info" href="{{ route('customer.update', $customer->id) }}">Edit</a>
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>


@stop
