@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Post Your Home Advertisement!</div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                <li> File is too large.</li>
                                @foreach ($errors as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="/home-ads/{{$id}}" method="post" enctype="multipart/form-data">
                        @method('PUT')

                        @csrf

                        <label>City
                            <input name="city" type="text" value="{{$city}}">
                        </label>
                        <label>Country
                            <input name="country" type="text" value="{{$country}}">
                        </label>
                        <label>Postal Code
                            <input name="postal_code" type="text" value="{{$postal_code}}">
                        </label>

                        @if (!empty($image_name))
                            <img class="img-responsive" src="{{URL::to('/storage/images/')}}/{{$image_name}}" alt="a picture of the holiday home"/>
                        @endif

                        <input type="file" name="home_picture">

                        <button type="submit">Edit</button>


                    </form>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
