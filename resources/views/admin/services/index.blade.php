@extends('admin.layouts.app')

@section('title', 'Fórum')

<div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
        {{ __('Voltar para o dashboard principal') }}
    </x-nav-link>
</div>

{{-- @section('header')
    @include('admin.services.partials.header', compact('services'))
@endsection --}}

@section('content')
    <!--
        Essa forma a blade dá um echo.
        \{\!\! $services \!\!\}
        Usar com cuidado pois essa forma não previne ataques do tipo xss

        A forma mais segura é utilizando \{\{ $services \}\}
    -->

    @include('admin.services.partials.content')

    {{-- <x-pagination :paginator="$services" :appends="$filters" /> --}}
@endsection
