@extends('layouts.my_layoute')
@section('content')

<div style="text-align: center;" class="container-fluif">
	<div class="row">
<div class="col-md-8"  style="text-align: center; background: black; border-radius: 10px;">
<form style="text-align: center; margin-top: 30px" action="{{route('student.store')}}" method="POST" enctype="multipart/form-data">
	@csrf
<h3 style="color: white;">Enter a new course</h3>
	<div class="form-group">
	<label class="form-label" style="color: white;">FirstName</label> 
<input class="form-control" type="text" name="FirstName" value=""></input><br>
</div>
	<div class="form-group">
	<label class="form-label" style="color: white;">LastName</label>
 <input class="form-control" type="text" name="LastName" value=""></input><br>
	</div>
	<div class="form-group">
 <label class="form-label">choose photo</label>
 <input class="form-control" type="file" name="photo" ></input><br>

	</div>

	<div class="form-group">
	<label class="form-label" style="color: white;">Street</label>
	<input class="form-control" type="text" name="Street"></input><br>
	</div>
	<div class="form-group">
	<label class="form-label" style="color: white;">City</label>
    <input class="form-control" type="text" name="City" ></input><br>
	</div>
	<div class="form-group">
	<label class="form-label" style="color: white;">DOB</label>
	<input class="form-control" type="date" name="DOB" ></input><br>
 </div>

 <div class="form-group" >
	<label class="form-label" style="color: white;">Nom_Arabe</label>
	<input type="text" id="YourId" name="Nom_Arabe"  dir="rtl" class="keyboardInput"> 
<link rel="stylesheet" type="text/css" href="http://www.arabic-keyboard.org/keyboard/keyboard.css"> 
	<script type="text/javascript" src="http://www.arabic-keyboard.org/keyboard/keyboard.js" charset="UTF-8"></script> 

   <!-- <input class="form-control" type="text" name="Nom_Arabe" ></input>-->
	
	</div><br>
	<div class="form-group">
	<label class="form-label" style="color: white;">Prenom_Arabe</label>
	<input type="text" id="YourId" name="Prenom_Arabe"  dir="rtl" class="keyboardInput"> 
<link rel="stylesheet" type="text/css" href="http://www.arabic-keyboard.org/keyboard/keyboard.css">  
 <link rel="stylesheet" type="text/css" href="/chemin/vers/keyboard.css">
    <script type="text/javascript" src="/chemin/vers/keyboard.js" charset="UTF-8"></script>
	 
    <!--<input class="form-control" type="text" name="Prenom_Arabe" ></input>-->
    <br>
	
	</div>
	<div class="form-group">
	<label class="form-label" style="color: white;">Date_inscription</label>
    <input class="form-control" type="date" value="Date_inscription" name="Date_inscription" ></input><br>
	</div>
	<div class="form-group">
	<label class="form-label" style="color: white;">Niveau_Scolaire</label>
	<input class="form-control" type="number" name="Niveau_scolaire" ></input><br>
 </div>

	<button class="btn btn-primary">Send</button>
</div>
</div>
</div>
</div>
</form>
@endsection
