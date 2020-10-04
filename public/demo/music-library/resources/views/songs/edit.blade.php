@extends('layouts.dashboard')

@section('title', 'Edit song')

@section('content')
<div class="container-fluid">
    <div class="row">
        
            
        <div class="col-lg-8 col-md-7">
            <div class="card">
                <div class="header">
                    <h4 class="title">Edit Song</h4>
                </div>
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="content">
                    {{ Form::model($model, ['route' => ['songs.update', $model]]) }}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Song title</label>
                                    {{Form::text('title', null,['class' => 'form-control border-input'])}}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Music Director</label>
                                    <input type="text" name="music_director" class="form-control border-input">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Lyrics</label>
                                    <input type="text" name="lyrics" class="form-control border-input">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Singer</label>
                                    <input type="text" name="singer" class="form-control border-input">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Release Year</label>
                                    <input type="number" name="release_year" class="form-control border-input">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Album</label>
                                    <input type="text" name="album" class="form-control border-input">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="text-center">
                                <button type="submit" class="btn btn-info btn-fill btn-wd">Submit</button>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                     {{ Form::close() }}
                </div>
            </div>
        </div>


    </div>
</div>
@endsection