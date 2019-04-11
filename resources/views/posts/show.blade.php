@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><a href="{{route('posts.index')}}">Posts</a>  {{ $post->title }}</div>

                    <div class="card-body">
                        <h3>Tags</h3>
                        <div>
                            @foreach($post->tags as $tag)
                                {{ $tag->name }}&nbsp;
                            @endforeach
                        </div>

                        <h3>Content</h3>

                        <div>
                            {{ $post->content  }}
                        </div>

                        <h3>Comments</h3>
                            @foreach($post->comments as $comment)
                            {{ $comment->author }}
                            <div>
                                {{ $comment->body }}<br/>
                                {{ $comment->created_at }}
                            </div>
                            @endforeach
                        </div>

                        <h3>Revisions</h3>
                        @foreach($post->revisions as $revision)
                        <div>
                            Title: {{ $revision->title }}<br/>
                            {{ $revision->content }}<br/>
                            {{ $revision->created_at }}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection