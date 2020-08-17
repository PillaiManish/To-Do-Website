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
  		      <li class="nav-item">
		        <a class="nav-link" href="/signin">Sign In </a>
		      </li>
  		      <li class="nav-item active">
	        <a class="nav-link" href="/signup">Sign Up <span class="sr-only">(current)</span></a>
		      </li>
    </ul>
  </div>
	</nav>
	</div>
	</header>



    <br>
    <div class ="container">
    <div class = "container">
    <h4>Signup</h4>
    <hr>
    <form method = "POST">
    @csrf
    
    <div class="form-group">
        <label for="name">Name:</label>
		@if($errors->has('name'))
        <br>
        <label for ="error_name">{{ $errors->first('name')}}</label>
        @endif
        <input type="text" class="form-control" placeholder="Enter Name" id="name" name="name">
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
		@if($errors->has('email'))
        <br>
        <label for ="error_email">{{ $errors->first('email')}}</label>
        @endif
        <input type="email" class="form-control" placeholder="Enter Email" id="email" name="email">
    </div>
    <div class="form-group">
        <label for="password">Password:</label>
		@if($errors->has('password'))
        <br>
        <label for ="password">{{ $errors->first('password')}}</label>
        @endif
        <input type="password" class="form-control" placeholder="Enter Password" id="password" name="password">
    </div>

    <button type="submit" value="submit" class="btn btn-primary">Submit</button>

    </form>

</body>
</html>