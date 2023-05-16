@extends('layouts.app')

@section('page-title', 'Comic list')

@section('content')

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
          <td></td>
        </tr>
            
        @endforeach
      
    </tbody>
  </table>
    


@endsection