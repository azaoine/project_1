@extends('layouts.my_layoute')
@section('content')


 <table style="color: yellow;" class="table table-dark table-hover" border="2px">
	<tr class="table table-dark ">
		<td class="table-dark">id</td>
		<td>FirstName</td>
		<td>LastName</td>
      <td>photo</td>
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
         <td>
            @if($student->photo== "")
         <img src="/images/logo.png" height="80px" width="80px">

            @else
         <img src="/images/{{$student->photo}}" height="80px" width="80px">

            @endif

          </td>
         <td>{{$student->Street}}</td>
         <td>{{$student->City}}</td>
         <td>{{$student->DOB}}</td>
         <td>{{$student->created_at}}</td>
         <td>{{$student->updated_at}}</td>
     <td>
   <button class="btn btn-success">
    <a style="color: white;" href="{{route('student.edit',$student->Studid)}}">edit</a>
  </button>
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