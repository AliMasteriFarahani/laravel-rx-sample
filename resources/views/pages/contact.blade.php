@extends('layouts.app')
@section('content')
   <ul>
    @if (count($persons))
    @foreach ($persons as $person)
        <li>{{$person}}</li>
    @endforeach
    @endif
   </ul>
@endsection