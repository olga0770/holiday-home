@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Post Your Home Advertisement!</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="/home-ads" method="post">

                        @csrf

                        <label for="city">City</label>
                        <input id="city" name="city" type="text">

                        <button type="submit">Post</button>


                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
