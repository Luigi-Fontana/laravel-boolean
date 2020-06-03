@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Foto</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <ul class="nav justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary m-3" href="{{route('home')}}">&#8592; Torna alla Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-success m-3" href="{{route('admin.photos.create')}}">Carica Foto</a>
                    </li>
                </ul>
                @foreach ($photos as $photo)
                    <div class="card col-4">
                        <h4>{{$photo->name}}</h4>
                        <p>{{$photo->updated_at}}</p>
                        <small>{{$photo->description}}</small>
                        <img src="{{asset('storage' . $photo->path)}}" alt="{{$photo->name}}">
                        <a class="btn btn-warning" href="{{route('admin.photos.show', $photo->id)}}">Visualizza</a>
                        @if (Auth::id() == $photo->user_id)
                            <a class="btn btn-warning" href="{{route('admin.photos.edit', $photo->id)}}">Modifica</a></td>
                        @endif
                        @if (Auth::id() == $photo->user_id)
                            <form action="{{route('admin.photos.destroy', $photo->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input class="btn btn-danger" type="submit" value="Elimina">
                            </form>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
        <div class="row">
            <div class="mx-auto">
                {{$photos->links()}}
            </div>
        </div>
    </div>
@endsection
