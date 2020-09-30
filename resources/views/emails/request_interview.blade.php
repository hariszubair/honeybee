<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

{{$user->name}} ({{$user->email}}) has requested to take interviews of the following candidates.
<ul>
	@foreach($candidates as $candidate)
	<li>{{$candidate->name}}</li>
	@endforeach
</ul>
</body>
</html>