@extends('adminlte::page')

@section('title', 'Epics - Customers')

@section('content_header')
    @include('layouts.includes._messages')
    <div class="row">
        <div class="col-6">
            <h1 class="m-0 text-dark">Avatar Upload</h1>
        </div>
        <div class="col-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Start</a></li>
              <li class="breadcrumb-item"><a href="{{ route('customer.index') }}">Customers</a></li>
              <li class="breadcrumb-item active">Avatar</li>
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
                        <form action="{{ route('customer.avatar.store', 1) }}" method="POST" enctype="multipart/form-data" id="selfie">
                            {{ csrf_field() }}
                            <input type="file" accept="image/*" name="avatar" capture="camera">
                            <button class="" type="submit">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
