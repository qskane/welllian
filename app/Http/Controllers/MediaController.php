<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveMediaRequest;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medias = Media::where('user_id', auth()->id())->paginate(10);

        return view('user.media.index', compact('medias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.media.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SaveMediaRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveMediaRequest $request)
    {

        $media = new Media($request->getInputs());
        $media->setUserId();
        $media->setGenerateValues();
        $media->save();

        return redirect()->route('user.media.index', Auth::id())->with('status', true);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $media = Media::findOrFail($id);

        return view('user.media.show', compact('media'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $media
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $media = Media::findOrFail($id);

        return view('user.media.edit', compact('media'));
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

        // FIXME delete

        dd(1111);
        //
    }

    public function showVerificationForm($id)
    {
        $media = Media::findOrFail($id);

        return view('user.media.verification', compact('media'));
    }

    public function verification($id)
    {
        $media = Media::findOrFail($id);

        // FIXME 验证domain key
        $media->verified = true;
        $media->save();

        return redirect()->route('user.media.show', [Auth::id(), $media->id])->with('status', true);
    }

}
