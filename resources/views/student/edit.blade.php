@extends('layouts.my_layoute')
@section('content')
<br>
		<div class="card">
		<div class="card-header">
			
		<div class="row">
			<div class="col-sm-4"></div>
<div class="col-sm-8" style="text-align: center; border-radius: 10px;">
<form method="POST" action="{{route('student.update',$student[0]->Studid)}}" enctype="multipart/form-data">
	@csrf
	@method('PUT')
<div class="form-row">
	<div class= "form-group col-md-6">
	<label class="form-label" style="color: white;" style="color: white;">FirstName</label>
	<input class="form-control" type="text" name="FirstName" value="{{$student[0]->FirstName}}"></input>
	</div>

	<div class= "form-group col-md-6">
	<label class="form-label" style="color: white;">LastName</label>
	<input class="form-control" type="text" name="LastName" value="{{$student[0]->LastName}}"></input>
	</div>
</div>

	<div class="col-md-6 mb-3">

	<img src="/images/{{$student[0]->photo}}" height="80px" width="80px">
 	<label class="form-label" style="color: white;" >choose photo</label>
 
 <input class="form-control" type="file" name="photo" value="{{$student[0]->photo}}" ></input>

	</div>
	<div class="form-row">
	<div class= "form-group col-md-6">
	<label class="form-label" style="color: white;">Street</label>
	<input class="form-control" type="text" name="Street" value="{{$student[0]->Street}}"></input>
		</div>
		<div class= "form-group col-md-6">
		<label class="form-label" style="color: white;">City</label>
	<input class="form-control" type="text" name="City" value="{{$student[0]->City}}"></input>
	</div>
	</div>
	<div class="col-md-6 mb-3">
		<label class="form-label" style="color: white;">DOB</label>
	<input class="form-control" type="date" name="DOB" value="{{$student[0]->DOB}}"></input><br><br>
	</div>

	 <div class="form-row">
    <div class="col-md-4 mb-3">
	<label class="form-label" style="color: white;">Nom_Arabe</label>
	<input type="text" id="YourId" name="Nom_Arabe"  dir="rtl" class="keyboardInput" value="{{$student[0]->Nom_Arabe}}" ></input> 

	<link rel="stylesheet" type="text/css" href="http://www.arabic-keyboard.org/keyboard/keyboard.css"> 
	<script type="text/javascript" src="http://www.arabic-keyboard.org/keyboard/keyboard.js" charset="UTF-8"></script>
	</div>
	
    <div class="col-md-4 mb-3">
		<label class="form-label" style="color: white;">Prenom_Arabe</label>
	<input type="text" id="YourId" name="Prenom_Arabe"  dir="rtl" class="keyboardInput" value="{{$student[0]->Prenom_Arabe}}" ></input>
	<link rel="stylesheet" type="text/css" href="http://www.arabic-keyboard.org/keyboard/keyboard.css"> 
	</div>
</div>
	<div class="form-row">
    <div class="col-md-6 mb-3">
		<label class="form-label" style="color: white;">Date_inscription</label>
	<input class="form-control" type="date" name="Date_inscription" value="{{$student[0]->Date_inscription}}"></input>
	</div>
	
	<div class="col-md-6 mb-3">
		<label class="form-label" style="color: white;">Niveau_scolaire</label>
	<input class="form-control" type="number" name="Niveau_scolaire" value="{{$student[0]->Niveau_scolaire}}"></input>
	</div>
</div>
	<br>
 <button type="submit" class="btn btn-primary btn-block btn-lg ">Update_Button</button>


</form>

</div>
</div>
</div>
</div>


@endsection
