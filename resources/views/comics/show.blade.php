@extends('layouts.app')

@section('content')

    <h4 class="text-primary mt-3">Comic : {{$comic->title}}</h4>
    <img src="{{$comic->thumb}}" class="img-fluid mt-3" alt="{{$comic->title}}">
    <h1 class="mt-3">{{$comic->title}}</h1>
    <h3>Series: {{$comic->series}}</h3>
    <h3>Type: {{$comic->type}}</h3>
    <h4>Date: {{$comic->sale_date}}</h4>
    <h4>Price: {{$comic->price}}</h4>
    <p>{{$comic->description}}</p>

    <div class="d-flex">
        <a href="{{route('comics.index')}}" class="btn btn-primary me-2 ">Back</a>
    
        <form action="{{route('comics.destroy', ['comic' => $comic->id])}}" method="POST" class="delete">
                  
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>


@endsection