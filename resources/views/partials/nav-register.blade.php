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
				<li class="group mb-10 ms-6 {{ $page == 'register-personal' ? 'active' : '' }}">
					<span
						class="absolute flex items-center justify-center w-8 h-8 bg-gray-100 group-[.active]:bg-cyan-200 rounded-full -start-4 ring-4 ring-white dark:ring-gray-900 dark:bg-green-900">
							<span class="absolute material-symbols-outlined items-center text-gray-500 group-[.active]:text-cyan-500">
								account_circle
							</span>
					</span>
					<h3 class="font-semibold leading-tight group-[.active]:text-cyan-600">Personal Info</h3>
					<p class="text-sm">Step details here</p>
				</li>
				<li class="group mb-10 ms-6 {{ $page == 'register-account' ? 'active' : '' }}">
					<span
						class="absolute flex items-center justify-center w-8 h-8 bg-gray-100 group-[.active]:bg-cyan-200 rounded-full -start-4 ring-4 ring-white dark:ring-gray-900 dark:bg-green-900">
						<span class="absolute material-symbols-outlined items-center text-gray-500 group-[.active]:text-cyan-500">
							assignment_ind
						</span>
					</span>
					<h3 class="font-semibold leading-tight group-[.active]:text-cyan-600">Account Info</h3>
					<p class="text-sm">Step details here</p>
				</li>
				<li class="group ms-6 {{ $page == 'register-confirm' ? 'active' : '' }}">
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