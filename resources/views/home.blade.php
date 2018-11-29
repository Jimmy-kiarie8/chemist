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
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad atque fugiat possimus debitis enim rerum quas, dolorem consectetur nihil non, quaerat, earum quo et! Reiciendis consequuntur nam dignissimos debitis optio!
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
