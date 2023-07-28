<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\DB;
 
class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $course= Course::all();
    return view('course.index')->with('courses',$course);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('course.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
        'Duration' => 'required',
        'file'=>'required',
        'Fees' => 'required',
    ]);
     $fileName = $request->file->getClientOriginalName().'-'.time().'.'.$request->file->extension();
    $request->file->move(public_path('files'), $fileName);

     Course::create(['Courseid'=>$request->Courseid,
        'CourseName'=>$request->CourseName,
        'Duration'=>$request->Duration,
        'file'=>$fileName, 
        'Fees'=>$request->Fees]);
         return redirect('/course');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($Courseid)
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
    $cour=Course::where('Courseid', $id)->get();
    return view('course.edit')->with('course', $cour);
    
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
      $up = $request->all();

      if ($request->file) {
    $fileName = $request->file('file');   
    $fileName = $request->file->getClientOriginalName().'-'.time().'.'.$request->file->extension();
    $request->file->move(public_path('files'), $fileName);
     
}

         Course::where('Courseid',$id)
                ->update(['CourseName'=>$up['CourseName'],
                        'Duration'=>$up['Duration'], 
                        'file'=>$fileName,
                        'Fees'=>$up['Fees']]);

        return redirect('/course');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($Courseid)
    {
        Course::where('Courseid', $Courseid)->delete();
     return redirect('/course');
    }

    public function filtrer(Request $request){
        $course= DB::table('courses')
            ->where('Courseid','like','%'.$request->filter_Courseid.'%')
            ->where('CourseName','like','%'.$request->filter_CourseName.'%')
            ->where('Duration','like','%'.$request->filter_Duration.'%')
            ->where('file','like','%'.$request->filter_file.'%')
            ->where('Fees','like','%'.$request->filter_fees.'%')
            ->get();

           return view('course.index')->with('courses',$course);


    } 


}
