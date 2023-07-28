<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;
use App\Models\Student;
use App\Models\Course;
use Illuminate\Support\Facades\DB;
use Pdf;
class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    //$registration= Registration::all();
    $registration=DB::select('select students.FirstName, courses.CourseName, registrations.DOJ, registrations.created_at,registrations.updated_at from students, courses, registrations where registrations.courseid=courses.courseid and registrations.studid=students.studid;');
    return view('registration.index')->with('registrations',$registration);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students=Student::all();
        $courses=Course::all();

        return view('registration.create')
        ->with('students',$students)
        ->with('courses',$courses);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Registration::create($request->all());
        return redirect('/registration');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$students=Student::all();
        //$courses=Course::all();
        $registration=DB::select('select students.FirstName, courses.CourseName, courses.Fees, registrations.DOJ, registrations.created_at,registrations.updated_at, courses.Fees from students, courses, registrations where registrations.courseid=courses.courseid and registrations.studid=students.studid;');

       //$view_detail = Registration::where('Studid', $students) 
        //->where('Courseid',$courses)
       // ->get();
        return view('registration.view_detail')
        ->with('registration', $registration);
        //->with('students',$students)
       // ->with('courses',$courses);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($created_at)
    {
        $course = Course::all();
        $student = Student::all();
       $registration = Registration::where('created_at',$created_at)->get();

            return view('registration.edit')
            ->with('registration', $registration)
            ->with('courses' , $course)
            ->with('students', $student);

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $date)
    {
       $set = $request->all();

    Registration::where('created_at', $date)->update(['Courseid'=>$set['Courseid'],'Studid'=>$set['Studid'], 'DOJ'=>$set['DOJ'] ]);
     return redirect('/registration');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($date)
    {
        Registration::where('created_at',$date)->delete();
     return redirect('/registration');
    }
        public function createPDF($created_at) {
      // retreive all records from db
$data=DB::select("select students.FirstName, courses.CourseName, courses.Fees, registrations.DOJ, registrations.created_at,registrations.updated_at, courses.Fees from students, courses, registrations where registrations.courseid=courses.courseid and registrations.studid=students.studid and registrations.created_at='".$created_at."'");
     

      // share data to view
      view()->share('registration',$data);
      $pdf = PDF::loadView('registration/view_detail');
      // download PDF file with download method
      
     return $pdf->download('facture.pdf');
    }


    public function filtrer(Request $request){
      //  $registration=DB::select("select students.FirstName, courses.CourseName, registrations.DOJ, registrations.created_at,registrations.updated_at from students, courses, registrations where registrations.courseid=courses.courseid and registrations.studid=students.studid and courses.CourseName like '%".$request->filter_CourseName."%'  and students.FirstName like '%".$request->filter_FirstName."%' ;");
       $registration=DB::table('registrations')
            ->join('students', 'registrations.studid', '=', 'students.studid')
            ->join('courses', 'registrations.courseid', '=', 'courses.courseid')
            ->select('students.FirstName', 'courses.CourseName', 'registrations.DOJ', 'registrations.created_at', 'registrations.updated_at')
            ->where('courses.courseName','Like','%'.$request->filter_CourseName.'%')
            ->where('students.FirstName','Like','%'.$request->filter_FirstName.'%')
            ->get();
    return view('registration.index')
    ->with('registrations',$registration);




    }



}
