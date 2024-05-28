@extends('layouts.admin')

@section('content')
    <h2>Technologies</h2>

    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger" role="alert">
            {{session('error')}}
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{session('success')}}
        </div>
    @endif


  <div class="container-fluid">
    <form class="d-flex" action="{{ route('admin.technologies.store') }}" method="POST">
        @csrf
        <input class="form-control me-2" type="search" placeholder="New Technology" name="title">
        <button class="btn btn-success" type="submit">Submit</button>
    </form>
  </div>

    <table class="table">
  <thead>
    <tr>
      <th scope="col">Technologies</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($technologies as $technology)
    <tr>
      <td>
        <form
          action="{{ route('admin.technologies.update', $technology) }}"
          method="POST"
          id="form-edit-{{ $technology->id }}">
            @csrf
            @method('PUT')
            <input type="text" value="{{ $technology->title }}" name="title">
        </form>
      </td>
      <td>
        <button
          class="btn btn-warning"
          onclick="submitForm( {{ $technology->id }} )"
          ><i class="fa-solid fa-pen-nib"></i></button>

        <form
        class="d-inline"
          action="{{ route('admin.technologies.destroy', $technology) }}"
          method="POST"
          onsubmit="return confirm('Are you sure you want to delete the Technology?')">
        @csrf
        @method('DELETE')
            <button class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

<script>
    function submitForm(id){
        const form = document.getElementById(`form-edit-${id}`);
        form.submit();
    }
</script>
@endsection
