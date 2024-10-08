<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\MenuItem;
use App\Models\listSkill;
use App\Models\SkillType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class listSkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menu = MenuItem::whereNull('parent_id')->get();
        $listProfile = Profile::all();
        $listSkill = SkillType::all();
        return view('admin.biodata.listSkill', [
            'listProfile' => $listProfile,
            'listSkill' => $listSkill,
            'title' => 'Skills',
            'subtitle' => 'List Skills',
            'menuItem' => $menu,
        ]);
    }

    public function fetch()
    {

        $data = DB::table('list_skills')
            ->join('profiles', 'list_skills.profile_id', '=', 'profiles.id')
            ->join('skill_types', 'list_skills.skill_id', '=', 'skill_types.id')
            ->select(
                'list_skills.id', 'list_skills.profile_id', 'profiles.name AS profile_name',
                'list_skills.skill_id', 'skill_types.name AS skill_name', 'list_skills.skill_level'
            )
            ->get();

        // $data = listSkill::with('get_skill')->get();
        // dd($data);
        return view('admin.biodata.dataListSkill', [
            'listSkill' => $data,
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
            'skill_id' => 'required',
            'skill_level' => 'required',
        ]);

        $result = listSkill::create($validateData);

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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $id = $request->id;
        $data = listSkill::find($id);
        return response()->json($data);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, listSkill $listskill)
    {
        $rules = [
            'profile_id' => 'required',
            'skill_id' => 'required',
            'skill_level' => 'required',
        ];

        $validateData = $request->validate($rules);
        $listskill = listSkill::find($request->idEdit);

        $result = listSkill::where('id', $listskill->id)->update($validateData);

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

        $result = listSkill::destroy($id);

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
