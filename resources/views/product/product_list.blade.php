@extends('master')

@section('content')
    @push('title')
        <title>Product List</title>
    @endpush

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title float-left">Product List</h4>

                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="{{ route('index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('product.index') }}">product</a></li>
                            <li class="breadcrumb-item active">Product List</li>
                        </ol>

                        <div class="clearfix">

                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card-box">
                        <h4 class="header-title m-b-15 m-t-0">Product List</h4>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="text-right m-b-20">

                                    <button type="button" class="btn waves-effect waves-light greenbtn"
                                        onclick="window.location.href='{{ route('category.create') }}'">
                                        <i class="mdi mdi-plus m-r-5"></i> Add Product
                                    </button>


                                </div>
                            </div>
                        </div>
 
            <table class="table table-hover m-0 tickets-list table-actions-bar dt-responsive nowrap"
            cellspacing="0" width="100%" id="datatable">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Options</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>
                                <ul>
                                    @foreach($product->options as $option)
                                        <li>
                                            <img src="{{ asset('storage/' . $option->image_path) }}" alt="Option Image" width="50">
                                            {{ $option->name }} - ${{ $option->price }}
                                            <button data-id="{{ $option->id }}" class="add-to-cart">Add to Cart</button>
                                            <button data-id="{{ $option->id }}" class="remove-from-cart">Remove from Cart</button>
                                        </li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>
                                <!-- Additional actions like edit/delete -->
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
            <script>
                $('.add-to-cart').click(function () {
                    const optionId = $(this).data('id');
                    $.post("{{ route('cart.add') }}", { _token: '{{ csrf_token() }}', option_id: optionId }, function (response) {
                        alert(response.message);
                    });
                });
            
                $('.remove-from-cart').click(function () {
                    const optionId = $(this).data('id');
                    $.post("{{ route('cart.remove') }}", { _token: '{{ csrf_token() }}', option_id: optionId }, function (response) {
                        alert(response.message);
                    });
                });
            </script>
        </div>
    </div>
@endsection
            