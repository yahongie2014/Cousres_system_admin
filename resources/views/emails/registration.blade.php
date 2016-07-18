<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php $placement = \DB::table('placements')->first(); ?>
	<table>
		<tr>
			<td>Serial Code : </td> <td>{{ $serial }}</td>
		</tr>
		<tr>
			<td>place : </td> <td>{{ $placement->place }}</td>
		</tr>
		<tr>
			<td>date : </td> <td>{{ $placement->date }}</td>
		</tr>
		<tr>
			<td>time : </td> <td>{{ $placement->time }}</td>
		</tr>
		<tr>
			<td>message : </td> <td>{{ $placement->message }}</td>
		</tr>
	
	</table>


</body>
</html>


