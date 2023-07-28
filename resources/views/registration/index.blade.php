@extends('layouts.my_layoute')
@section('content')

<button class="btn btn-info"> <a style="color: yellow;" href="{{ route('registration.create')}} ">create new registration</a></button><br><br>

<table style="color: yellow;" class="table table-dark table-hover" border="2px">

	<form action="{{route('/registration.filtrer')}}" method="POST">
		@csrf
	<tr>
		<td><input class="form-outline" type="text" name="filter_CourseName"></td>
		<td><input class="form-outline" type="text" name="filter_FirstName"></td>
		<td>DOJ</td>
		<td>createdate</td>
		<td>updatedate</td>
		<td><button type="submit" >Filtrer</button> </td>
		
	</tr>
</form>
	<tr>
		<td>CourseName</td>
		<td>FirstName</td>
		<td>DOJ</td>
		<td>createdate</td>
		<td>updatedate</td>
		<td>view_detail</td>
		<td>update</td>
		<td>delete</td>
	</tr>
	@foreach($registrations as $registration)
	<tr>
		 <td>{{$registration->CourseName}}</td>
         <td>{{$registration->FirstName}}</td>
         <td>{{$registration->DOJ}}</td>
         <td>{{$registration->created_at}}</td>
         <td>{{$registration->updated_at}}</td>
     <td>
     	<button class="btn btn-primary"><a style="color: yellow;" href="{{route('registration.show',$registration->created_at)}}">view_detail</a></button>
     </td>
     <td> 
  <button class="btn btn-primary"><a style="color: yellow;" href="{{route('registration.edit',$registration->created_at)}}">edit</a></button>
     </td>
         <td>
   <form action="{{route('registration.destroy',$registration->created_at)}}" method="POST">
         		@csrf
         		@method('DELETE')
      <button class="btn btn-danger">Delete</button>
         	</form>
         </td>

         
	</tr>
@endforeach
</table>
@endsection