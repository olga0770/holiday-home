@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Holiday Homes!</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    List of all homes.

                    <table>
                        @foreach ($homes as $home)
                            <tr><td>{{ $home->city}}</td></tr>
                        @endforeach
                    </table>

{{--                    {{ $homes->links() }}--}}

                    <a href="/home-ads/create">Create Home Advertisement!</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
