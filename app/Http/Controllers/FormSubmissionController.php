<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\Request;
use App\Models\FormSubmission;

class FormSubmissionController extends Controller
{
    public function index(){

        $forms=Form::all();
        return view('welcome',compact('forms'));
    }

    public function store(Request $request)
    {
        $formId = $request->input('form_id');
        $form=Form::find($formId);
        FormSubmission::create([
            'form_id' => $form->id,
            'data' => json_encode($request->all())
        ]);
        return redirect()->route('forms.show', $form->id)->with('message', 'Form submitted');;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $form=Form::find($id);
        //var_dump($form); exit;
        return view('forms.show', compact('form'));
    }

}
