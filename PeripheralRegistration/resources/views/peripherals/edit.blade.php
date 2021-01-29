<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
@extends('layouts.app')
@section('content')
    <div class="container-md">
        <div class="card sm-12 mb-4 shadow-sm mx-lg-5">
            <div class="card-header">
                <h4 class="my-0 fw-normal">Edit The Record</h4>
            </div>
            <div class="card-body" style>
                <form method="POST" action="{{'/peripherals/'.$data->id}}">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="col-12">
                        <div class="row mb-3 mx-auto">
                            <div class="col-2 offset-md-3">
                                <label for="user_id" class="mt-2">Name</label>
                            </div>
                            <div class="col-4">
                                <select id="user_id" name="user_id" class="form-select overflow-auto">
                                    <option selected disabled>Choose an owner</option>
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="row mb-3 mx-auto">
                            <div class="col-2 offset-md-3">
                                <label for="product_name" class="mt-2">Product name</label>
                            </div>
                            <div class="col-4">
                                <input type="text" class="form-control" name="name" id="product_name" placeholder="{{$data->name}}">
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="row mb-3 mx-auto">
                            <div class="col-2 offset-md-3">
                                <label for="vendor" class="mt-2">Vendor</label>
                            </div>
                            <div class="col-4">
                                <input type="text" class="form-control" id="vendor" name="vendor" placeholder="{{$data->vendor}}">
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="row mb-3 mx-auto">
                            <div class="col-2 offset-md-3">
                                <label for="type" class="mt-2">Type</label>
                            </div>
                            <div class="col-4">
                                <input type="text" class="form-control" id="type" name="type" placeholder="{{$data->type}}">
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="row mb-3 mx-auto">
                            <div class="col-2 offset-md-3">
                                <label for="serial_number" class="mt-2">Serial number</label>
                            </div>
                            <div class="col-4">
                                <input type="text" class="form-control" id="serial_number" name="serial_number" placeholder="{{$data->serial_number}}">
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="row mb-3 mx-auto">
                            <div class="col-2 offset-md-3">
                                <label for="sku" class="mt-2">sku</label>
                            </div>
                            <div class="col-4">
                                <input type="text" class="form-control" id="sku" name="sku" placeholder="{{$data->sku}}">
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="row mb-3 mx-auto">
                            <div class="col-2 offset-md-3">
                                <label for="ean" class="mt-2">ean</label>
                            </div>
                            <div class="col-4">
                                <input type="text" class="form-control" id="ean" name="ean" placeholder="{{$data->ean}}">
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="row mb-3 mx-auto">
                            <div class="col-2 offset-md-3">
                                <label for="max_id" class="mt-2">Max id</label>
                            </div>
                            <div class="col-4">
                                <input type="number" class="form-control" id="max_id" name="max_id" placeholder="{{$data->max_id}}">
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="row mb-3 mx-auto">
                            <div class="col-2 offset-md-3">
                                <label for="internal_number" class="mt-2">Internal number</label>
                            </div>
                            <div class="col-4">
                                <input type="text" class="form-control" id="internal_number" name="internal_number" placeholder="{{$data->internal_number}}">
                            </div>
                        </div>
                    </div>

                    <div class="offset-4 ps-4">
                        <button type="submit" class="btn btn-primary w-25 text-white">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
