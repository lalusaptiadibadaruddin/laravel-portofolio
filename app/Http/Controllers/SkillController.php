<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;
use App\Models\SkillType;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menu = MenuItem::whereNull('parent_id')->get();
        return view('admin.master.skill', [
            'title' => 'Skill Type',
            'subtitle' => 'List Skill Type',
            'menuItem' => $menu,
        ]);
    }

    public function fetch()
    {
        $data = SkillType::all();
        return view('admin.master.dataSkill', [
            'skill' => $data,
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
            'name' => 'required|max:255',
        ]);

        $result = SkillType::create($validateData);

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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $id = $request->id;
        $data = SkillType::find($id);
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SkillType $skilltype)
    {
        $rules = [
            'name' => 'required|max:255',
        ];

        $validateData = $request->validate($rules);
        $skilltype = SkillType::find($request->idEdit);

        $result = SkillType::where('id', $skilltype->id)->update($validateData);

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

        $result = SkillType::destroy($id);

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
