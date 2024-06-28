<?php

namespace App\Http\Controllers\Admin;

use App\Models\Form;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $forms = Form::all();
        return view('admin.forms.index', compact('forms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.forms.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $form = Form::create($request->all());
        // dispatch(new \App\Jobs\SendFormCreatedNotification($form));
        return redirect()->route('admin.forms.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $form=Form::find($id);
        return view('admin.forms.show', compact('form'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $form=Form::find($id);
        // dd($form->formFields);
        return view('admin.forms.edit', compact('form'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $form=Form::find($id);
        $form->update($request->all());
        return redirect()->route('admin.forms.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $form=Form::find($id);
        $form->delete();
        return redirect()->route('admin.forms.index');
    }
}
