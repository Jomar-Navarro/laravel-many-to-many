@extends('layouts.admin')

@section('content')

<h1>Dashboard Home</h1>

    <div class="container">
        <h1>Sono presenti {{ $count }} progetti.</h1>

        <h3>Last Project</h3>
        <p>{{ $last_project->title }}</p>
        <p>{{ $last_project->description }}</p>
    </div>

@endsection
