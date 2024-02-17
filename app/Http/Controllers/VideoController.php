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
    public function index(Request $request)
    {
        $videos = Video::latest()->paginate(2);
        return view('video.index', compact('videos')); // Pastikan view dengan nama yang tepat tersedia
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
            $videosName = time() . '.' . $videoFile->getClientOriginalExtension();
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
    public function destroy(Video $videos)
    {
        try {
            // Temukan video berdasarkan ID
            $videos = Video::findOrFail($videos->id);

            // Hapus video dari database
            $videos->delete();

            return redirect()->route('vidio.index')->with('success', 'Video berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus Video: ' . $e->getMessage());
        }
    }
}
