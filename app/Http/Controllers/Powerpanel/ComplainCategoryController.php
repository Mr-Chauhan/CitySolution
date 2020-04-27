<?php

namespace App\Http\Controllers\Powerpanel;

use App\Complain_Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ComplainCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories  = Complain_Category::all()->sortByDesc('created_at');
        return view('powerpanel.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Powerpanel.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Complain_Category::create($request->all());
        return redirect()->route('complain-category.index')->with('success', 'The record edit and save successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Complain_Category::findOrfail($id);
        return view('powerpanel.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ComplainCategory = Complain_Category::findOrFail($id);
        $ComplainCategory->update($request->all());
        return redirect()->route('complain-category.index')->with('success', 'The record edit and save successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Complain_Category::findOrFail($id)->delete();
        return redirect('/powerpanel/complain-category');
    }

    public function deleteRecord(Request $request)
    {
        $Complain_Categories = Complain_Category::findOrFail($request->checkBoxArray);
        foreach ($Complain_Categories as $Complain_Category) {
            $Complain_Category->delete();
        }
        return redirect()->back()->with('error', 'The record has beed deleted successfully.');
    }
}
