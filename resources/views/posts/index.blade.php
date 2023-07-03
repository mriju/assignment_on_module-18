@extends('layouts.master')

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex">
                            <h4>All Posts</h4>
                            @if($softDeletedPosts)
                            <a class="btn btn-warning mx-1" href="{{ route('posts.trashed') }}">Trashed</a>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered border-dark table-sm">
                    <thead style="background: #f2f2f2">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col" style="width: 20%">Title</th>
                        <th scope="col" style="width: 60%">Description</th>
                        <th scope="col" style="width: 10%">Category</th>
                        <th scope="col" style="width: 10%">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($posts as $post)
                        <tr>
                            <th scope="row">{{ $post->id }}</th>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->description }}</td>
                            <td>{{ $post->category->name }}</td>
                            <td>
                                <form method="post" action="{{ route('posts.destroy', $post->id) }}">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
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
