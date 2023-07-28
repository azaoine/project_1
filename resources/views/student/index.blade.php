@extends('layouts.my_layoute')
@section('content')

<button style="float: left;" class="btn btn-warning btn-lg btn-block" >
  <a href="{{ route('student.create')}} ">Create_New_Student</a>
</button><br>

<div class="form-group">
  
<form action="student.search" method="POST">
     @csrf
   <input class="form-outline" type="text" name="query" placeholder="search with value" value="">

   <button class="btn btn-primary">Search</button>

</form>

</div>

 <table style="color: black;" class="table  table-hover" border="2px">
	<tr class="table table-dark " >
        <form  action="{{route('/student.filtrer')}}" method="POST">
    @csrf
    <td>Studid</td>
<td>
    <input class="form-outline" type="text" name="filter_FirstName" placeholder="FirstName">
</td>
<td>
    <input class="form-outline" type="text" name="filter_LastName" placeholder="LastName"></td>
    <td>photo</td>
		<td>
<input class="form-outline" type="text" name="filter_Street" placeholder="Street">
</td>
 <td>
    <select style="color: blue;" name="filter_ville" class="form-select" id="floatingInputGrid" aria-label="Floating label select example">
    <option value="">select city</option>

       @foreach($cities as $city)
    <option  value="{{$city->city}}" >{{$city->city}}</option>
           @endforeach
        </select>
    
    </td>
	<td>
<input class="form-outline" type="text" name="filter_DOB" placeholder="Date Of Birth">
</td>
        <td >Nom_Arabe</td>
        <td >Prenom_arabe</td>
        <td >Date d'insc</td>
        <td >Niveau scolaire</td>
        <td >createDate</td>
        <td >updateDate</td>
        <td>details</td>
        <td>edit</td>

    <td>
     <button style="background-color: blue;" class="btn btn-primary" type="submit">Filtrer</button>
     </td>
     </tr>
 </form>

        <tr class="table table-warning ">
        <td >Studid</td>
        <td >FirstName</td>
        <td >LastName</td>
        <td >photo</td>
        <td >Street</td>
        <td >City</td>
        <td >DOB</td>
        <td >Nom_Arabe</td>
        <td >Prenom_arabe</td>
        <td >Date d'insc</td>
        <td >Niveau scolaire</td>
        <td >createDate</td>
        <td >updateDate</td>
        <td >deteils</td>
        <td >edit</td>
        <td >Delete</td>
        </tr>
	@foreach( $students as $student)
	<tr class="table table-primary">
		 <td class="bg-col">{{$student->Studid}}</td>
         <td class="bg-col">{{$student->FirstName}}</td>
         <td class="bg-col">{{$student->LastName}}</td>
         <td class="bg-col">
            @if($student->photo== "")
            <img src="/images/logo.png" height="80px" width="80px">

            @else
            <img src="/images/{{$student->photo}}" height="80px" width="80px">

            @endif

          </td>
         <td class="bg-col">{{$student->Street}}</td>
         <td class="bg-col">{{$student->City}}</td>
         <td class="bg-col">{{$student->DOB}}</td>
         <td class="bg-col">{{$student->Nom_Arabe}}</td>
         <td class="bg-col">{{$student->Prenom_Arabe}}</td>
         <td class="bg-col">{{$student->Date_inscription}}</td>
         <td class="bg-col">{{$student->Niveau_scolaire}}</td>
         <td class="bg-col">{{$student->created_at}}</td>
         <td class="bg-col">{{$student->updated_at}}</td>
         <td class="bg-col">
    <button type="submit" class="btn btn-info">
<a style="color:white;" href="{{route('student.show', $student->Studid)}}">detail</a>
    </button>
    </td>
     <td>
   <button  class="btn btn-success">
    <a style="color: green;" href="{{route('student.edit', $student->Studid)}}">edit</a></button>
     </td>

         <td class="bg-col">
    <form action="{{route('student.destroy',$student->Studid)}}" method="POST">
         		@csrf
         		@method('DELETE')
       <button type="submit" class="btn btn-danger">Delete</button>
         	</form>
         </td>
         
	</tr>
@endforeach
</table>

@endsection