<h1>Dúvida {{ $support->id }}</h1>

<x-alert/>

<form action="{{ route('supports.update', $support->id ) }}" method="POST">
    {{-- <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}"> --}}
    @method('put')
    {{-- <input type="text" value="PUT" name="_method"> --}}
    @include('admin.supports.partials.form', [
        'support' => $support
    ])
</form>
