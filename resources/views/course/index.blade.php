@extends('layouts.my_layoute')
@section('content')
<button style="float: left;" class="btn btn-primary"><a style="color: white;" href="{{ route('course.create')}} ">create new course</a></button><br>
<div class="row">
  <div class="col-sm-4">
    </div>
  <div class="col-sm-4">
<form action="course.search" method="POST"><br>
     @csrf
   <input class="form-outline" type="" name="query" placeholder="search with value" value=""><br>
   <button class="btn btn-primary">Search</button>
   </form>
   </div>
   </div>
   <table style="color: yellow;" class="table table-dark table-hover" border="2px">
    <form action="{{route('/course.filtrer')}}" method="POST">
      @csrf
    <tr>
    <td><input class="form-outline" type="text" name="filter_Courseid" ></td>
    <td><input class="form-outline" type="text" name="filter_CourseName" ></td>
    <td><input class="form-outline" type="text" name="filter_Duration" ></td>
    <td><input class="form-outline" type="text" name="filter_file" ></td>
    <td><input class="form-outline" type="text" name="filter_fees" ></td>
    <td >createDate</td>
      <td>updateDate</td>
      <td><button type="submit" class="form-outline">Filtrer</button></td>
       
    </tr>
</form>
	<tr>
		<td>Courseid</td>
		<td>CourseName</td>
		<td>Duration</td>
    <td>file</td>
		<td>Fees</td>
		<td >createDate</td>
      <td>updateDate</td>
      <td>Update</td>
       <td>Delete</td>
		</tr>

		@foreach($courses as $course)
	<tr>

		   <td>{{$course->Courseid}}</td>
         <td>{{$course->CourseName}}</td>
         <td>{{$course->Duration}}</td>
         <td>
              @if($course->file== "")
            <a href="files/{{$course->file }}">No file</a>

            @else
          <a target="_blank" href="files/{{$course->file }}">{{$course->file }}</a>
            @endif
        </td>
         <td>{{$course->Fees}}</td>
         <td>{{$course->created_at}}</td>
         <td>{{$course->updated_at}}</td>
         <td>
<form action="{{route('course.edit',$course->Courseid)}}"method="POST">
         		@csrf
         		@method('GET')
  <button class="btn btn-success" type="submit">Update</button>
      </form>

         </td>
         <td>
      <form action="{{route('course.destroy',$course->Courseid)}}" method="POST">
         		@csrf
         		@method('DELETE')
        <button class="btn btn-danger">Delete</button>
         	</form>
         </td>
         
	</tr>
@endforeach
</table>
@endsection