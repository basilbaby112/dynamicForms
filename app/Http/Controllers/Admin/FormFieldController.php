<?php

namespace App\Http\Controllers\Admin;

use App\Models\FormField;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FormFieldController extends Controller
{
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $data = $request->all();
        if ($request->has('options')) {
            $data['options'] = json_encode($request->options);
        }

        $formField = FormField::create($data);
        return redirect()->route('admin.forms.show', $formField->form_id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $formField=FormField::find($id);
        $data = $request->all();
        // dd($data);
        if ($request->has('options')) {
            $data['options'] = json_encode($request->options);
        }

        $formField->update($data);
        return redirect()->route('admin.forms.show', $formField->form_id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $formField=FormField::find($id);
        $formId = $formField->form_id;
        $formField->delete();
        return redirect()->route('admin.forms.show', $formId);
    }
}
