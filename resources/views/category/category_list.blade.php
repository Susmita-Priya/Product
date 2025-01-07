@extends('master')

@section('content')
    @push('title')
        <title>Add category</title>
    @endpush

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title float-left">Add category</h4>

                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="{{ route('index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('category.index') }}">category</a></li>
                            <li class="breadcrumb-item active">Add category</li>
                        </ol>

                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categorys as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td>
                                <a href="{{ route('category.edit', $category->id) }}">Edit</a>
                                <a href="{{ route('category.delete', $category->id) }}">Delete</a>
                            </td>
                            <td>
                                <!-- Additional actions like edit/delete -->
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
            