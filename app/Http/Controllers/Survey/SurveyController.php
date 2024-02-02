<?php

namespace App\Http\Controllers\Survey;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Survey;

class SurveyController extends Controller
{
    public function index()
    {
        return view('survey.index');
    }

    public function kirim(Request $request)
    {
        // dd($request->all());
        Survey::create(['value' => $request->value]);

        session()->flash('success', 'Terimakasih telah mengisi Survey');
        return redirect('/');
    }
}
