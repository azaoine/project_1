
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<h1>hello</h1>
<div class="container-fluif">
	<div class="row">
	<div class="col-sm-4" style="background-color:lavenderblush;">
<form action="{{route('student.store')}}" method="POST">
  <div class="form-group">
    <label for="text">FirstName</label>
    <input type="text" name="FirstName" class="form-control" id="text"><br><br>
  </div>
  <div class="form-group">
    <label for="text">LastName</label>
    <input type="text" name="LastName" class="form-control" id="text"><br><br>
  </div>
  <div class="form-group">
    <label for="text">Street</label>
    <input type="text" name="Street" class="form-control" id="text"><br><br>
     </div>
     <div class="form-group">
    <label for="text">City</label>
    <input type="text" name="City" class="form-control" id="text"><br><br>
     </div>
  <div class="form-group">
  	 <label for="text">DOB</label>
   <input type="date" name="DOB" class="form-control" id="text"><br><br>
  </div>
  <button type="submit" class="btn btn-info">Submit</button>
</form>
	</div>
	<div class="col-sm-8" style="background-color:lavender;">
		<table class="table table-hover">
			<thead>
				<th>firstname</th>
				<th>Lastname</th>
				<th>Street</th>
				<th>City</th>
				<th>DOB</th>
				<th>Update</th>
				<th>Delete</th>
			</thead>
			<tbody>
				<tr>
				<td>John</td>
				<td>Doe</td>
				<td>Almokawama</td>
				<td>Casa</td>
				<td>20/10/1988</td>
				<td><button type="button" class="btn btn-success">Update</button></td>
				<td><button type="button" class="btn btn-danger">Delete</button></td>
				</tr>
				<tr>
				<td>Mary</td>
				<td>Moe</td>
				<td>Far</td>
				<td>Agadir</td>
				<td>21/02/2000</td>
				<td><button type="button" class="btn btn-success">Update</button></td>
				<td><button type="button" class="btn btn-danger">Delete</button></td>
				</tr>

			</tbody>
		</table>
		
	</div>
	</div>
</div>
<button type="button" class="btn">Basic</button>
<button type="button" class="btn btn-default">Default</button>
<button type="button" class="btn btn-primary">Primary</button>
<button type="button" class="btn btn-success">Success</button>
<button type="button" class="btn btn-info">Info</button>
<button type="button" class="btn btn-warning">Warning</button>
<button type="button" class="btn btn-danger">Danger</button>
<button type="button" class="btn btn-link">Link</button>
