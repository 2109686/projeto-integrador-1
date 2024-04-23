<h1>Nova dúvida</h1>

<form action="{{ route('supports.store') }}" method="POST">
    {{-- <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}"> --}}
    @csrf()
    <input type="text" placeholder="Assunto" name="subject">
    <textarea name="body" id="body" cols="30" rows="5" placeholder="Descrição"></textarea>
    <button type="submit">Enviar</button>
</form>
