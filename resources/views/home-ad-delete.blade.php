@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Delete Home Advertisement</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="/home-ads/{{$id}}" method="post">
                        @method('DELETE')

                        @csrf

                        <label>Id
                            <input readonly name="id" type="text" value="{{$id}}">
                        </label>
                        <label>City
                            <input readonly name="city" type="text" value="{{$city}}">
                        </label>
                        <label>Country
                            <input readonly name="country" type="text" value="{{$country}}">
                        </label>
                        <label>Postal Code
                            <input readonly name="postal_code" type="text" value="{{$postal_code}}">
                        </label>

                        <button type="submit">Delete!</button>


                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
