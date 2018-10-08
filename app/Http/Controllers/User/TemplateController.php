<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTemplateRequest;
use App\Http\Requests\UpdateTemplateRequest;
use App\Models\Template;
use Illuminate\Support\Facades\Auth;

class TemplateController extends Controller
{
    public function index()
    {
        $templates = Template::paginate(10);

        return view('user.template.index', compact('templates'));
    }

    public function show($id)
    {
        $template = Template::findOrFail($id);

        $this->authorize('view', $template);

        return view('user.template.show', compact('template'));
    }

    public function create()
    {
        return view('user.template.create');
    }

    public function store(StoreTemplateRequest $request)
    {
        $template = new Template($request->inputs());
        $template->user_id = Auth::id();
        $status = $template->save();

        return redirect()->route('user.template.show', $template->id)->with(compact('status'));
    }

    public function edit($id)
    {
        $template = Template::findOrFail($id);

        $this->authorize('update', $template);

        return view('user.template.edit', compact('template'));
    }

    public function update(UpdateTemplateRequest $request, $id)
    {
        $template = Template::findOrFail($id);

        $this->authorize('update', $template);

        $status = $template->update($request->inputs());

        return redirect()->route('user.template.show', $template->id)->with(compact('status'));
    }

    public function destroy($id)
    {
        $template = Template::findOrFail($id);
        $this->authorize('delete', $template);

        // FIXME how to handle related data ?
    }


}
