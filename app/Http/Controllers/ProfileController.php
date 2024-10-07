<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listUser = User::all();
        return view('admin.biodata.profile', [
            'listUser' => $listUser,
            'title' => 'Profile',
            'subtitle' => 'List Profile',
        ]);
    }

    public function fetch()
    {
        $data = Profile::with('User')->get();
        // dd($data);
        return view('admin.biodata.dataProfile', [
            'profile' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'user_id' => 'required',
            'name' => 'required|max:255',
            'title' => 'required',
            'description' => 'required',
            'email' => 'required',
            'image' => 'image|file|max:1024',
        ]);

        if ($request->file('image')) {
            $photo = $request->file('image');
            $filename = date('Ymd') . '_' . $photo->getClientOriginalName();
            $photo->move(public_path('storage/images'), $filename);

            $validateData['image'] = $filename;
        }

        $result = Profile::create($validateData);

        if ($result) {
            return response()->json([
                'status' => 200,
            ]);
        } else {
            return response()->json([
                'status' => 500,
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $id = $request->id;
        $data = Profile::find($id);
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, Profile $profile)
    {
        $rules = [
            'name' => 'required|max:255',
            'user_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'email' => 'required',
            'image' => 'image|file|max:1024',
        ];

        $validateData = $request->validate($rules);
        $profile = Profile::find($request->idEdit);

        if ($request->file('image')) {
            if ($profile->image) {
                $image_path = public_path() . '/storage/images/' . $profile->image;
                unlink($image_path);
            }

            $photo = $request->file('image');
            $filename = date('Ymd') . '_' . $photo->getClientOriginalName();
            $photo->move(public_path('storage/images'), $filename);

            $validateData['image'] = $filename;
        }

        $result = Profile::where('id', $profile->id)->update($validateData);

        if ($result) {
            return response()->json([
                'status' => 200,
            ]);
        } else {
            return response()->json([
                'status' => 500,
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $data = Profile::findOrFail($id);

        $image_path = public_path() . '/storage/images/' . $data->image;

        if (Storage::delete($image_path)) {
            $result = Profile::destroy($id);
        }

        if ($result) {
            unlink($image_path);
            return response()->json([
                'status' => 200,
            ]);
        } else {
            return response()->json([
                'status' => 500,
            ]);
        }
    }
}
