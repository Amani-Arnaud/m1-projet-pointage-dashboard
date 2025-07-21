@extends('layouts.app')
@section('content')
<h2>Ajouter un agent</h2>
<form action="{{ route('agents.store') }}" method="POST">
    @include('agents.form')
</form>
@endsection
