<!doctype html>
<html>
<head>
<title>Form</title>
</head>
<body>
@if(Session::has('message'))
		<p>{{Session::get('message')}}
	@endif
<form action="/add_details" method="post">
	ID:      <input type="text" name="id" required><br>
	   <textarea name="details" rows="4" cols="50">Enter your details....</textarea><br>
	<input type="submit" value="Submit">
	</form>
</body>
</html>