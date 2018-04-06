@extends('layouts.app')

@section('content')
    <table class="table table-striped">
        <tr>
            <th>Title</th>
            <th></th>
            <th></th>
        </tr>
        @foreach($posts as $post)
            <tr>
                <th>{{$post->title}}</th>
                <th></th>
                <th></th>
            </tr>
        @endforeach
    </table>
@endsection