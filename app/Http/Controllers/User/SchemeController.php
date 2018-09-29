<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSchemeRequest;
use App\Models\Scheme;
use Illuminate\Http\Request;
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
     */
    public function show($id)
    {
        $scheme = Scheme::findOrFail($id);

        return view('user.scheme.show', compact('scheme'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
