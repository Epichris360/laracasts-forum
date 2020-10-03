@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a href="#">{{ $thread->creator->name }}</a> posted {{ $thread->title }}    
                </div>

                <div class="card-body">
                    {{ $thread->body }}
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach($thread->replies as $reply)
                @include('threads.reply')            
            @endforeach
        </div>
    </div>
    @if(auth()->check())
        <div class="row justify-content-center" style="padding-top: 2rem;" >
            <div class="col-md-8">
                <form method="POST" action="{{ $thread->path() . '/replies' }}">
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
            </div>
        </div> 
    @else 
        <p class="text-center pt-3" >Please <a href="{{ route('login') }}">sign in</a> to leave a comment! </p>
    @endif
</div>
@endsection
