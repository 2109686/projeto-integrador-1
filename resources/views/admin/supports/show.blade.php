<h1>Detalhes da dúvida {{ $support->id }}</h1>

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
    <button type="submit">Deletar</button>
</form>
