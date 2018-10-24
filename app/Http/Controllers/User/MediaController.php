<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMediaRequest;
use App\Http\Requests\UpdateMediaRequest;
use App\Models\Media;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class MediaController extends Controller
{

    public function index()
    {
        $medias = Media::owner()->paginate(10);

        return view('user.media.index', compact('medias'));
    }

    public function create()
    {
        return view('user.media.create');
    }

    public function store(StoreMediaRequest $request)
    {
        $status = (new Media($request->inputs()))->simpleCreate(false);

        return redirect()->route('user.media.index')->with('status', $status);
    }

    public function show($id)
    {
        $media = Media::owner()->findOrFail($id);

        $this->authorize('view', $media);

        return view('user.media.show', compact('media'));
    }

    public function edit($id)
    {
        $media = Media::owner()->findOrFail($id);

        $this->authorize('update', $media);

        return view('user.media.edit', compact('media'));
    }

    public function update(UpdateMediaRequest $request, $id)
    {
        $media = Media::owner()->findOrFail($id);

        $this->authorize('update', $media);

        $originDomain = $media->domain;

        $media->update($request->inputs());
        $media->verified = $request->get('domain') === $originDomain;
        if (!$request->consuming()) {
            $media->consumable = false;
        }
        $status = $media->save();

        $route = $status ? 'user.media.show' : 'user.media.edit';

        return redirect()->route($route, $media->id)->with('status', $status);
    }

    public function destroy($id)
    {
        $media = Media::owner()->findOrFail($id);

        $this->authorize('delete', $media);

        $status = $media->delete();

        $this->alert($status);

        return $status ? redirect()->route('user.media.index') : back();
    }

    public function showVerificationForm($id)
    {
        $media = Media::owner()->findOrFail($id);

        $this->authorize('verification', $media);

        return view('user.media.verification', compact('media'));
    }

    public function verification($id)
    {
        $media = Media::owner()->findOrFail($id);

        $this->authorize('verification', $media);

        $base = "http://{$media->domain}";
        $client = new Client([
            'base_uri' => $base,
            'timeout' => 5.0,
        ]);

        try {
            $response = $client->get('/');
        } catch (Exception $e) {
            Log::info($e->getMessage(), ['location' => __METHOD__, 'url' => $base]);
        }

        $status = false;
        if (isset($response) && $response->getStatusCode() === Response::HTTP_OK) {
            if (strpos($response->getBody()->getContents(), $media->verification_key) !== false) {
                $media->verified = true;
                $status = $media->save();
            }
        }

        $this->alert($status, null, __('media.verification_fail'));

        $route = $status ? 'user.media.show' : 'user.media.verification';

        return redirect()->route($route, $media->id);
    }

}
