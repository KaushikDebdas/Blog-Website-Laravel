<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Builder\Function_;
use Prophecy\Doubler\Generator\Node\ReturnTypeNode;

class StudentController extends Controller
{
    # Show/view Student All student
    public function index()
    {
        $viewAllstudent = Student::all();
        return view('student.allstudent', compact('viewAllstudent'));
        //return response()->json($viewAllstudent);
    }

    public function create()
    {
        # code...
        return view('student.create');
    }

    # store Student
    public function store(Request $request)
    {
        #validation code...
        $validatedData = $request->validate([
            'name' => ['required', 'max:25', 'min:3'],
            'email' => ['required', 'unique:students'],
            'phone' => ['required', 'unique:students', 'max:11', 'min:11'],
        ]);
        #insert data with using model

        $student = new Student();   // create student object
        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->save();
        $notification = array(
            'message' => 'Succefully Create',
            'alert-type' => 'success'
        );
        return Redirect()->route('all_student')->with($notification);
        //return response()->json($student);
    }

    # View Single Student
    public function show($id)
    {
        #code...
        $view = Student::findorfail($id);
        return view('student.viewstudent', compact('view'));
        //return response()->json($view);   // Check Data with Json
    }

    # Delete Student
    public function destroy($id)
    {
        #code...
        $delete = Student::findorfail($id);
        $delete->delete();
        $notification = array(
            'message' => 'Succefully Delete',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    # Edit Student
    public function EditStudent($id)
    {
        $edit = Student::findorfail($id);
        return view('student.editstudent', compact('edit'));    // using compact method
        //return response()->json($edit);   // Check Data with Json
    }


    # Update Student
    public function UpdateStudent(Request $request, $id)
    {
        #validation code...
        $validatedData = $request->validate([
            'name' => ['required', 'max:25', 'min:3'],
            'email' => ['required',],
            'phone' => ['required', 'max:11', 'min:11'],
        ]);

        #update code using MOdel
        $update = Student::findorfail($id);
        $update->name = $request->name;
        $update->email = $request->email;
        $update->phone = $request->phone;

        $update->save();
        $notification = array(
            'message' => 'Succefully Update',
            'alert-type' => 'info'
        );
        return Redirect()->route('all_student')->with($notification);
    }
}
