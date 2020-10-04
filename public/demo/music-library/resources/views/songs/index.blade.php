@extends('layouts.dashboard')

@section('title', 'List of songs')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                
                <div class="content table-responsive table-full-width">
                    <table class="table table-striped">
                        <thead>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Album</th>
                            <th>Music Director</th>
                            <th>Lyrics</th>
                            <th>Singer</th>
                            <th>Release Year</th>
                        </thead>
                        <tbody>
                        @foreach($records as $record):
                            <tr>
                                <td>{{$record['id']}}</td>
                                <td><a href="{{route('songs.edit', $record['id'])}}">{{$record['title']}}</a></td>
                                <td>{{$record['album']}}</td>
                                <td>{{$record['music_director']}}</td>
                                <td>{{$record['lyrics']}}</td>
                                <td>{{$record['singer']}}</td>
                                <td>{{$record['release_year']}}</td>
                            </tr>
                        @endforeach
                            
                        </tbody>
                    </table>

                </div>
            </div>
        </div>


    </div>
</div> 
@endsection