@extends('layouts.admin')

@section('content')

<div class="container my-3 p-5 bg-dark-subtle rounded-5">
    <h1 class="text-center fw-bold">{{ $project->title }}</h1>

    <h4>Technology: <span class="badge text-bg-success">{{ $project->technology?->title }}</span></h4>

    @if ($project->types)
        <p>Type:
                @foreach ($project->types as $type)
                <span class="badge text-bg-info">{{ $type->title }}</span>
                @endforeach ()
        </p>
    @endif

    <div class="row my-3 d-flex">
        <div class="col col-4">
            <img class="object-fit-contain img-fluid" src="{{ $project->image }}" alt="{{ $project->title }}">
        </div>

        <div class="col col-8 text-start text-black">
            <h2 class="fw-bolder">{{ $project->title }}</h2>
            <p>Completion Date: {{ $project->completion_date }}</p>
            <p class="fw-bold">Git-hub: {{ $project->project_url }}</p>
            <p>Description: {{ $project->description }}</p>
            <button class="btn btn-secondary w-25"><a class="link-body-emphasis" href="{{ route('admin.projects.index') }}"><i class="fa-solid fa-person-walking-arrow-loop-left"></i></a></button>
            <a class="btn btn-warning" href="{{ route('admin.projects.edit', $project->id)  }}"><i class="fa-solid fa-pen-nib"></i></a>
            <a class="btn btn-danger" href="{{ route('admin.projects.destroy', $project->id)  }}"><i class="fa-solid fa-trash-can"></i></a>
        </div>

    </div>
</div>

@endsection


@section('title')

My Comics

@endsection
