@extends('admin.layouts.app')

@section('title', 'Fórum')

@section('header')
    @include('admin.supports.partials.header', compact('supports'))
@endsection

@section('content')
    <!--
        Essa forma a blade dá um echo.
        \{\!\! $supports \!\!\}
        Usar com cuidado pois essa forma não previne ataques do tipo xss

        A forma mais segura é utilizando \{\{ $supports \}\}
    -->

    @include('admin.supports.partials.content')

    <x-pagination :paginator="$supports" :appends="$filters" />
@endsection
