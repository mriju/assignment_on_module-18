@extends('layouts.master')

@section('content')
    <div class="col-md-12">
        @foreach ($categories as $category)
        <div class="card mb-5">
            <div class="card-header">
                <h2>{{ $category->name }}</h2>
            </div>
            <div class="card-body">
                @if ($category->latestPost)
                    <h3>{{ $category->latestPost->title }}</h3>
                    <p>{{ $category->latestPost->description }}</p>
                @else
                    <p>No posts found for this category.</p>
                @endif
            </div>
        </div>
        @endforeach
    </div>

@endsection

