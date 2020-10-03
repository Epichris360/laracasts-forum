@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create a new thread</div>

                <div class="card-body">
                    <form method="POST" action="/threads">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="body">Body</label>
                        <textarea name="body" id="body" rows="8" style="width: 100%;" class="form-control" ></textarea>    
                        </div>

                        <button type="submit" class="btn btn-primary" style="float: right;" >Publish</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
