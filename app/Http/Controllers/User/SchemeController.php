<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSchemeRequest;
use App\Http\Requests\UpdateSchemeRequest;
use App\Models\Scheme;

class SchemeController extends Controller
{
    public function index()
    {
        $schemes = Scheme::with('template')->paginate(10);

        return view('user.scheme.index', compact('schemes'));
    }

    public function create()
    {
        return view('user.scheme.create');
    }

    public function store(StoreSchemeRequest $request)
    {
        $scheme = new Scheme($request->inputs());
        $status = $scheme->simpleCreate(false);

        return redirect()->route('user.scheme.show', $scheme->id)->with(compact('status'));
    }

    public function show($id)
    {
        $scheme = Scheme::findOrFail($id);

        $this->authorize('view', $scheme);

        return view('user.scheme.show', compact('scheme'));
    }

    public function edit($id)
    {
        $scheme = Scheme::findOrFail($id);

        $this->authorize('update', $scheme);

        return view('user.scheme.edit', compact('scheme'));
    }

    public function update(UpdateSchemeRequest $request, $id)
    {
        $scheme = Scheme::findOrFail($id);
        $this->authorize('update', $scheme);
        $scheme->update($request->inputs());
        $status = $scheme->save();

        $route = $status ? 'user.scheme.show' : 'user.scheme.edit';

        return redirect()->route($route, $id)->with('status', $status);
    }

    public function destroy($id)
    {
        $scheme = Scheme::findOrFail($id);

        $this->authorize('delete', $scheme);

        $status = $scheme->delete();

        $this->alert($status);

        return $status ? redirect()->route('user.scheme.index') : back();
    }
}
