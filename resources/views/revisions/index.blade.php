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
                                <td>Revision ID</td>
                                <td>Post Name</td>
                                <td>Title</td>
                                <td>Content</td>
                                <td>Created at</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($revisions as $revision)
                                <tr>
                                    <td>{{$revision->id}}</td>
                                    <td><a href="{{ route('posts.show',$revision->post->id)}}">{{$revision->post_name}}</a></td>
                                    <td>{{$revision->title}}</td>
                                    <td>{{$revision->content}}</td>
                                    <td>{{$revision->created_at}}</td>
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