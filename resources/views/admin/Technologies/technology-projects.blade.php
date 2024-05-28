@extends('layouts.admin')

@section('content')

<h1>List Technologies</h1>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Technology</th>
      <th scope="col">Project</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($technologies as $technology)
    <tr>
      <td class="w-25">{{ $technology->title }}</td>
      <td>
        <ul class="list-group">
            @foreach ($technology->projects as $project)
            <li class="list-group-item">
                <a href="{{ route('admin.projects.show', $project) }}">
                    {{ $project->id }} - {{ $project->title }}
                </a>
            </li>
            @endforeach
        </ul>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

@endsection
