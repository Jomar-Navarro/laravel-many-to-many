<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Type;
use App\Functions\Helper as Help;


class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = Type::all();

        return view('admin.types.index', compact('types'));
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
        $exist = Type::where('title', $request->title)->first();
        if ($exist) {
            return redirect()->route('admin.types.index')->with('error', 'Type already exist!');
        }else {
            $new = new Type();
            $new->title = $request->title;
            $new->slug = Help::generateSlug($new->title, Type::class);
            $new->save();

            return redirect()->route('admin.types.index')->with('success', 'Type added successfully!');
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
    public function update(Request $request, Type $type)
    {
        $val_data = $request->validate([
            'title' => 'required|min:2|max:20',
        ],
        [
            'title.required' => 'Name of the Type is required.',
            'title.min' => 'The Type name should have at least 2 characters.',
            'title.max' => 'The Type name should have a maximum of 20 characters.'
        ]);

        $exist = Type::where('title', $request->title)->first();
        if ($exist) {
            return redirect()->route('admin.types.index')->with('error', 'Type already exist!');
        }else {
            $val_data['slug'] = Help::generateSlug($request->title, Type::class);
            $type->update($val_data);

            return redirect()->route('admin.types.index')->with('success', 'Type modified successfully!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        $type->delete();

            return redirect()->route('admin.types.index')->with('success', 'Project deleted successfully!');

    }
}
