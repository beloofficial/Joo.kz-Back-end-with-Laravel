<!DOCTYPE html>
<html>
<head>
	<title>Test connection</title>
</head>
<body>
	<h1>Aslan Aitkulov</h1>

	 @foreach($professions as $pro)
	 	<h1>{{$pro->pro_id}}</h1>
	 	<p>{{$pro->pro_name}}</p>
	 @endforeach
	  <span class="pagination">{{$professions->links()}}</span>
</body>
</html>