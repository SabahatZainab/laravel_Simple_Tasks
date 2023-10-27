<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\School;

class SchoolController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function create()
    {
        return view('create');
    }
    public function store(Request $request)
    {
        // echo "<pre>";
        // print_r($request->all());
        // die('ok');
        $request->validate([
            'name' => 'required',
            'city' => 'required',
            'date' => 'required',
            'std_name.*' => 'required',
            'father_name.*' => 'required',
            'address.*' => 'required',
            'class.*' => 'required',
            'profile.*' => 'required',
        ]);

        $school = School::create([
            'name' => $request->name,
            'city' => $request->city,
            'date' => $request->date,
        ]);

        $studentsData = [];
        dd($request->all());
        foreach ($request->std_name as $key => $value) {
            $studentsData[] = [
                'std_name' => $value,
                'father_name' => $request->father_name[$key],
                'address' => $request->address[$key],
                'class' => $request->class[$key],
                'profile' => $request->profile[$key],
                'school_id' => $school->id,
            ];
        }

        Student::insert($studentsData);

        return redirect()->route('schools.index')->with('success', 'School and students created successfully.');
    }

}
