<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Validator;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $videos = Video::latest()->paginate(2);
        return view('video.index', compact('videos'));
    }  

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('video.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'caption' => 'nullable|max:100',
            'video' => 'required|file|mimes:mp4,jpeg,png,jpg,gif|max:10048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $videos = new video;

        if ($request->hasFile('video')) {
            $videosFile = $request->file('video');
            $videosName = time() . '.' . $videosFile->getClientOriginalExtension();
            $destinationPath = 'video/';
            $videosFile->move($destinationPath, $videosName);
            $videos->video = $videosName;
        }

        $videos->created_by = auth()->id(); 
        $videos->caption = $request->caption;
        $videos->save();

        return redirect()->route('vidio.index')->with('success', 'Video berhasil diunggah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $video = Video::findOrFail($id);
        // Hapus video dari penyimpanan jika perlu
        Storage::delete($video->video);
        // Hapus video dari database
        $video->delete();
        return redirect()->route('vidio.index')->with('success', 'Video berhasil dihapus');
    }
}
