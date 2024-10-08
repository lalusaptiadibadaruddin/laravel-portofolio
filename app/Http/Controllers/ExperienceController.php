<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use App\Models\MenuItem;
use App\Models\Profile;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menu = MenuItem::whereNull('parent_id')->get();
        $listProfile = Profile::all();
        return view('admin.biodata.experience', [
            'listProfile' => $listProfile,
            'title' => 'Experience',
            'subtitle' => 'List Experience',
            'menuItem' => $menu,
        ]);
    }

    public function fetch()
    {
        $data = Experience::with('joinProfilExperience')->get();
        // dd($data);
        return view('admin.biodata.dataExperience', [
            'experience' => $data,
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
            'company' => 'required',
            'position' => 'required',
            'start_date' => 'required',
            'end_date' => 'nullable|date',
            'description' => 'required',
        ]);

        $result = Experience::create($validateData);

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
    public function show(Experience $experience)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $id = $request->id;
        $data = Experience::find($id);
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, Experience $experience)
    {
        $rules = [
            'profile_id' => 'required',
            'company' => 'required',
            'position' => 'required',
            'start_date' => 'required',
            'end_date' => 'nullable|date',
            'description' => 'required',
        ];

        $validateData = $request->validate($rules);
        $experience = Experience::find($request->idEdit);

        $result = Experience::where('id', $experience->id)->update($validateData);

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

        $result = Experience::destroy($id);

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
