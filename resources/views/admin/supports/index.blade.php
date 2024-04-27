<h1>Listagem dos Suportes</h1>

<a href="{{ route('supports.create') }}">Criar dúvida</a>

<!--
    Essa forma a blade dá um echo.
    {!! $supports !!}
    Usar com cuidado pois essa forma não previne ataques do tipo xss

    A forma mais segura é utilizando {{ $supports }}
-->

<table>
    <thead>
        <th>Assunto</th>
        <th>Status</th>
        <th>Descrição</th>
        <th></th>
    </thead>
    <tbody>
        @foreach ($supports as $support)
            <tr>
                <td>{{ $support->subject }}</td>
                <td>{{ $support->status }}</td>
                <td>{{ $support->body }}</td>
                <td>
                    <a href="{{ route('supports.show', $support->id) }}">ir</a>
                </td>
            </tr>
        @endforeach

    </tbody>
</table>
