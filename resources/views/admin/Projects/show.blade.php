@extends('layouts.admin')

@section('content')

<div class="container h-100 my-3 p-5 bg-dark-subtle rounded-5 overflow-auto">
    <h1 class="text-center fw-bold">{{ $project->title }}</h1>

    <h4>Technology: <span class="badge text-bg-success">{{ $project->technology?->title }}</span></h4>

    @if (count($project->types) > 0)
        <p>Type:
                @foreach ($project->types as $type)
                <span class="badge text-bg-info">{{ $type->title }}</span>
                @endforeach ()
        </p>
    @endif

    <div class="row h-auto my-3 d-flex">
        <div class="col col-5">
            <img class="object-fit-contain img-fluid" src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}">
        </div>

        <div class="col col-7 text-start text-black d-flex justify-content-between flex-column">
            <div>
                <h2 class="fw-bolder">{{ $project->title }}</h2>
                <p>Completion Date: {{ $project->completion_date }}</p>
                <p class="fw-bold">Git-hub: {{ $project->project_url }}</p>
            </div>
            <div>
                <a class="btn btn-secondary" href="{{ route('admin.projects.index') }}"><i class="fa-solid fa-person-walking-arrow-loop-left"></i></a>
                <a class="btn btn-warning text-white" href="{{ route('admin.projects.edit', $project->id)  }}"><i class="fa-solid fa-pen-nib"></i></a>
                <a class="btn btn-danger" href="{{ route('admin.projects.destroy', $project->id)  }}"><i class="fa-solid fa-trash-can"></i></a>
            </div>
        </div>

        <div class="overflow-y-scroll">
            <p class="mt-3 ">Description: lorem3000</p>
        </div>
    </div>
</div>

@endsection


@section('title')

My Comics

@endsection
