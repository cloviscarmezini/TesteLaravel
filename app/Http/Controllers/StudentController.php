<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\Course;
use App\Models\Student;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::paginate(5);

        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::all();

        return view('students.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {
        $data = $request->all();

        $student = Student::create($data);

        
        if(isset($data['courses'])) {
            $courses_array = [];

            foreach($data['courses'] as $course) {
                array_push($courses_array, [
                    'course_id' => $course
                ]);
            }
    
            $student->courses()->createMany($courses_array);
        }


        return redirect()->route('students.index');
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
        $student = Student::find($id);
        $courses = Course::all();

        return view('students.edit', compact(['student', 'courses']));
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
        $data = $request->all();

        $student = Student::find($id);

        $student->update($data);

        if($student->courses) {
            $student->courses()->delete();
        }

        if(isset($data['courses'])) {
            $courses_array = [];
    
            foreach($data['courses'] as $course) {
                array_push($courses_array, [
                    'course_id' => $course
                ]);
            }
    
            $student->courses()->createMany($courses_array);
        }

        return redirect()->route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();
        return redirect()->route('students.index');
    }

    public function getStudentCertificate($student_id, $course_id) {
        /*  normalmente se usario o Auth()->user, para detectar o aluno
            porém, como não criei uma autenticação, farei deste modo.

            Também haveria uma validação para verificar se o aluno possui este curso,
            e se este curso está concluido.
        */
        
        $student = Student::find($student_id);
        $course = Course::find($course_id);

        $data = [
            'student' => $student,
            'course' => $course
        ];
  
        // share data to view
        view()->share('data',$data);

        $pdf = PDF::loadView('students.certificate', $data)->setPaper('a4', 'landscape');
  
        // download PDF file with download method
        return $pdf->download('certificado.pdf');
      }
}
