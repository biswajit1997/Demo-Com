<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Education;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $res = Education::where('user_id', auth()->user()->id)->get();
        return view('home', compact('res'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function add_education(Request $request)
    {
        $res = Education::create([
            'clg_name' => $request->clg_name,
            'user_id' => auth()->user()->id,
            'course_name' => $request->course_name,
            'start_year' => $request->start_year,
            'end_year' => $request->end_year,
        ]);
        if ($res) {
            return redirect()->back()->with('success', 'Education Added Successfully');
        } else {
            return redirect()->back()->with('error', 'Education Add Failed');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        $res = Education::where('id', $id)->first();
        return view('edit', compact('res'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($id);
        $res = Education::where('id', $id)->update([
            'clg_name' => $request->clg_name,
            'course_name' => $request->course_name,
            'start_year' => $request->start_year,
            'end_year' => $request->end_year,
        ]);
        if ($res) {
            return redirect()->back()->with('success', 'Education Updated Successfully');
        } else {
            return redirect()->back()->with('error', 'Education Update Failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $res = Education::destroy($id);
        if ($res) {
            return redirect()->back()->with('success', 'Education Deleted Successfully');
        } else {
            return redirect()->back()->with('error', 'Education Delete Failed');
        }
    }
}