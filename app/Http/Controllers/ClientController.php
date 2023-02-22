<?php

namespace App\Http\Controllers;

use App\Exports\ClientsExport;
use App\Http\Requests\StoreUpdateClientFormRequest;
use App\Repositories\Contracts\ClientRepositoryInterface;
use Maatwebsite\Excel\Facades\Excel;

class ClientController extends Controller
{
    protected $repository;
    public function __construct(ClientRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
    public function index()
    {
        $clients = $this->repository->orderBy('id', 'asc')->paginate();

        return view('admin.clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateClientFormRequest  $request
     * @return \Illuminate\Contracts\View\View
     */
    public function store(StoreUpdateClientFormRequest $request)
    {
        $this->repository->store($request->validated());

        return redirect()
            ->route('client.index')
            ->withSuccess('Cadastro realizado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function show($id)
    {
        $client = $this->repository->findById($id);

        if (!$client)
            return redirect()->back();

        return view('admin.clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function edit($id)
    {
        if (!$client = $this->repository->findById($id))
            return redirect()->back();

        return view('admin.clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateClientFormRequest  $request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(StoreUpdateClientFormRequest $request, $id)
    {
        $this->repository
            ->update($id, $request->validated());

        return redirect()->route('client.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function destroy($id)
    {
        $this->repository->delete($id);

        return redirect()
            ->route('client.index')
            ->withSuccess('Cliente deletado com sucesso');
    }

    public function exportToXlsx()
    {
        return Excel::download(new ClientsExport(), 'clientes.xlsx', \Maatwebsite\Excel\Excel::XLSX);
    }
}
