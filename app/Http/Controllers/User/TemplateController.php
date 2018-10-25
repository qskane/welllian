<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Template;
use Illuminate\Support\Facades\Auth;

class TemplateController extends Controller
{
    public function index()
    {
        $templates = Template::whereIn('user_id', [config('web.official_user_id'), Auth::id()])->paginate(10);

        return view('user.template.index', compact('templates'));
    }

    public function show($id)
    {
        $template = Template::findOrFail($id);

        $this->authorize('view', $template);

        return view('user.template.show', compact('template'));
    }

    public function preview($id)
    {
        $template = Template::findOrFail($id);

        $this->authorize('view', $template);

        return view('user.template.preview', compact('template'));
    }

    /*

    // -----------------------------------------------------------------------------
    // WARNING: To prevent users from executing malicious code, it is not open yet.
    // -----------------------------------------------------------------------------

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

    public function update($id, UpdateTemplateRequest $request)
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

        if ($template->hasRelated()) {
            $this->alertFail(__('cannot_delete_data_in_use'));

            return back();
        }
        $status = $template->delete();

        $this->alert($status);

        return $status ? redirect()->route('user.template.index') : back();
    }

    */


}
