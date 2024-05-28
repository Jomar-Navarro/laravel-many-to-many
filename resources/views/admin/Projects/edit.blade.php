@extends('layouts.admin')

@section('content')

<div class="container p-5 bg-dark-subtle rounded-5">
    <h1 class="text-center fw-bold">Edit: {{ $project->title }}</h1>

        @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.projects.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col col-6">
                <div class="mb-3 m-3">
                    <label for="title" class="form-label  fw-bold">title</label>
                    <input
                        name="title"
                        type="text"
                        class="form-control"
                        @error('title')
                            is-invalid
                        @enderror
                        id="title"
                        value="{{ old('title', $project->title) }}">
                    @error('title')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
            </div>

            <div class="col col-6">
                <div class="mb-3 m-3">
                    <label for="image" class="form-label fw-bold">Image</label>
                    <input
                      name="image"
                      type="file"
                      onchange="showImage(event)"
                      class="form-control"
                      @error('image')
                            is-invalid
                        @enderror
                      id="image"
                      value="{{ old('image', $project->image) }}">

                      @error('image')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
                <img class="thumb" id="thumb" src="/img/imagenotfound.jpg" alt="imagenotfound">
            </div>
        </div>

        <div class="mb-3 m-3">
            <label for="technology" class="form-label fw-bold">Technology</label>
            <select name="technology_id" class="form-select" aria-label="Default select example">
                <option value="" selected>Select a Technology</option>
                @foreach ($technology as $item)
                    <option
                      value="{{ $item->id }}"
                      @if (old('technology_id', $item->technology?->id) == $item->id) selected @endif>{{ $item->title }}</option>
                @endforeach
            </select>
        </div>

        <div class="row">
            <div class="col">
                <div class="mb-3 m-3">
                    <label for="project_url" class="form-label fw-bold">Project Url</label>
                    <input
                      name="project_url"
                      type="text"
                      class="form-control"
                      @error('project_url')
                            is-invalid
                        @enderror
                      id="project_url"
                      value="{{ old('project_url', $project->project_url) }}">

                      @error('project_url')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
            </div>
            <div class="col">
                <div class="mb-3 m-3">
                    <label for="completion_date" class="form-label fw-bold">Completion Date</label>
                    <input
                      name="completion_date"
                      type="number"
                      class="form-control"
                      @error('completion_date')
                            is-invalid
                        @enderror
                      id="completion_date"
                      value="{{ old('completion_date', $project->image) }}">

                      @error('completion_date', $project->completion_date)
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
            </div>
        </div>

        <div class="mb-3 m-3">
            <label for="description" class="form-label fw-bold">Description</label>
            <textarea
              name="description"
              type="text"
              class="form-control"
              @error('location')
                    is-invalid
                @enderror
              id="description"
              value="{{ old('description', $project->description) }}">
              {{ old('description', $project->description) }}
            </textarea>

              @error('description')
                <small class="text-danger">
                    {{ $message }}
                </small>
            @enderror
        </div>

        <div>
            <button class="btn btn-success" type="submit">Edit Project</button>
        </div>
</div>

    </form>
</div>

@endsection


@section('title')

My Comics

@endsection


<script>
    function showImage(event){
        const thumb = document.getElementById('thumb')
        thumb.src = URL.createObjectURL(event.target.files[0]);
    }
</script>
