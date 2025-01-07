@extends('master')

@section('content')
    @push('title')
        <title>Add Product</title>
    @endpush

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title float-left">Add Product</h4>

                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="{{ route('index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('product.index') }}">product</a></li>
                            <li class="breadcrumb-item active">Add product</li>
                        </ol>

                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card-box">
                        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <label for="name">Product Name:</label>
                            <input type="text" name="name" id="name" required>

                            <label for="category">Product Category:</label>
                            <select name="category_id" id="category" required>
                                <option value="">Select a category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                            </select>

                            <div id="options">
                                <h4>Options:</h4>
                                <div class="option">
                                    <input type="text" name="options[0][name]" placeholder="Option Name" required>
                                    <input type="file" name="options[0][image]" required>
                                    <input type="number" name="options[0][price]" placeholder="Price" required>
                                    <button type="button" class="remove-option">Remove</button>
                                </div>
                            </div>
                            <button type="button" id="add-option">Add Option</button>

                            <button type="submit">Save Product</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        let optionIndex = 1;
        $('#add-option').click(function() {
            $('#options').append(`
                <div class="option">
                    <input type="text" name="options[${optionIndex}][name]" placeholder="Option Name" required>
                    <input type="file" name="options[${optionIndex}][image]" required>
                    <input type="number" name="options[${optionIndex}][price]" placeholder="Price" required>
                    <button type="button" class="remove-option">Remove</button>
                </div>
            `);
            optionIndex++;
        });

        $(document).on('click', '.remove-option', function() {
            $(this).parent().remove();
        });
    </script>
    
@endsection
