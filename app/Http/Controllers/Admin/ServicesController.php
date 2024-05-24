<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Services;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Services::all();

        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gerenciadorgs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'activity_date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i',
            'collaborator_name' => 'required|string|max:255',
            'cpf' => 'required|string|max:14',
            'activity_name' => 'required|string|max:255',
            'mobile_number' => 'required|string|max:15',
            'room' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'responsible' => 'required|string|max:255',
            'materials_used' => 'required|string|max:255',
            'cordage_length' => 'required|numeric|min:0|max:9999999999.99',
            'from_row' => 'required|string|max:10',
            'from_rack' => 'required|string|max:1',
            'to_row' => 'required|string|max:10',
            'to_rack' => 'required|string|max:1',
        ]);

        $services = Services::create($validatedData);
        return redirect()
        ->route('services.index')
        ->with('message', 'Cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gerenciadorg  $gerenciadorg
     * @return \Illuminate\Http\Response
     */
    public function show(Gerenciadorg $gerenciadorg)
    {
        return view('gerenciadorgs.show', compact('gerenciadorg'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gerenciadorg  $gerenciadorg
     * @return \Illuminate\Http\Response
     */
    public function edit(Gerenciadorg $gerenciadorg)
    {
        return view('gerenciadorgs.edit', compact('gerenciadorg'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gerenciadorg  $gerenciadorg
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gerenciadorg $gerenciadorg)
    {
        $validatedData = $request->validate([
            'activity_date' => 'required|date',
            'start_time' => 'required|date_format:H:i:s',
            'end_time' => 'required|date_format:H:i:s',
            'collaborator_name' => 'required|string|max:255',
            'cpf' => 'required|string|max:14',
            'activity_name' => 'required|string|max:255',
            'mobile_number' => 'required|string|max:15',
            'room' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'responsible' => 'required|string|max:255',
            'materials_used' => 'required|string|max:255',
            'cordage_length' => 'required|numeric|min:0|max:9999999999.99',
            'from_row' => 'required|string|max:10',
            'from_rack' => 'required|string|max:1',
            'to_row' => 'required|string|max:10',
            'to_rack' => 'required|string|max:1',
        ]);

        $gerenciadorg->update($validatedData);
        return redirect()->route('gerenciadorgs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gerenciadorg  $gerenciadorg
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gerenciadorg $gerenciadorg)
    {
        $gerenciadorg->delete();
        return redirect()->route('gerenciadorgs.index');
    }
}
