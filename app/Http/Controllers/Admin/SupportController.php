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
}
