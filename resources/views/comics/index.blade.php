@extends('layouts.app')


@section('page-title', 'Comic list')

@section('content')

<a href="{{route('comics.create')}}" class="btn btn-secondary mb-4">Create a new comic</a>

<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Series</th>
        <th scope="col">Date</th>
        <th scope="col">Type</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($comics as $comic)
        <tr>
          <td scope="row">{{$comic->id}}</th>
          <td>{{$comic->title}}</td>
          <td>{{$comic->series}}</td>
          <td>{{$comic->sale_date}}</td>
          <td>{{$comic->type}}</td>
          <td class="d-flex">
            <a class="btn btn-secondary me-2" href="{{route('comics.show', ['comic' => $comic->id])}}">Detail</a>
            <a class="btn btn-warning me-2" href="{{route('comics.edit', ['comic' => $comic->id])}}">Edit</a>

            <form action="{{route('comics.destroy', ['comic' => $comic->id])}}" method="POST">
              
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger">Delete</button>
            </form>

          </td>
        </tr>
            
        @endforeach
      
    </tbody>
  </table>
    


@endsection