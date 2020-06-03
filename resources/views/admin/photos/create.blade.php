@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item" aria-current="page"><a href="{{route('admin.photos.index')}}">Foto</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Carica Foto</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <ul class="nav justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary m-3" href="{{route('admin.photos.index')}}">&#8592; Annulla caricamento</a>
                    </li>
                </ul>
                <div class="col-8 offset-2">
                    <form action="{{route('admin.photos.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <fieldset>
                                <legend>Nome Foto</legend>
                                <input type="text" name="name" id="title" class="form-control" value="{{old('name')}}">
                                @error('name')
                                    <span class="alert alert-danger">{{$message}}</span>
                                @enderror
                            </fieldset>
                        </div>
                        <div class="form-group">
                            <fieldset>
                                <legend>Descrizione</legend>
                                <input type="text" name="description" id="summary" class="form-control" value="{{old('description')}}">
                                @error('description')
                                    <span class="alert alert-danger">{{$message}}</span>
                                @enderror
                            </fieldset>
                        </div>
                        <div class="form-group">
                            <fieldset>
                                <legend>Carica File</legend>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="inputGroupFile01" name="path">
                                    <label class="custom-file-label" for="inputGroupFile01">Sfoglia</label>
                                </div>
                                @error('path')
                                    <span class="alert alert-danger">{{$message}}</span>
                                @enderror
                            </fieldset>
                        </div>
                        <input type="submit" value="Invia" class="btn btn-success">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
