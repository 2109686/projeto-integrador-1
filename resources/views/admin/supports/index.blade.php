<h1>Listagem dos Suportes</h1>

<a href="{{ route('supports.create') }}">Criar dúvida</a>

<!--
    Essa forma a blade dá um echo.
    \{\!\! $supports \!\!\}
    Usar com cuidado pois essa forma não previne ataques do tipo xss

    A forma mais segura é utilizando \{\{ $supports \}\}
-->

<table>
    <thead>
        <th>Assunto</th>
        <th>Status</th>
        <th>Descrição</th>
        <th></th>
    </thead>
    <tbody>
        @foreach ($supports->items() as $support)
            <tr>
                <td>{{ $support->subject }}</td>
                <td>{{ getStatusSupport($support->status); }}</td>
                <td>{{ $support->body }}</td>
                <td>
                    <a href="{{ route('supports.show', $support->id) }}">Ver</a>
                    <a href="{{ route('supports.edit', $support->id) }}">Editar</a>
                </td>
            </tr>
        @endforeach

    </tbody>
</table>

<x-pagination :paginator="$supports" :appends="$filters" />
