@extends('admin.layouts.app')

@section('title', 'Criar Novo Tópico')

@section('header')
    <h1 class="text-lg text-black-500">Nova dúvida</h1>
@endsection

@section('content')
    <form action="{{ route('supports.store') }}" method="POST">
        {{-- <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}"> --}}
        @include('admin.supports.partials.form')
    </form>
@endsection
