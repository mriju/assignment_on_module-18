@extends('layouts.master')

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex">
                            <h4>All Category</h4>
                        </div>

                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered border-dark table-sm">
                    <thead style="background: #f2f2f2">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Category</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($categories as $category)
                        <tr>
                            <th scope="row">{{ $category->id }}</th>
                            <td>{{ $category->name }}</td>
                            <td><a class="btn btn-warning mx-1" href="{{ route('categories.getCategoryById', $category->id) }}">Post Count by {{ $category->name }}</a></td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">Data not found</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
