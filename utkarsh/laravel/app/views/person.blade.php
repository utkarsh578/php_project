<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Add a new person</title>
<body>
	@if(isset($message))
		<p>{{$message}}
	@endif
	@if(Session::has('message'))
		<p>{{Session::get('message')}}
	@endif
	<form action="@if(isset($personvalue)){{"/addedit/$personvalue->userid"}}@else{{"/create"}}@endif" method="post">
	Name:      <input type="text" name="name" value=" @if(isset($personvalue)){{$personvalue->name}}@endif" required><br>
	Room no:   <input type="text" name="roomno" value="@if(isset($personvalue)){{$personvalue->roomno}}@endif" required>

	  <br>
	Mobile no: <input type="text" name="mobno" value="@if(isset($personvalue)){{$personvalue->mobno}}@endif" required><br>
	<input type="submit" value="Submit">
	</form>
</body>
</html>

