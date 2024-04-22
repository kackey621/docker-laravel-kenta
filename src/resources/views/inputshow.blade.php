@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>登録されたデータ一覧</h1>
@stop

@section('content')
    <table class="table table-striped">
    <thead>
        <tr>
        <th>ID</th>
        <th>タイトル</th>
        <th>URL</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($values as $v)
        <tr>
        <td>{{ $v->id }}</td>
        <td>{{ $v->title }}</td>
        <td><a href="{{ $v->url }}">{{ $v->url }}</a></td>
        </tr>
        @endforeach
        <tr>
        <td></td>
        <td></td>
        <td></td>
        <td><a href="get-v">10件のデータを取得して追加する</a></td>
        </tr>
    </tbody>
    </table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop