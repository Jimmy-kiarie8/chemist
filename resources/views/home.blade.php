@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <img src="{{ asset('storage/app/public' . str_replace('public','','')) }}" alt="{{ $ad->name }}" class="img-responsive img-thumbnail" height="200" width="200">You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

