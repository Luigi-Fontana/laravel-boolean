@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item" aria-current="page"><a href="{{route('admin.pages.index')}}">Pagine</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Crea Nuova Pagina</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <ul class="nav justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary m-3" href="{{route('admin.pages.index')}}">&#8592; Annulla inserimento</a>
                    </li>
                </ul>
                <div class="col-8 offset-2">
                    <form action="{{route('admin.pages.store')}}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <fieldset>
                                <legend>Titolo</legend>
                                <input type="text" name="title" id="title" class="form-control" value="{{old('title')}}">
                                @error('title')
                                    <span class="alert alert-danger">{{$message}}</span>
                                @enderror
                            </fieldset>
                        </div>
                        <div class="form-group">
                            <fieldset>
                                <legend>Sommario</legend>
                                <input type="text" name="summary" id="summary" class="form-control" value="{{old('summary')}}">
                                @error('summary')
                                    <span class="alert alert-danger">{{$message}}</span>
                                @enderror
                            </fieldset>
                        </div>
                        <div class="form-group">
                            <fieldset>
                                <legend>Testo</legend>
                                <textarea name="body" id="body" cols="30" rows="10" class="form-control">{{old('body')}}</textarea>
                                @error('body')
                                    <span class="alert alert-danger">{{$message}}</span>
                                @enderror
                            </fieldset>
                        </div>
                        <div class="form-group">
                            <fieldset>
                                <legend>Categoria</legend>
                                <select name="category_id" id="category_id" class="custom-select">
                                    @foreach ($categories as $category)
                                    <option value="{{$category->id}}"{{(!empty(old('category_id'))) ? 'selected' : ''}}>
                                        {{$category->name}}
                                    </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <span class="alert alert-danger">{{$message}}</span>
                                @enderror
                            </fieldset>
                        </div>
                        <div class="form-group">
                            <fieldset>
                                <legend>Tags</legend>
                                @foreach ($tags as $tag)
                                    <label for="tags-{{$tag->id}}">{{$tag->name}}</label>
                                    <input type="checkbox" name="tags[]" id="tags-{{$tag->id}}" value="{{$tag->id}}" {{(is_array(old('tags')) && in_array($tag->id, old('tags'))) ? 'checked' : ''}}>
                                @endforeach
                            </fieldset>
                        </div>
                        <div class="form-group">
                            <fieldset>
                                <legend>Foto</legend>
                                @foreach ($photos as $photo)
                                    <label for="photos-{{$photo->id}}">{{$photo->name}}</label>
                                    <input type="checkbox" name="photos[]" id="photos-{{$photo->id}}" value="{{$photo->id}}" {{(is_array(old('photos')) && in_array($photo->id, old('photos'))) ? 'checked' : ''}}>
                                @endforeach
                            </fieldset>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="customSwitches" name="visible">
                                <label class="custom-control-label" for="customSwitches">Visibile</label>
                            </div>
                        </div>
                        <input type="submit" value="Invia" class="btn btn-success">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
