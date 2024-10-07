<?php

namespace App\Http\Controllers;

use App\Models\Interests;
use App\Models\Profile;
use Illuminate\Http\Request;

class InterestsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listProfile = Profile::all();
        return view('admin.biodata.interest', [
            'listProfile' => $listProfile,
            'title' => 'Interest',
            'subtitle' => 'List Interest',
        ]);
    }

    public function fetch()
    {
        return view('admin.biodata.datainterest', [
            'contact' => Interests::all(),
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
            'profile_id' => 'required',
            'name' => 'required|max:255',
        ]);

        $result = Interests::create($validateData);

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
    public function show(Interests $interests)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $id = $request->id;
        $data = Interests::find($id);
        return response()->json($data);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Interests $interests)
    {
        $rules = [
            'profile_id' => 'required',
            'name' => 'required|max:255',
        ];

        $validateData = $request->validate($rules);
        $contact = Interests::find($request->idEdit);

        $result = Interests::where('id', $contact->id)->update($validateData);

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

        $result = Interests::destroy($id);

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
