@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if($user = Auth::user())
                      @isset($user)
                        <p>albums is not empty</p>
                        {{$user}}
                        <a href="{{ route('albums.all') }}">Show albums</a>


                      @endisset
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
