@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Posts</div>

                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <td>Category</td>
                                <td>Name</td>
                                <td>Title</td>
                                <td>Content</td>
                                <td>Tags</td>
                                <td>Posted at</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{$post->category->name}}</td>
                                    <td><a href="{{ route('posts.show',$post->id)}}">{{$post->name}}</a></td>
                                    <td>{{$post->title}}</td>
                                    <td>{{$post->content}}</td>
                                    <td>
                                        @foreach($post->tags as $tag)
                                            {{ $tag->name }}&nbsp;
                                        @endforeach
                                    </td>
                                    <td>{{$post->posted_at}}</td>
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