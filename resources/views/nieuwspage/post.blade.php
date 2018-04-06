@extends('layouts.app')

@section('content')
    <table class="table table-striped">
        <tr>
            <th>Title</th>
            <th></th>
            <th></th>
        </tr>
        @foreach($users as $post)
            <tr>    
                <th>{{$post->title}}</th>
                <th>{{$post->created_at}}  </th>
            </tr>
        @endforeach
        
        
    </table>
@endsection