<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Plant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PlantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('plants', [
            'categories' => Category::all(),
        ]);
    }

    public function fetch()
    {
        $data = Plant::all();
        // dd($data);
        return view('dataPlants', [
            'plants' => $data,
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
            'nama' => 'required|max:255',
            'category_id' => 'required',
            'desc' => 'required|min:5|max:255',
            'image' => 'image|file|max:1024',
        ]);

        if ($request->file('image')) {
            $photo = $request->file('image');
            $filename = date('Ymd') . '_' . $photo->getClientOriginalName();
            $photo->move(public_path('storage/img'), $filename);

            $validateData['image'] = $filename;
        }

        $result = Plant::create($validateData);

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
    public function show(Request $request)
    {
        $id = $request->id;
        $data = Plant::find($id);
        // dd($data);
        return response()->json([
            'plant' => $data,
            'category' => $data->category->keterangan,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $id = $request->id;
        $data = Plant::find($id);
        return response()->json($data);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $rules = [
            'nama' => 'required|max:255',
            'category_id' => 'required',
            'image' => 'image|file|max:1024',
            'desc' => 'required',
        ];

        $validateData = $request->validate($rules);
        $plant = Plant::find($request->idEdit);

        if ($request->file('image')) {
            if ($plant->image) {
                $image_path = public_path() . '/storage/img/' . $plant->image;
                unlink($image_path);
            }

            $photo = $request->file('image');
            $filename = date('Ymd') . '_' . $photo->getClientOriginalName();
            $photo->move(public_path('storage/img'), $filename);

            $validateData['image'] = $filename;
        }

        $result = Plant::where('id', $plant->id)->update($validateData);

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
        $data = Plant::findOrFail($id);

        $image_path = public_path() . '/storage/img/' . $data->image;

        if (Storage::delete($image_path)) {
            unlink($image_path);
            $result = Plant::destroy($id);
        }

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
}
