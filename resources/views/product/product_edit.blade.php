@extends('master')

@section('content')
    @push('title')
        <title>Edit Product</title>
    @endpush

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title float-left">Edit Product</h4>

                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="{{ route('index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Product</a></li>
                            <li class="breadcrumb-item active">Edit Product</li>
                        </ol>

                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card-box">
                        <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="name" class="col-form-label">Name</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        value="{{ $product->name }}" placeholder="Enter Product Name">
                                    <span class="text-danger">
                                        @error('name')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="category" class="col-form-label">Product Category:</label>
                                    <div class="input-group">
                                        <select name="category_id" class="form-control" id="category" required>
                                            <option value="">Select a category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <span class="text-danger">
                                        @error('category_id')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-12" id="options">
                                    <h4>Options:</h4>
                                    @foreach ($product->options as $index => $option)
                                        <div class="option">
                                            <label for="name" class="col-form-label">Name</label>
                                            <input type="text" class="form-control" name="options[{{ $index }}][name]"
                                                value="{{ $option->name }}" placeholder="Option Name" required>
                                            <label for="file" class="col-form-label">Image</label>
                                            <input type="file" class="form-control" name="options[{{ $index }}][image]">
                                            <label for="price" class="col-form-label">Price</label>
                                            <input type="number" class="form-control" name="options[{{ $index }}][price]"
                                                value="{{ $option->price }}" placeholder="Price" required>
                                            <br>
                                            <button type="button" class="remove-option btn btn-danger">Remove</button>
                                        </div>
                                    @endforeach
                                </div>
                                <button type="button" id="add-option" class="btn btn-primary">Add Option</button>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-12 text-right">
                                    <button type="submit" class="btn waves-effect waves-light btn-sm greenbtn">Save
                                        Product</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        let optionIndex = {{ $product->options->count() }};
        $('#add-option').click(function() {
            $('#options').append(`
                <div class="option">
                    <label for="name" class="col-form-label">Name</label>
                    <input type="text" class="form-control" name="options[${optionIndex}][name]" placeholder="Option Name" required>
                    <label for="file" class="col-form-label">Image</label>
                    <input type="file" class="form-control" name="options[${optionIndex}][image]" required>
                    <label for="price" class="col-form-label">Price</label>
                    <input type="number" class="form-control" name="options[${optionIndex}][price]" placeholder="Price" required>
                    <br>
                    <button type="button" class="remove-option btn btn-danger">Remove</button>
                </div>
            `);
            optionIndex++;
        });

        $(document).on('click', '.remove-option', function() {
            $(this).parent().remove();
        });
    </script>
@endsection