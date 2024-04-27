<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Support;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function index (Support $support)
    {
        /**
         * Pode ser feito dessa forma, instaciando o objeto da Model
         * $support = new Support();
         * $supports = $support->all();
         *
         * Outra forma de executar, é chamando direto como abaixo.
         * $supports = Support::all();
         *
         * Mas o ideal é utilizando a injeção de dependencia
         */

        $supports = $support->all();

        /**
         * Pode enviar para a view passando o array ou utilizando o compact
         *
         * return view('admin.supports.index', [
         *     'supports' => $supports
         * ]);
         *
         */

        return view('admin.supports.index', compact('supports'));
    }

    public function create ()
    {
        return view('admin.supports.create');
    }

    public function store (Request $request, Support $support)
    {
        $data = $request->all();
        $data['status'] = 'a';

        $support = $support->create($data);

        return redirect()->route('supports.index');
    }

    public function show (Support $support, string|int $id)
    {
        /**
         * Possíveis formas de fazer a busca
         *
         *  Dessa forma a query busca direto o id:
         * $support->find($id);
         *
         * Dessa forma é possível customizar o campo da busca, e retornar o primeiro resultado:
         * $support->where('id', $id)->first();
         *
         * Dessa forma é possível customizar o campo da busca e o operador que pode ser = ou != ou >, etc.
         * $support->where('id','=', $id)->first();
         *
         *
         */
        if (!$support = $support->find($id)) {
            return back();
        }

        return view('admin.supports.show', compact('support'));

    }

    public function edit(Support $support, string|int $id)
    {
        if (!$support = $support->where('id', $id)->first()) {
            return back();
        }

        return view('admin.supports.edit', compact('support'));
    }

    public function update (Request $request, Support $support, string|int $id)
    {
        if (!$support = $support->find($id)) {
            return back();
        }

        /**
         * Outra forma de fazer, tanto cadastro quanto edição:
         *
         * $support->subject = $request->subject;
         * $support->body = $request->subject;
         * $support->save();
         *
         */

        $support->update($request->only([
            'subject',
            'body',
        ]));

        return redirect()->route('supports.index');
    }
}
