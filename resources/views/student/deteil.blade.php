<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Certaficat de scolarité</title>
</head>
<body style="background: burlywood;">
        <button style="color: blue; text-decoration: none;">

 <a href="{{URL('/student/pdf/' . $student[0]->Studid)}}" >imprimer</a>
        </button>
        <div style="text-align: center" >

<img width="700" height="150" src='./images/logo1.jpg'  border="1px" alt="logo_ministre" >

                <h3><span >مدرسة أحمد الحنصالى  </span></h3>
        </div>
 <h1 style="text-align: center;">
        <span style="font-family: Trebuchet MS;">Certaficat de Scolarite</span>
</h1>
<div style="text-align: center;">

<div style="text-align: right; margin-right: 70px;">

        <label style="font-size: 30px">Le:</label>
<input type="date" name="Date_Aujoud'hui" style="font-size: 30px">

<br>
        <div style="text-align: right; float: right ; ">
                <br>
<img src=" ./images/{{$student[0]->photo}}" alt="photo" style="width:150px;height: 150px;">
        </div>
        <br>
  <div style="text-align: left; margin-left: 80px">
                <p style="font-size: 30px; text-align: left;" >
        Je soussigné que le nommé : {{$student[0]->FirstName}}  {{$student[0]->LastName}} <br>
         {{$student[0]->Nom_Arabe}} 
        {{$student[0]->Prenom_Arabe}}   <br>     

        Sa date de naissance : {{$student[0]->DOB}} <br> 
        Son niveau scolaire : {{$student[0]->Niveau_scolaire}} <br>
        Son addresse : {{$student[0]->Street}}  {{$student[0]->City}} <br>

                poursuit ses études à l’ecole  <br> depuis {{$student[0]->created_at }}
                                 
</p>
</div>
</div>

                <h3 style="text-align: center;">Signé  Le directeur :</h3>
</body>
</html>



