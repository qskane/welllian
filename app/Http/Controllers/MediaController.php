<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMediaRequest;
use App\Http\Requests\UpdateMediaRequest;
use App\Models\Media;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class MediaController extends Controller
{


    public function index()
    {
        $medias = Media::where('user_id', auth()->id())->paginate(10);

        return view('user.media.index', compact('medias'));
    }

    public function create()
    {
        return view('user.media.create');
    }

    public function store(StoreMediaRequest $request)
    {
        $media = new Media($request->getInputs());
        $media->setUserId();
        $media->setGenerateValues();
        $media->save();

        return redirect()->route('user.media.index', Auth::id())->with('status', true);
    }

    public function show($id)
    {
        $media = Media::findOrFail($id);

        return view('user.media.show', compact('media'));
    }

    public function edit($id)
    {
        $media = Media::findOrFail($id);

        return view('user.media.edit', compact('media'));
    }

    public function update(UpdateMediaRequest $request, $id)
    {
        $media = Media::findOrFail($id);

        $media->update($request->getInputs());

        $status = $media->save();

        $route = $status ? 'user.media.show' : 'user.media.edit';

        return redirect()->route($route, [Auth::id(), $media->id])->with('status', $status);
    }

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

        $base = "http://{$media->domain}";
        $client = new Client([
            'base_uri' => $base,
            'timeout' => 5.0,
        ]);

        $status = $requested = false;

        try {
            $response = $client->get('/');
            $requested = true;
        } catch (Exception $e) {
            Log::info($e->getMessage(), ['url' => $base]);
        }

        if ($requested && $response->getStatusCode() === Response::HTTP_OK) {
            if (strpos($response->getBody()->getContents(), $media->verification_key) !== false) {
                $media->verified = true;
                $media->save();
                $status = true;
            }
        }

        if ($status) {
            $route = 'user.media.show';
            $this->alertSuccess();
        } else {
            $route = 'user.media.verification';
            $this->alertFail(__('media.verification_fail'));
        }

        return redirect()->route($route, [Auth::id(), $media->id]);
    }

}
