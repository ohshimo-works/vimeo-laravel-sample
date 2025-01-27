@extends("layouts.base")

@section("title", "Vimeoアイテム詳細")

@section("content")
@php
    // dd($item->videoAll())
@endphp
    <div>
        <iframe src="{{$item->videoUrl()}}" width="300"></iframe>
    </div>
@endsection