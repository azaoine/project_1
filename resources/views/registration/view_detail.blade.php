<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body style="background: burlywood;">
        <button style="color: blue; text-decoration: none;">

 <a href="{{URL('/registration/pdf/' . $registration[0]->created_at)}}" >imprimer</a>
        </button>
        <div style="text-align: center" >
<h1 style="text-align: center;"><span style="font-family: Trebuchet MS;">La facture </span></span>
</h1>
</div>

<div style="text-align: right; margin-right: 70px;">
        <label style="font-size: 30px">Le:</label>
		<input type="date" name="Date_Aujourd'hui" style="font-size: 30px"><br>
</div>

<div style="text-align: center; display: flex; flex-direction: column;">
<table style="color: black;" border="2px">
	<tr>
		<td>CourseName</td>
		<td>FirstName</td>
		<td>Fees</td>
		<td>DOJ</td>
	</tr>
	<tr>
	<td>{{$registration[0]->CourseName}}</td>
         <td>{{$registration[0]->FirstName}}</td>
         <td>{{$registration[0]->Fees}}</td>
         <td>{{$registration[0]->DOJ}}</td>
         </tr>	

</table>

	<div style="margin-top:30%">
                <h3>Signé  Le directeur :</h3>
           </div>
   </div>
</body>
</html>
