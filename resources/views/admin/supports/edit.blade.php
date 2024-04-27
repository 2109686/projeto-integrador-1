<h1>Dúvida {{ $support->id }}</h1>

<form action="{{ route('supports.update', $support->id ) }}" method="POST">
    {{-- <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}"> --}}
    @csrf()
    @method('put')
    {{-- <input type="text" value="PUT" name="_method"> --}}
    <input type="text" placeholder="Assunto" name="subject" value="{{ $support->subject }}">
    <textarea name="body" id="body" cols="30" rows="5">{{ $support->body }}</textarea>
    <button type="submit">Alterar</button>
</form>
