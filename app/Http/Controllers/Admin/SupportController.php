<?php

namespace App\Http\Controllers\Admin;

use App\DTO\CreateSupportDTO;
use App\DTO\UpdateSupportDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSupport;
use App\Models\Support;
use App\Services\SupportService;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function __construct(
        protected SupportService $service
    ) { }

    public function index (Request $request)
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

        /**
         * Vamos alterar essa forma de recuperar os registros para implementar a camada de service
         * e assim unificar toda a lógica nessa camada.
         * Nesse caso, podemos remover a injeção da model nesse método e passar diretamente a request no lugar:
         *
         * Versão anterior da declaração do método: public function index (Support $support)
         * Versão nova da declaração do método: public function index (Request $request)
         */
         //$supports = $support->all();

         $supports = $this->service->getAll($request->filter);

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

    public function store (StoreUpdateSupport $request)
    {
        /**
         * Vamos mudar essa abordagem abaixo para implementar a camada de service e DTO(Data Transfer Object)
         * Com essa abordagem, podemos remover a injeção da model nesse método
         *
         * Assinatura antiga do método: public function store (StoreUpdateSupport $request, Support $support)
         * Assinatura nova do método: public function store (StoreUpdateSupport $request)
         */
        // $data = $request->validated();
        // $data['status'] = 'a';

        // $support = $support->create($data);
        $this->service->new(
            CreateSupportDTO::makeFromRequest($request)
        );



        return redirect()->route('supports.index');
    }

    public function show (string $id)
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

         /**
          * Aqui também vamos alterar essa forma de buscar os dados para usarmos via camada de service
          */
        // if (!$support = $support->find($id)) {
        //     return back();
        // }

        if (!$support = $this->service->findOne($id)) {
            return back();
        }

        return view('admin.supports.show', compact('support'));

    }

    public function edit(string $id)
    {
        /**
         * Aqui também vamos alterar essa forma de buscar os dados para usarmos via camada de service
         */
        // if (!$support = $support->where('id', $id)->first()) {
        //     return back();
        // }

        if (!$support = $this->service->findOne($id)) {
            return back();
        }

        return view('admin.supports.edit', compact('support'));
    }

    public function update (StoreUpdateSupport $request, string|int $id)
    {
        /**
         * Vamos mudar essa abordagem abaixo para implementar a camada de service e DTO(Data Transfer Object)
         * Com essa abordagem, podemos remover a injeção da model nesse método
         *
         * Assinatura antiga do método: public function update (StoreUpdateSupport $request, Support $support, string|int $id)
         * Assinatura nova do método: public function update (StoreUpdateSupport $request, string|int $id)
         */

         $support = $this->service->update(
            UpdateSupportDTO::makeFromRequest($request)
        );

        if (!$support) {
            return back();
        }

        // if (!$support = $support->find($id)) {
        //     return back();
        // }

        // $support->update($request->validated());

        /**
         * Outra forma de fazer, tanto cadastro quanto edição:
         *
         * $support->subject = $request->subject;
         * $support->body = $request->subject;
         * $support->save();
         *
         */

        return redirect()->route('supports.index');
    }

    public function destroy(string $id)
    {
        /**
         * Aqui também vamos alterar essa forma de buscar os dados para usarmos via camada de service
         */
        // if (!$support = $support->find($id)) {
        //     return back();
        // }
        //$support->delete();

        $this->service->delete($id);

        return redirect()->route('supports.index');
    }
}
