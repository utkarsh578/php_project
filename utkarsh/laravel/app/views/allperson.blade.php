<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Add a new person</title>
<body>
	@if(Session::has('message'))
		<p>{{Session::get('message')}}
	@endif
	<br>
	<table>
		<tr>
			<th>Name</th>
			<th>Room No</th>
			<th>Mobile no</th>
			<th>Actions</th>
		</tr>
		@foreach($person as $pr)
			<tr>
				<td>{{$pr->name}}</td>
				<td>{{$pr->roomno}}</td>
				<td>{{$pr->mobno}}</td>
				<td>  <a href="/delete/{{$pr->userid}}">Delete</a></td>
				<td>  <a href="/edit/{{$pr->userid}}">Edit</a></td>
				<td> {{$pr->userid}}
				<br>
			</tr>
		@endforeach
	</table>
	<a href="/logout">Logout</a>
	<a href="/dashboard">Add person</a></td>

</body>
</html>