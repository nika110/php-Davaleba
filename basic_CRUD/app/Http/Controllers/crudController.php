<?php

namespace App\Http\Controllers;

use App\Models\Crud;
use Illuminate\Http\Request;

class crudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cruds = Crud::latest()->paginate(5);

        return view('cruds.index',compact('cruds'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        Crud::create($request->all());

        return redirect()->route('crudss.index')
            ->with('success','Crud created successfully.');
    }


    public function show(Crud $crud)
    {
        return view('cruds.show',compact('crud'));
    }


    public function edit(Crud $crud)
    {
        return view('cruds.edit',compact('crud'));
    }


    public function update(Request $request, Crud $crud)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $crud->update($request->all());

        return redirect()->route('cruds.index')
            ->with('success','Crud updated successfully');
    }


    public function destroy(Crud $crud)
    {
        $crud->delete();

        return redirect()->route('cruds.index')
            ->with('success','Cruds deleted successfully');
    }
}
