@extends('layouts.app')
@section('content')
<h2>Modifier un agent</h2>

<form action="{{ route('agents.update', $agent->id_agent) }}" method="POST">
    @method('PUT')
    @include('agents.form')
</form>
@endsection
