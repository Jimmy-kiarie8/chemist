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
Lorem, ipsum dolor sit amet consectetur adipisicing elit. Corrupti doloremque, blanditiis, saepe aspernatur qui delectus, iste numquam corporis unde ex eveniet nesciunt quae cumque fuga animi. Labore dolores laudantium placeat.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

