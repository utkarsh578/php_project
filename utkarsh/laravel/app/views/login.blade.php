<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Add a new person</title>
<body>
	@if(Session::has('message'))
		<p>{{Session::get('message')}}
	@endif
	<form action="/authenticate" method="post">
	Name:      <input type="text" name="username" required><br>
	Password:   <input type="password" name="password" required><br>
	<input type="submit" value="Submit">
	</form>
</body>
</html>

