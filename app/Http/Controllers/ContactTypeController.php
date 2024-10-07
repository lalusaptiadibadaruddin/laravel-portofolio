<?php

namespace App\Http\Controllers;

use App\Models\ContactType;
use Illuminate\Http\Request;

class ContactTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.master.contact', [
            'title' => 'Contact Type',
            'subtitle' => 'List Contact Type',
        ]);
    }

    public function fetch()
    {
        return view('admin.master.dataContact', [
            'contact' => ContactType::all(),
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

        $result = ContactType::create($validateData);

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
        $data = ContactType::find($id);
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ContactType $contact)
    {
        $rules = [
            'name' => 'required|max:255',
        ];

        $validateData = $request->validate($rules);
        $contact = ContactType::find($request->idEdit);

        $result = ContactType::where('id', $contact->id)->update($validateData);

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

        $result = ContactType::destroy($id);

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
