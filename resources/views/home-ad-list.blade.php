@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Holiday Homes for Rent!</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table>
                        <tr>
                            <th>City</th>
                            <th>Country</th>
                            <th>Postal Code</th>
                        </tr>
                        @foreach ($homes as $home)
                            <tr>
                                <td>{{ $home->city}}</td>
                                <td>{{ $home->country}}</td>
                                <td>{{ $home->postal_code}}</td>
                            </tr>
                        @endforeach
                    </table>

                    {{ $homes->links() }}

                    <a href="/home-ads/create">Create Home Advertisement!</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
