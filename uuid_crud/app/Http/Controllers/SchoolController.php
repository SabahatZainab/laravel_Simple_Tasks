<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\School;
use App\Models\Student;
use App\Models\Image;
use Ramsey\Uuid\Uuid;

class SchoolController extends Controller
{
    public function index()
    {
        $schools = School::paginate(3);
        return view('index', compact('schools'));
    }
    public function create()
    {
        return view('create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'sch_name' => 'required',
            'city' => 'required',
            'date' => 'required',
            'image' => 'required',
            'addmore.*.name' => 'required',
            'addmore.*.father' => 'required',
            'addmore.*.address' => 'required',
            'addmore.*.class' => 'required',
            'addmore.*.profile' => 'required',
        ]);
        
        $school = School::create([
            'name' => $request->sch_name,
            'city' => $request->city,
            'date' => $request->date,
        ]);
        //Saving Image-School
        $input = $request->all();
        $school_record = School::find($school->id);
       

        
        
        $image = new Image(['image' => $request->image]);
      
        $school_record->imageable()->save($image);

        $studentsData = [];
        $studentsArray = $request->input('addmore');
        foreach ($studentsArray as $studentInfo) {
            $studentsData[] = [
                'id'            => Uuid::uuid4()->toString(),
                'name'          => is_null($studentInfo['name'])?" ":$studentInfo['name'],
                'father_name'   => is_null($studentInfo['father'])?" ":$studentInfo['father'],
                'address'       => is_null($studentInfo['address'])?" ":$studentInfo['address'],
                'class'         => is_null($studentInfo['class'])?" ":$studentInfo['class'],
                'profile'       => is_null($studentInfo['profile'])?" ":$studentInfo['profile'],
                'school_id'     => $school->id,
            ];
        }
        Student::insert($studentsData);

        return redirect()->route('schools.index')->with('success', 'School and students created successfully.');
    }
    public function edit(School $school)
    {
        $students = $school->students;
        return view('edit',compact('school','students'));
    }
    public function update(Request $request, School $school)
    {
        $request->validate([
            'sch_name' => 'required',
            'city' => 'required',
            'date' => 'required',
            'addmore.*.name' => 'required',
            'addmore.*.father' => 'required',
            'addmore.*.address' => 'required',
            'addmore.*.class' => 'required',
            'addmore.*.profile' => 'required',
        ]);
        $school = School::findOrFail($school->id);

        $updateData = $school->update([
            'name'=>$request->input('sch_name'),
            'city'=>$request->input('city'),
            'date'=>$request->input('date'),
        ]);
        if ($request->has('addmore')) {
            foreach ($request->addmore as $studentData) {
                if(isset($studentData['id'])){
                    $student = Student::findOrFail($studentData['id']); 
                    $student->update([
                        'name' => $studentData['name'],
                        'father_name' => $studentData['father'],
                        'address' => $studentData['address'],
                        'class' => $studentData['class'],
                        'profile' => $studentData['profile'],
                        'school_id' => $school->id,
                    ]);

                }else{

                    Student::insert([
                        'id'  => Uuid::uuid4()->toString(),
                        'name' => $studentData['name'],
                        'father_name' => $studentData['father'],
                        'address' => $studentData['address'],
                        'class' => $studentData['class'],
                        'profile' => $studentData['profile'],
                        'school_id' => $school->id,
                    ]);
                    
                }

            }
        }
        return redirect()->route('schools.index')->with('success', 'School and students updated successfully.');      
    }
    public function show(School $school)
    {
        $students = $school->students;
        return view('show',compact('school','students'));
    }
    public function destroy(School $school)
    {
        $school->students()->delete();
        $school->delete();
        return redirect()->route('schools.index')->with('success', 'School and associated students deleted successfully.');
    }

}
