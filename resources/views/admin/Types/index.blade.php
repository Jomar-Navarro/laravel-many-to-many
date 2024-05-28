@extends('layouts.admin')

@section('content')
    <h2>Types</h2>

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


    <form class="d-flex w-25" action="{{ route('admin.types.store') }}" method="POST">
        @csrf
        <input class="form-control me-2" type="search" placeholder="New Technology" name="title">
        <button class="btn btn-success" type="submit">Submit</button>
    </form>

    <table class="table my-3">
    <thead>
        <tr>
          <th scope="col">Technologies</th>
          <th scope="col">Action</th>
        </tr>
    </thead>
  <tbody>
    @foreach ($types as $type)
    <tr>
      <td>
        <form
          action="{{ route('admin.types.update', $type) }}"
          method="POST"
          id="form-edit-{{ $type->id }}">
            @csrf
            @method('PUT')
            <input type="text" value="{{ $type->title }}" name="title">
        </form>
      </td>
      <td>
        <button
          class="btn btn-warning"
          onclick="submitForm( {{ $type->id }} )"
          ><i class="fa-solid fa-pen-nib"></i></button>

        <form
        class="d-inline"
          action="{{ route('admin.types.destroy', $type) }}"
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
