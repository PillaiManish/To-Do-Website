<!DOCTYPE html>
<html>
<head>
	<title>Pillai's To Do</title>
	<!-- CSS only -->

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

	<!-- JS, Popper.js, and jQuery -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>


	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<header>
		<div class="container">
			<nav class="navbar navbar-expand-lg navbar-light">
 			 	<a class="navbar-brand" href="/">Pillai's To-Do App</a>
  				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    				<span class="navbar-toggler-icon"></span>
  				</button>

		  	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		    <ul class="navbar-nav ml-auto">
		      <li class="nav-item active">
		        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
		      </li>
          <li class="nav-item">
		        <a class="nav-link">{{Auth::user()->email}}</a>
		      </li>
          @if(Auth::check())
          <li class="nav-item">
		        <a class="nav-link" href="/signout">SignOut</a>
		      </li>
          @else
          <li class="nav-item">
		        <a class="nav-link" href="/signin">Sign In</a>
		      </li>
  		      <li class="nav-item">
	        <a class="nav-link" href="/signup">Sign Up</a>
		      </li>
          @endif

    </ul>
  </div>
	</nav>
	</div>
	</header>



    <br>
    <div class ="container">
    <div class = "container">
    <a data-toggle="collapse" href="#collapse_add">Add New</a>
    <br><br>
    <form method = "POST"  id="collapse_add">
    @csrf
    
    <div class="form-group">
        <label for="title">Title</label>
        @if($errors->has('title'))
        <br>
        <label for ="error_title">{{ $errors->first('title')}}</label>
        @endif
        <input type="text" class="form-control" placeholder="Enter Title" id="title" name="title">
    </div>
    <div class="form-group">
        <label for="description">Description:</label>
        @if($errors->has('description'))
        <br>
        <label for ="error_description">{{ $errors->first('description')}}</label>
        @endif
        <input type="text" class="form-control" placeholder="Enter Description" id="description" name="description">
    </div>

    <div class="form-group">
        <label for= "priority">Priority</label>
        <select id="priority" class="form-control" name="priority">
        <option value="low">Low</option>
        <option value="medium">Medium</option>
        <option value="high">High</option>

      </select>
    </div>

    <div class="form-group">
    <label for= "date">Date</label>
    @if($errors->has('deadline'))
        <br>
        <label for ="error_deadline">{{ $errors->first('deadline')}}</label>
        @endif
    <input type='date' class="form-control" id='datetimepicker1'name="deadline">
    </div>



    <button type="submit" value="submit" class="btn btn-primary">Submit</button>
    <br>

    <hr>
 
    </form> 
    </div>
    </div>

    <div class = "container">
    <div class = "container">

    <a data-toggle="collapse" href="#collapse_list">To-Do</a>
    </div>
    </div>

    <br>

	<div class ="container" id="collapse_list">
    @foreach($todo as $td)
   
    <div class = "container">
	
    <div class="card">
  <div class="card-header"><h5>{{$td->Title}}</h5>

		<div class="d-flex justify-content-between">
			
  		<a href="/edit/{{$td->id}}"><div>Edit</div></a>
  		<a href="/delete/{{$td->id}}"><div>Delete</div></a>
		</div>
				  </h5>
	</div>

  <div class="card-body">
    <div class="card-text"> 
    <p>Description : {{$td->Description}} </p>
    <p>Deadline : {{$td->Deadline}}</p>
	</div>

    <a href="/complete/{{$td->id}}" class="btn btn-primary">Completed</a>
  </div>
</div>
</div>
 <br>
@endforeach
<hr>

</div>


<div class = "container">
    <div class = "container">

    <a data-toggle="collapse" href="#collapse_complete">Completed</a>
    </div>
</div>
<br>
    @foreach($completed as $td)

	<div class ="container" id="collapse_complete">
    <div class = "container">
	
    <div class="card">
  <div class="card-header"><h5>{{$td->Title}}</h5>

		<div class="d-flex justify-content-between">
			
  		<a href="/delete/{{$td->id}}"><div>Delete</div></a>
		</div>
				  </h5>
	</div>

  <div class="card-body">
    <div class="card-text"> 
    <p>Description : {{$td->Description}} </p>
    <p>Time : {{$td->Deadline}}</p>
    <p>Completed at : {{$td->Completed}}</p>
	</div>
  </div>
</div>
</div>
</div>
 
<br>
@endforeach





</body>
</html>