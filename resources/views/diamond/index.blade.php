<!DOCTYPE html>
<html>
<head>
	<title>Application</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css') }}">
</head>
<body>
<!-- {{ csrf_field() }} -->
	<div class="container">
		<div id="app">
			<data-viewer source="/api/diamonds" title="Diamond Data"></data-viewer>
		</div>
	</div>

</body>
	<script type="text/javascript" src="{{ asset('/js/app.js') }}"></script>
</html>