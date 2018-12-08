@extends('layouts.app') 
@section('content')
<my-nav></my-nav>
<transition name="fade">
    <router-view></router-view>
</transition>
<my-footer></my-footer>
@endsection