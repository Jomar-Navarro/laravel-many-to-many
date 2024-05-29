@extends('layouts.admin')

@section('content')

<h1>My Project List</h1>

<table class="table w-100">
    <thead>
        <tr>
            <th scope="col">Title</th>
            <th scope="col">Technology</th>
            <th scope="col">Type</th>
            <th scope="col">Description</th>
            <th scope="col">Project Url</th>
            <th scope="col">Image</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($projects as $project)
        <tr>
            <td>{{ $project->title }}</td>
            <td>{{ $project->technology?->title }}</td>
            <td>
                @forelse ($project->types as $type)
                <span class="badge text-bg-info">{{ $type->title }}</span>
                @empty
                    ~ No Types ~
                @endforelse
            </td>
            <td>{{ $project->description }}</td>
            <td><a href="{{ $project->project_url }}" target="_blank">{{ $project->project_url }}</a></td>
            <td><img src="{{ asset($project->image) }}" alt=""></td>
            <td >
                <div class="d-flex">
                    <a href="{{ route('admin.projects.show', $project) }}" class="btn btn-success"><i class="fa-solid fa-eye"></i></a>
                    <a class="btn btn-warning mx-1" href="{{ route('admin.projects.edit', $project->id)  }}"><i class="fa-solid fa-pen-nib"></i></a>
                    <form action="{{ route('admin.projects.destroy', $project) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                    </form>
                </div>
            </td>
        </tr>
        @empty

        @endforelse
    </tbody>
</table>
<div class="d-flex justify-content-center">
    {{ $projects->links('pagination::bootstrap-5') }}
</div>
@endsection
