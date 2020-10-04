@extends('layouts.app')

@section('content')
<div class="container">
{{-- justify-content-center --}}
    <div class="row ">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a href="#">{{ $thread->creator->name }}</a> posted {{ $thread->title }}    
                </div>

                <div class="card-body">
                    {{ $thread->body }}
                </div>
            </div>

            @foreach($replies as $reply)
                @include('threads.reply')            
            @endforeach
            <div class="mt-3" >
                {{ $replies->links() }}
            </div>
            @if(auth()->check())
                <form method="POST" action="{{ $thread->path() . '/replies' }}" class="mt-3" >
                    <div class="form-group">
                        <textarea 
                            style="width: 100%;" 
                            name="body" 
                            id="body" 
                            placeholder="Have something to say?" 
                        ></textarea>
                    </div>
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-success" style="float: right;" >Post</button>
                </form>
            @else 
                <p class="text-center pt-3" >Please <a href="{{ route('login') }}">sign in</a> to leave a comment! </p>
            @endif
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <p>
                        This thread was published {{ $thread->created_at->diffForHumans() }}
                        by <a href="#">{{ $thread->creator->name }}</a>, and currently has
                        {{ $thread->replies_count }} {{ Str::plural('comment', $thread->replies_count) }}.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
