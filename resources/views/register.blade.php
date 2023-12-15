<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://cdn.tailwindcss.com"></script>
	<link rel="stylesheet"
		href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
	<title>Registrasi</title>
</head>

<body>
	<div class="relative container flex h-screen w-full">
		@include('partials.nav-register')
		
		<div class="p-8">
				@include('partials.' . $page)
		</div>
		
	</div>
</body>

</html>