@extends('layouts.my_layoute')
@section('content')

<table class="table table-dark table-hover" border="2px">	<tr>
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
  <button class="btn btn-info" type="submit">Update</button>
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