<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $nomberstudent = DB::select( "select count(*) as 'nb_etudiant' from students ;");
          //dd($nomberstudent);

    $totalcourses = DB::select("select count(*) as 'tl_courses' from courses ;");
    $nbregistration = DB::select("select count(*) as 'nb_registration' from registrations;");

 $nombre_insc_par_mois = DB::select("select count(*) as 'nb_insc', substr(DOJ,1,7) as 'mois' from registrations group by substr(DOJ,1,7)");


        $le_max_mois_insc=collect($nombre_insc_par_mois)->max();
        $le_min_mois_insc=collect($nombre_insc_par_mois)->min();
     

 $mois_courant = date('Y-m');

 $nb_insc_mois_courant = DB::select("select count(*) as 'nb_insc_mois_courant' FROM registrations where substr(DOJ,1,7) = '". $mois_courant ."'");
 
 //$nb_insc_mois_courant = DB::table('registrations')
                  //  ->\DB::raw("substr(DOJ,1,7) =' ".$mois_courant."'")
                    //->select(" count(*) as 'nb_insc_mois_courant'")
                 //   ->count();

   
        //dd($le_max_mois_insc);


//$le_min_mois_insc = DB::select("select min(substr(DOJ,1,7)) as 'le_mois_min' from registrations ");

//dd($nb_insc_mois_courant);
//$nb_insc_mois_courant = DB::select("select count(*) as 'nb_insc_mois_courant' FROM registrations where substr(DOJ,1,7) = $mois_courant ");


//$plus_insc_du_mois = DB::select("select count(*) as 'plus_insc_mois' from registrations where registrations.created_at like '%2023-$plus_insc_mois%'");
        return view('dashboard.dashboard')
        ->with('nb_registration',$nbregistration)
        ->with('totalcourses', $totalcourses)
        ->with('nomberstudent',$nomberstudent)
        ->with('nombre_insc_par_mois',$nombre_insc_par_mois)
        ->with('nb_insc_mois_courant',$nb_insc_mois_courant)
        ->with('le_max_mois_insc',$le_max_mois_insc)
        ->with('le_min_mois_insc',$le_min_mois_insc)
        ;

    }
   


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
