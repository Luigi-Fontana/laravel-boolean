@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Pagine</li>
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
                        <a class="nav-link btn btn-success m-3" href="{{route('admin.pages.create')}}">Nuova Pagina</a>
                    </li>
                </ul>
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>Id</th>
                            <th>Titolo</th>
                            <th>Categoria</th>
                            <th>Tags</th>
                            <th>Modificato</th>
                            <th colspan="3">Azioni</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pages as $page)
                            <tr>
                                <td>{{$page->id}}</td>
                                <td>{{$page->title}}</td>
                                <td>{{$page->category->name}}</td>
                                <td>
                                    @foreach ($page->tags as $tag)
                                        <small>#{{$tag->name}} </small>
                                    @endforeach
                                </td>
                                <td>{{$page->updated_at}}</td>
                                <td><a class="btn btn-warning" href="{{route('admin.pages.show', $page->id)}}">Visualizza</a></td>
                                <td>
                                    @if (Auth::id() == $page->user_id)
                                        <a class="btn btn-warning" href="{{route('admin.pages.edit', $page->id)}}">Modifica</a></td>
                                    @endif
                                <td>
                                    @if (Auth::id() == $page->user_id)
                                        <form action="{{route('admin.pages.destroy', $page->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input class="btn btn-danger" type="submit" value="Elimina">
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mx-auto">
                    {{$pages->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection
