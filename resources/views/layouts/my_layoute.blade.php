  <head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="mynavbar">
      <ul class="navbar-nav me-auto">
       
        <li class="nav-item" >
          <a class="nav-link" href="#">Accueil</a>
        </li>
    <li class="nav-item" class="{{ Route::is('student.index') ? 'active' : '' }}">
    <a class="nav-link" href="{{route('student.index')}}">students</a></li>
      <li class="nav-item" class="{{ Route::is('course.index') ? 'active' : '' }}">
      <a class="nav-link" href="{{route('course.index')}}">courses</a>
      </li>
      <li class="nav-item" class="{{ Route::is('registration.index')? 'active' : '' }}">
      <a class="nav-link" href="{{route('registration.index')}}">registration</a>
      </li>
      <li class="nav-item" >
  <form  action="/student-course.search" method="POST">
     @csrf
   <input class="form-outline" type="text" name="query" placeholder="search with value">
   <button class="btn btn-primary ">Search</button>
   </form>
      </li>
      </ul>
    </div>
  </div>
</nav>


 <!-- ********************************   -->
 <div class="row">
      <div class=" col-md-12 ">
  
 @yield('content')
</div>
</div>
    
   
