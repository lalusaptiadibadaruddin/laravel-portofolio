<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\MediaSocial;
use App\Models\Profile;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listProfile = Profile::all();
        $listSocial = MediaSocial::all();
        return view('admin.biodata.contact', [
            'listProfile' => $listProfile,
            'listSocial' => $listSocial,
            'title' => 'Contact',
            'subtitle' => 'List Contact',
        ]);
    }

    public function fetch()
    {
        return view('admin.biodata.dataContact', [
            'contact' => Contact::all(),
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
            'social_id' => 'required',
            'name' => 'required|max:255',
        ]);

        $result = Contact::create($validateData);

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
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $id = $request->id;
        $data = Contact::find($id);
        return response()->json($data);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        $rules = [
            'profile_id' => 'required',
            'social_id' => 'required',
            'name' => 'required|max:255',
        ];

        $validateData = $request->validate($rules);
        $contact = Contact::find($request->idEdit);

        $result = Contact::where('id', $contact->id)->update($validateData);

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

        $result = Contact::destroy($id);

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
