@extends('layouts.my_layoute')
@section('content')
<br>
<div style="text-align: center;" class="container-fluif">
	<div class="row">
<div class="col-md-8"  style="text-align: center; background: black; border-radius: 10px;">
    

<form style="text-align: center; margin-top: 50px" action="{{route('course.store')}}" method="POST" enctype="multipart/form-data">
@csrf

	@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
           @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
	<h3 style="color: white;">Enter a new course</h3>
	<div class=" form-group">
 <input class="form-control" type="text" name="CourseName" value="" placeholder="CourseName"></input><br><br></div>
 <div class="form-group">
 <input class="form-control" type="text" name="Duration" value="" placeholder="Duration"></input><br>
 </div>
 <div class="mb-3">
  <label for="formFile" class="form-label"></label>
  <input class="form-control" type="file" name="file" id="formFile">
</div><br>
 <div class="form-group">
 <input class="form-control" type="number" name="Fees" value="" placeholder="Fees"></input><br><br>
	</div>

	<button class="btn btn-primary" >Created</button>

</div>
</div>
</div>

</form>
@endsection

