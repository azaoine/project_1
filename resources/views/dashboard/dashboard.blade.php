@extends('layouts.my_layoute')
@section('content')
<br>
<table class="table table-hover" border="2px" >
	<tr>

		<th>le nomber d'etudiant</th>
		<th>le total des courses</th>
		<th>le nombre des registrations</th>
	</tr>

	<tr>
 <td>{{$nomberstudent[0]->nb_etudiant}}</td> 

<td>{{$totalcourses[0]->tl_courses}}</td>

 
<td>{{$nb_registration[0]->nb_registration}}</td>
  
</tr>

</table>
<br>
<table class="table table-hover" border="2px">
	<tr>
		<th>mois</th>
		@foreach($nombre_insc_par_mois as $nb_insc_mois)
		<th>
	{{$nb_insc_mois->mois}}
		</th>

		@endforeach

	</tr>
	<tr>
		<th>nombre_inscription</th>
		@foreach($nombre_insc_par_mois as $nb_insc_mois)
		<th>
	{{$nb_insc_mois->nb_insc}}
		</th>

		@endforeach
	</tr>
	
</table>

<table class="table table-hover" border="3px">
 	<tr>
		<th>le_mois_courant</th>
			<th>le_max_insc</th>
			<th>le_min_insc</th>
</tr>
<tr>
	  <td>{{$nb_insc_mois_courant[0]->nb_insc_mois_courant}}</td>
	  <td>{{$le_max_mois_insc->mois}} : {{$le_max_mois_insc->nb_insc}}</td>
	  <td>{{$le_min_mois_insc->mois}} : {{$le_min_mois_insc->nb_insc}}</td>
</tr>
</table>

@endsection