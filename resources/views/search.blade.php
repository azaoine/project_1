@extends('layouts.my_layoute')
@section('content')
<br>
<table class="table table-dark table-hover" border="2px"> <tr>
	<tr>
		<td>Courseid</td>
		<td>CourseName</td>
		<td>Duration</td>
		<td>Fees</td>
		<td >createDate</td>
      <td>updateDate</td>
      <td>Update</td>
       <td>Delete</td>
		</tr>

		@foreach( $courses as $course)
	<tr>

		   <td>{{$course->Courseid}}</td>
         <td>{{$course->CourseName}}</td>
         <td>{{$course->Duration}}</td>
         <td>{{$course->Fees}}</td>
         <td>{{$course->created_at}}</td>
         <td>{{$course->updated_at}}</td>
         <td>
 <form action="{{route('course.edit',$course->Courseid)}}"  method="POST">
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
<table class="table table-dark table-hover" border="2px"> <tr>
  <tr>
    <td>studid</td>
    <td>FirstName</td>
    <td>LastName</td>
    <td>Street</td>
    <td>City</td>
    <td>DOB</td>
    <td >createDate</td>
    <td >updateDate</td>
    <td>Update</td>
    <td>Delete</td>
    </tr>  

  @foreach( $students as $student)
  <tr>
     <td>{{$student->Studid}}</td>
         <td>{{$student->FirstName}}</td>
         <td>{{$student->LastName}}</td>
         <td>{{$student->Street}}</td>
         <td>{{$student->City}}</td>
         <td>{{$student->DOB}}</td>
         <td>{{$student->created_at}}</td>
         <td>{{$student->updated_at}}</td>
     <td>
   <button class="btn btn-info"><a href="{{route('student.edit',$student->Studid)}}">Edit</a></button>
     </td>
         <td>
      <form action="{{route('student.destroy',$student->Studid)}}" method="POST">
            @csrf
            @method('DELETE')
       <button class="btn btn-danger">Delete</button>
          </form>
         </td>
         
  </tr>
@endforeach
</table>
@endsection