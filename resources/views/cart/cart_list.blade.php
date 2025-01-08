@extends('master')

@section('content')
    @push('title')
        <title>Cart List</title>
    @endpush

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title float-left">Cart List</h4>

                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="{{ route('index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('cart.index') }}">Cart</a></li>
                            <li class="breadcrumb-item active">Cart List</li>
                        </ol>

                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card-box">
                        <h4 class="header-title m-b-15 m-t-0">Cart List</h4>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="text-right m-b-20">
                                    <button type="button" class="btn waves-effect waves-light greenbtn"
                                        onclick="window.location.href='{{ route('product.index') }}'">
                                        <i class="mdi mdi-plus m-r-5"></i> Add More Products
                                    </button>
                                </div>
                            </div>
                        </div>

                        <table class="table table-hover m-0 tickets-list table-actions-bar dt-responsive nowrap"
                            cellspacing="0" width="100%" id="datatable">
                            <thead>
                                <tr>
                                    <th>Option Image</th>
                                    <th>Option Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                  
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cartItems as $item)
                                    <tr>
                                        <td>
                                            @if ($item->productOption)
                                                <img src="{{ asset($item->productOption->image_path) }}" alt="Option Image"
                                                    width="100">
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                        <td>{{ $item->productOption->name ?? 'N/A' }}</td>
                                        <td>{{ $item->productOption->price ?? 'N/A' }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
