<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Technology;
use App\Functions\Helper as Help;


class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $technologies = Technology::all();

        return view('admin.technologies.index', compact('technologies'));
    }

    public function technologyProjects(){
        $technologies = Technology::all();

        return view('admin.Technologies.technology-projects', compact('technologies'));
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
        $exist = Technology::where('title', $request->title)->first();
        if ($exist) {
            return redirect()->route('admin.technologies.index')->with('error', 'Technology already exist!');
        }else {
            $new = new Technology();
            $new->title = $request->title;
            $new->slug = Help::generateSlug($new->title, Technology::class);
            $new->save();

            return redirect()->route('admin.technologies.index')->with('success', 'Technology added successfully!');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Technology $technology)
    {

        // dd($request->all());
        $val_data = $request->validate([
            'title' => 'required|min:2|max:20',
        ],
        [
            'title.required' => 'Name of the project is required.',
            'title.min' => 'The Technology name should have at least 2 characters.',
            'title.max' => 'The Technology name should have a maximum of 20 characters.',
        ]);

        $exist = Technology::where('title', $request->title)->first();
        if ($exist) {
            return redirect()->route('admin.technologies.index')->with('error', 'Technology already exist!');
        }else {
            $val_data['slug'] = Help::generateSlug($request->title, Technology::class);
            $technology->update($val_data);

            return redirect()->route('admin.technologies.index')->with('success', 'Technology modified successfully!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Technology $technology)
    {
        $technology->delete();

            return redirect()->route('admin.technologies.index')->with('success', 'Technology deleted successfully!');

    }
}
