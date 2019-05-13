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

                        <label>City
                            <input name="city" type="text">
                        </label>
                        <label>Country
                            <input name="country" type="text">
                        </label>

                        <button type="submit">Post</button>


                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
