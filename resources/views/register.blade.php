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
		<!-- Sidebar -->
		<aside
			class="relative group/sidebar p-8 flex flex-col shrink-0 lg:w-[300px] w-[250px] transition-all duration-300 ease-in-out m-0 fixed z-40 inset-y-0 left-0 bg-white border-r border-r-dashed border-r-neutral-200 sidenav fixed-start gap-y-8"
			id="sidenav-main">
			<div class="flex shrink-0 items-center justify-between h-[40px]">
				<a class="transition-colors duration-200 ease-in-out" href="#">
					<img alt="Logo" src="{{ asset('logo-UPK.svg') }}" class="inline">
				</a>
			</div>

			<div class="hidden border-b border-dashed lg:block dark:border-neutral-700/70 border-neutral-200"></div>

			<ol class="relative text-gray-500 border-s border-gray-200 dark:border-gray-700 dark:text-gray-400 pl-2" id="navbar">
				<li class="group active mb-10 ms-6">
					<span
						class="absolute flex items-center justify-center w-8 h-8 bg-gray-100 group-[.active]:bg-cyan-200 rounded-full -start-4 ring-4 ring-white dark:ring-gray-900 dark:bg-green-900">
							<span class="absolute material-symbols-outlined items-center text-gray-500 group-[.active]:text-cyan-500">
								account_circle
							</span>
					</span>
					<h3 class="font-semibold leading-tight group-[.active]:text-cyan-600">Personal Info</h3>
					<p class="text-sm">Step details here</p>
				</li>
				<li class="group mb-10 ms-6">
					<span
						class="absolute flex items-center justify-center w-8 h-8 bg-gray-100 group-[.active]:bg-cyan-200 rounded-full -start-4 ring-4 ring-white dark:ring-gray-900 dark:bg-green-900">
						<span class="absolute material-symbols-outlined items-center text-gray-500 group-[.active]:text-cyan-500">
							assignment_ind
						</span>
					</span>
					<h3 class="font-semibold leading-tight group-[.active]:text-cyan-600">Account Info</h3>
					<p class="text-sm">Step details here</p>
				</li>
				<li class="group ms-6">
					<span
						class="absolute flex items-center justify-center w-8 h-8 bg-gray-100 group-[.active]:bg-cyan-200 rounded-full -start-4 ring-4 ring-white dark:ring-gray-900 dark:bg-green-900">
						<span class="absolute material-symbols-outlined items-center text-gray-500 group-[.active]:text-cyan-500">
							assignment_turned_in
						</span>
					</span>
					<h3 class="font-semibold leading-tight group-[.active]:text-cyan-600">Confirmation</h3>
					<p class="text-sm">Step details here</p>
				</li>
			</ol>

			<div>
				<p class="mt-10 text-sm text-gray-500">
					Sudah Punya Akun?
					<a href="{{ route('login') }}" class="font-semibold leading-6 text-cyan-600 hover:text-cyan-500">Login</a>
			</div>
		</aside>
		<!-- End Sidebar -->
		<div class="p-8">
			<form action="{{ route('register.store') }}" method="POST">
				@csrf
				<div id="personal-form">
					<h2 class="mt-10 text-2xl font-bold leading-9 tracking-tight text-gray-900 ">Personal Info</h2>
					<p class="text-base leading-9 tracking-tight text-gray-400">
						Masukkan Identitas Diri Anda.
					</p>
					<div class="w-full mt-5 grid grid-cols-2 gap-4">
						<div class="col-span-2 order-1">
							<label for="photo" class="block text-sm font-medium leading-6 text-gray-900">Foto Profil
								(Opsional)</label>
							<div class="mt-2 flex items-center gap-x-3">
								<svg class="h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
									<path fill-rule="evenodd"
										d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z"
										clip-rule="evenodd" />
								</svg>
								<button type="button"
									class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Change</button>
							</div>
						</div>

						<div class="row-span-1 order-3">
							<label for="pjmk_nama" class="block text-sm font-medium leading-6 text-gray-900">Nama</label>
							<div class="mt-2">
								<input type="text" name="pjmk_nama" id="pjmk_nama" autocomplete="given-name"
									class="block w-full rounded-md border-0 pl-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-1 focus:ring-inset focus:ring-cyan-600 sm:text-sm sm:leading-6">
							</div>
						</div>

						<div class="row-span-1 order-2">
							<label for="pjmk_nim" class="block text-sm font-medium leading-6 text-gray-900">NIM (Nomor Induk
								Mahasiswa)</label>
							<div class="mt-2">
								<input type="text" name="pjmk_nim" id="pjmk_nim" autocomplete="given-name"
									class="block w-full rounded-md border-0 pl-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-1 focus:ring-inset focus:ring-cyan-600 sm:text-sm sm:leading-6">
							</div>
						</div>

						<div class="row-span-1 order-4">
							<label for="pjmk_kelas" class="block text-sm font-medium leading-6 text-gray-900">Kelas</label>
							<div class="mt-2">
								<input type="text" name="pjmk_kelas" id="pjmk_kelas" autocomplete="given-name"
									class="block w-full rounded-md border-0 pl-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-1 focus:ring-inset focus:ring-cyan-600 sm:text-sm sm:leading-6">
							</div>
						</div>

						<div class="row-span-1 order-5">
							<label for="pjmk_phone" class="block text-sm font-medium leading-6 text-gray-900">Nomor HP</label>
							<div class="mt-2">
								<input type="phone" name="pjmk_phone" id="pjmk_phone" autocomplete="given-name"
									class="block w-full rounded-md border-0 pl-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-1 focus:ring-inset focus:ring-cyan-600 sm:text-sm sm:leading-6">
							</div>
						</div>

						<div class="row-span-1 order-6">
							<label for="pjmk_email" class="block text-sm font-medium leading-6 text-gray-900">Alamat Email</label>
							<div class="mt-2">
								<input id="email" name="pjmk_email" type="pjmk_email" autocomplete="email"
									class="block w-full rounded-md border-0 pl-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-1 focus:ring-inset focus:ring-cyan-600 sm:text-sm sm:leading-6">
							</div>
						</div>

						<div class="row-span-1 order-5">
							<label for="pjmk_prodi" class="block text-sm font-medium leading-6 text-gray-900">Program Studi</label>
							<div class="mt-2">
								<select id="prodi" name="pjmk_prodi" autocomplete="prodi"
									class="block w-full rounded-md border-0 pl-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-1 focus:ring-inset focus:ring-cyan-600 sm:max-w-xs sm:text-sm sm:leading-6">
									<option selected default>Pilih Program Studi...</option>
									<option>TRPL - Teknologi Rekayasa Perangkat Lunak</option>
									<option>TRK - Teknologi Rekayasa Komputer</option>
									<option>BD - Bisnis Digital</option>
								</select>
							</div>
						</div>

						<div class="col-span-2 order-last place-self-end flex gap-x-4">
							<button type="reset" class="text-sm font-semibold leading-6 text-gray-500">Kosongkan Formulir</button>
							<button type="button"
								class="rounded-md bg-cyan-600 px-5 py-2 text-sm font-semibold text-white shadow-sm hover:bg-cyan-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-cyan-600"
								id="next-btn">Selanjutnya</button>
						</div>
					</div>
				</div>

				<div class="hidden" id="account-form">
					<h2 class="mt-10 text-2xl font-bold leading-9 tracking-tight text-gray-900">Account Info</h2>
					<p class="text-base text-center leading-9 tracking-tight text-gray-400">
						Buat Username dan Password untuk <span class="font-semibold text-cyan-600">Akun PJMK</span>
					</p>
					<div class="w-full mt-5 mx-auto grid grid-cols-1 gap-y-5">
						<div class="row-span-1 order-6">
							<label for="pjmk_username" class="block text-sm font-medium leading-6 text-gray-900">Username</label>
							<div class="mt-2">
								<input id="pjmk_username" name="pjmk_username" type="username" autocomplete="username"
									class="block w-full rounded-md border-0 pl-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-1 focus:ring-inset focus:ring-cyan-600 sm:text-sm sm:leading-6">
							</div>
						</div>
						<div class="row-span-1 order-6">
							<label for="pjmk_password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
							<div class="mt-2">
								<input id="pjmk_password" name="pjmk_password" type="password" autocomplete="password"
									class="block w-full rounded-md border-0 pl-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-1 focus:ring-inset focus:ring-cyan-600 sm:text-sm sm:leading-6">
							</div>
						</div>
						<div class="row-span-1 order-6">
							<label for="password" class="block text-sm font-medium leading-6 text-gray-900">Konfirmasi
								Password</label>
							<div class="mt-2">
								<input id="password" name="password" type="password" autocomplete="password"
									class="block w-full rounded-md border-0 pl-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-1 focus:ring-inset focus:ring-cyan-600 sm:text-sm sm:leading-6">
							</div>
						</div>
						<div class="col-span-1 order-last flex justify-between">
							<button type="button" class="text-sm font-semibold leading-6 text-gray-400" id="prev-btn">
								<< Kembali</button>
									<button type="submit"
										class="rounded-md bg-cyan-600 px-5 py-2 text-sm font-semibold text-white shadow-sm hover:bg-cyan-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-cyan-600">Submit</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>

	<script>
		const nextButton = document.getElementById('next-btn');
		const prevButton = document.getElementById('prev-btn');
		const personalForm = document.getElementById('personal-form');
		const accountForm = document.getElementById('account-form');

		const navActive = document.querySelectorAll('#navbar li');

		nextButton.addEventListener('click', () => {
			personalForm.classList.add('hidden');
			navActive[1].classList.add('active');
			accountForm.classList.remove('hidden');
		});

		prevButton.addEventListener('click', () => {
			accountForm.classList.add('hidden');
			navActive[1].classList.remove('active');
			personalForm.classList.remove('hidden');
		});

	</script>
</body>

</html>