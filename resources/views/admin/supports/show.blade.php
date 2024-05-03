@extends('admin.layouts.app')

@section('title', "Detalhes da Dúvida {$support->subject}")

@section('header')
    <h1 class="text-lg text-black-500">Dúvida {{ $support->subject }}</h1>
@endsection

@section('content')
    <ul>
        <li>Assunto: {{ $support->subject }}</li>
        <li>Status: {{ $support->status }}</li>
        <li>Descrição: {{ $support->body }}</li>
    </ul>

    <form action="{{ route('supports.destroy', $support->id ) }}" method="POST">
        {{-- Muito importante em forms usar a diretiva @csrf porque senão vai dar erro 419 --}}
        {{-- <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}"> --}}
        @csrf()
        @method('delete')
        <button type="submit" class="bg-red-500 hover:bg-red400 text-white font-bold py-2 px-4 border-b4 border-red-700 hover-red-500 rounded">Deletar</button>
    </form>
@endsection
