@extends('layouts.app')

@section('content')
    {{-- @if (Session::has('success'))
        <div class="col-lg-5">
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <i class="fa fa-check-circle-o mr-2" aria-hidden="true"></i> {{ Session::get('success') }}
            </div>
        </div>
    @elseif (Session::has('danger'))
        <div class="col-lg-5">
            <div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <i class="fa fa-check-circle-o mr-2" aria-hidden="true"></i> {{ Session::get('danger') }}
            </div>
        </div>
    @endif --}}
    <div class="container">
        <div class="row">


            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Recipient:</label>
                                    <input type="text" class="form-control" id="recipient-name">
                                </div>
                                <div class="mb-3">
                                    <label for="message-text" class="col-form-label">Message:</label>
                                    <textarea class="form-control" id="message-text"></textarea>
                                </div>
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Open this select menu</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel1">Add Category</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('category.category_store') }}" method="POST" enctype="multipart/form-data">
                            <div class="modal-body">

                                @csrf
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Category Name:</label>
                                    <input type="text" class="form-control" name="category_name">
                                </div>


                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <div class="col-md-4">
                <h1>Add Product</h1>

                <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="name">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Category</label>
                            <select class="form-control" name="Category_id" aria-label="Default select example">
                                <option value="">Select Category</option>
                                @foreach ($category as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach


                            </select>

                        </div>


                    </div>
                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label for="inputPassword4">price</label>
                            <input type="text" class="form-control" name="price" placeholder="price">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Qty</label>
                            <input type="text" class="form-control" name="qty" placeholder="qty">
                        </div>

                    </div>


                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck">
                            <label class="form-check-label" for="gridCheck">
                                Check me out
                            </label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Sign in</button>
                </form>
            </div>
            
            <div class="col-md-4">

                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1">
                    Add Category
                </button>

                <!-- Category List Heading -->
                <h5 class="mt-3">Category List</h5>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($category as $key => $item)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{ $item->name }}</td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

            <div class="col-md-4">
                <h1>Product List</h1>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Qty</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($product as $key => $item)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->category->name ?? '' }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->qty }}</td>
                                {{-- <td> <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        Launch demo modal
                                    </button></td> --}}
                                
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

            <div class="col-md-4">
                <h1>Add Product</h1>

                <form action="{{ route('purchase') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                       

                        <div class="form-group col-md-6">
                            <label for="inputEmail4">product</label>
                            <select class="form-control" name="product_name" aria-label="Default select example">
                                <option value="">Select prodcut</option>
                                @foreach ($product as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach


                            </select>

                        </div>


                    </div>
                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Qty</label>
                            <input type="text" class="form-control" name="qty" placeholder="qty">
                        </div>

                    </div>


                   
                    <button type="submit" class="btn btn-primary">submit</button>
                </form>
            </div>
            
            
        </div>
        <!-- Button trigger modal -->
    @endsection
