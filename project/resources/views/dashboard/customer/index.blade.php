@extends('adminlte::page')

@section('title', 'Epics - Customers')

@section('content_header')
    @include('layouts.includes._messages')
    <div class="row">
        <div class="col-6">
            <h1 class="m-0 text-dark">Customers</h1>
        </div>
        <div class="col-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Start</a></li>
              <li class="breadcrumb-item active">Customers</li>
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
                        @isset($search)
                            <div class="row">
                                <h4>Search for: {{$search}}</h4>
                            </div>
                        @endisset
                    </div>

                    @if(count($customers) > 0)
                        <div class="row">
                            <div class="col-12">
                                <a class="btn btn-sm btn-outline-success mb-2" href="{{ route('customer.insert') }}">+ Customer</a>
                            </div>
                        </div>
                    @endif

                    {{-- Customer's table --}}
                    <div class="row">
                        <div class="col-12">
                            @if(count($customers) <= 0)
                                <center>
                                    No registered customers
                                    <br>
                                    <a class="btn btn-sm btn-outline-success mb-2" href="{{ route('customer.insert') }}">Add a customer</a>
                                </center>
                            @else
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nome</th>
                                                <th>Email</th>
                                                <th>Status</th>
                                                <th></th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach($customers as $customer)
                                            <tr>
                                                <td>
                                                    @if(isset($customer->avatar))
                                                        <img src="{{ route('image.show', $customer->avatar->name) }}" height="50" width="50" class="rounded-circle hvrbox-layer_bottom">
                                                    @else
                                                        <img src="{{ asset('images/user_default.jpeg') }}" height="50" width="50" class="rounded-circle hvrbox-layer_bottom">
                                                    @endif
                                                </td>
                                                <td><a href="{{ route('customer.show', $customer->id) }}" >{{ $customer->name}}</a></td>
                                                <td>{{ $customer->email}}</td>
                                                <td>

                                                <form action="{{ route('customer.change_status', $customer->id) }}" method="post">
                                                    <input type="hidden" name="_method" value="PUT">
                                                    {!! csrf_field() !!}
                                                    <button class="m-0 p-0" style="background: none; border:0">
                                                        <span class="badge badge-{{ $customer->status == 'Ativo'? 'success':'danger' }}">
                                                            {{ $customer->status }}
                                                        </span>
                                                    </button>
                                                </form>
                                                </td>
                                                <td>
                                                    <a class="btn btn-sm btn-info" href="{{ route('customer.update', $customer->id) }}">Edit</a>
                                                    <a class="btn btn-sm btn-danger" href="javascript:void(0)" onclick="carregarModal({{$customer}})" data-toggle="modal" data-target="#exampleModal" >Delete</a>
                                                </td>
                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete <span id="modalName"></span></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                Do you really want to delete this item?
            </div>
            <div class="modal-footer">
                <form id="formDelete" data-url="{{ url('/admin/customer') }}" class="m-0 p-0" action="1" method="POST">
                    {!! csrf_field() !!}
                    <input type="hidden" name="_method" value="DELETE" />
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" id="btnDelete" class="btn btn-danger">Delete</button>
                </form>

            </div>
        </div>
        </div>
    </div>

    <script>
        function carregarModal(customer){
            let form = document.getElementById('formDelete');
            let action = `${form.getAttribute('data-url')}/${customer.id}`;

            form.action = action;
            document.getElementById('modalName').innerText = customer.name;
        }
    </script>
@stop


