<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSchemeRequest;
use App\Http\Requests\UpdateSchemeRequest;
use App\Models\Scheme;
use Illuminate\Support\Facades\Auth;

class SchemeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schemes = Scheme::with('template')->paginate(10);

        return view('user.scheme.index', compact('schemes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.scheme.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreSchemeRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreSchemeRequest $request)
    {
        $scheme = new Scheme($request->inputs());
        $scheme->user_id = Auth::id();
        $status = $scheme->save();


        return redirect()->route('user.scheme.show', $scheme->id)->with(compact('status'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show($id)
    {
        $scheme = Scheme::findOrFail($id);

        $this->authorize('view', $scheme);

        return view('user.scheme.show', compact('scheme'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit($id)
    {
        $scheme = Scheme::findOrFail($id);

        $this->authorize('update', $scheme);

        return view('user.scheme.edit', compact('scheme'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateSchemeRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(UpdateSchemeRequest $request, $id)
    {
        $scheme = Scheme::findOrFail($id);
        $this->authorize('update', $scheme);
        $scheme->update($request->inputs());
        $status = $scheme->save();

        $route = $status ? 'user.scheme.show' : 'user.scheme.edit';

        return redirect()->route($route, $id)->with('status', $status);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy($id)
    {
        $scheme = Scheme::findOrFail($id);
        $this->authorize('delete', $scheme);
        $status = $scheme->delete();

        return redirect()->route('user.scheme.index')->with(compact('status'));
    }
}
