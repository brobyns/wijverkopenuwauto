<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use FineUploader;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use App\Image;

class UploadsController extends Controller
{

    public function upload(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('images'), $imageName);

        return response()->json(array('path'=> $imageName), 200);

    }

    public function fineUploaderEndpoint(Request $request) {

        $file = Input::file('qqfile');
        $originalName = $request->get('qqfilename');

        if ($request->isMethod('post')) {
            header("Content-Type: text/plain");
            $imageName = time().'.' .$file->getClientOriginalExtension();
            $result = FineUploader::handleUpload(
                Storage::disk('public')->getDriver()->getAdapter()->getPathPrefix(), $imageName);
            if ($result['success']) {
                $image = new Image();
                $image->original_name = $originalName;
                $image->name = $imageName;
                $image->path = $result['uuid'];
                $image->width = 0;
                $image->height = 0;
                $image->save();
                $result['image_id'] = $image->id;
            }
            return Response::json($result);
        }
        else {
            header("HTTP/1.0 405 Method Not Allowed");
        }
    }

}
