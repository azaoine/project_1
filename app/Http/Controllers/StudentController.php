<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Pdf;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
    $students =Student::all();
        

    $FirstName = DB::table('students')
                ->select('FirstName')
                ->distinct()
                ->get();
    $LastName = DB::table('students')
                ->select('LastName')
                ->distinct()
                ->get();            
    $imageName = DB::table('students')
                ->select('photo')
                ->distinct()
                ->get();
    $city = DB::table('students')
            ->select('city')
            ->distinct()
            ->get();
    $student= DB::table('students')
           // ->where('city', 'guelmim')
            ->get();
    $DOB =  DB::table('students')
             ->select('DOB')
            ->distinct()
            ->get();
    $Street = DB::table('students')
            ->select('street')
            ->distinct()
            ->get();        

   return view('student.index')
    ->with('FirstName', $FirstName)
    ->with('LastName', $LastName)
    ->with('students' ,$student)
    ->with('photo',$imageName)
    ->with('cities', $city)
    ->with('DOB', $DOB)
    ->with('street',$Street);

   /* return view('student.index')
            ->with('student', $student);
    */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->photo) {
    $imageName = time().'.'.$request->photo->extension();
    $request->photo->move(public_path('images'), $imageName);

    Student::create(['Studid'=>$request->studid,
        'FirstName'=>$request->FirstName,
        'LastName'=>$request->LastName,
        'photo'=>$imageName, 
        'Street'=>$request->Street,
        'City'=>$request->City,
        'Nom_Arabe'=>$request->Nom_Arabe,
        'Prenom_Arabe'=>$request->Prenom_Arabe,
        'Date_inscription'=>$request->Date_inscription,
        'Niveau_scolaire'=>$request->Niveau_scolaire, 
        'DOB'=>$request->DOB]);


        } else {

    Student::create(['Studid'=>$request->studid,
        'FirstName'=>$request->FirstName,
        'LastName'=>$request->LastName,
        'photo'=>"", 
        'Street'=>$request->Street,
        'City'=>$request->City,
        'Nom_Arabe'=>$request->Nom_Arabe,
        'Prenom_Arabe'=>$request->Prenom_Arabe,
        'Date_inscription'=>$request->Date_inscription,
        'Niveau_scolaire'=>$request->Niveau_scolaire, 
        'DOB'=>$request->DOB]);

        }
        
    return redirect('/student');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $students =Student::all();
        $deteil = Student::where('Studid', $id)->get();

        return view('student.deteil')
                ->with('student', $deteil)
                ->with('student', $students);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $stud = Student::where('Studid', $id)->get();

        return view('student.edit')->with('student', $stud);
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
       $input = $request->all();
     // $imageName = $input['photo'];
    if ($request->photo) {
    $imageName = $request->file('images');   
    $imageName = time().'.'.$request->photo->extension();
    $request->photo->move(public_path('images'), $imageName);
        }
          
     
     Student::where('Studid',$id)
     ->update(['FirstName'=>$input['FirstName'],
        'LastName'=>$input['LastName'],
        'Photo'=>$imageName,
        'Street'=>$input['Street'],
        'City'=>$input['City'],
        'DOB'=>$input['DOB'],
        'Nom_Arabe'=>$input['Nom_Arabe'],
        'Prenom_Arabe'=>$input['Prenom_Arabe'],
        'Date_inscription'=>$input['Date_inscription'],
        'Niveau_scolaire'=>$input['Niveau_scolaire'],
                        ]);

        return redirect('/student');
 

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($studid)
    {
     
    Student::where('Studid', $studid)->delete();
     return redirect('/student');
    }

    public function filtrer(Request $request){
   
        if (!empty($request->filter_ville) ) {
             $student= DB::table('students')
            ->where('city',$request->filter_ville)
            ->where('DOB','like','%'.$request->filter_DOB.'%')
            ->where('street','like','%'.$request->filter_Street.'%')
            ->where('FirstName','Like','%'.$request->filter_FirstName.'%')
            ->where('LastName','Like','%'.$request->filter_LastName.'%')
            ->get();
        } else {
            $student= DB::table('students')
            ->where('DOB','like','%'.$request->filter_DOB.'%')
            ->where('street','like','%'.$request->filter_Street.'%')
            ->where('city','like','%'.$request->filter_ville.'%')
            ->where('FirstName','Like','%'.$request->filter_FirstName.'%')
            ->where('LastName','Like','%'.$request->filter_LastName.'%')
            ->get();
        }
        $FirstName = DB::table('students')
                ->select('FirstName')
                ->distinct()
                ->get();
        $LastName = DB::table('students')
                ->select('LastName')
                ->distinct()
                ->get();
        $DOB = DB::table('students')
                ->select('DOB')
                ->distinct()
                ->get();      

        $city = DB::table('students')
            ->select('city')
            ->distinct()
            ->get();
        $Street= DB::table('students')
            ->select('street')
            ->distinct()
            ->get();
          
                

       return view('student.index')
       ->with('FirstName', $FirstName)
       ->with('LastName',$LastName)
        ->with('students' ,$student)
        ->with('cities', $city)
        ->with('DOB',$DOB)
        ->with('street',$Street);
        

 }  

    public function createPDF($id) {
      // retreive all records from db
      $data = Student::where('Studid',$id)->get();
      // share data to view
      view()->share('student',$data);
      $pdf = PDF::loadView('student/deteil');
      // download PDF file with download method
      return $pdf->download('attestation.pdf');
    }

}
