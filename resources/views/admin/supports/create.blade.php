<h1>Nova dúvida</h1>

<x-alert/>

<form action="{{ route('supports.store') }}" method="POST">
    {{-- <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}"> --}}
    @include('admin.supports.partials.form')
</form>
