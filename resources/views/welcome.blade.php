<!DOCTYPE html>
<html>

<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>Selamat Datang</title>
</head>

<body class="bg-white">
    <header class="absolute inset-x-0 top-0 z-50">
        <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
            <div class="flex lg:flex-1">
                <a href="#" class="-m-1.5 p-1.5">
                    <span class="sr-only">Your Company</span>
                    <img class="mx-auto h-10 w-auto" src="{{ asset('logo-UPK.svg') }}"
                </a>
            </div>
            <div class="flex lg:hidden">
                <button type="button"
                    class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
                    <span class="sr-only">Open main menu</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>
            </div>
            <div class="hidden lg:flex lg:gap-x-12">
                <a href="#home" class="text-sm font-semibold leading-6 text-gray-900 hover:text-cyan-500">Beranda</a>
                <a href="#panduan" class="text-sm font-semibold leading-6 text-gray-900 hover:text-cyan-500">Panduan</a>
                <a href="#tentang" class="text-sm font-semibold leading-6 text-gray-900 hover:text-cyan-500">Tentang</a>
            </div>
            <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                <a class="text-base flex align-center justify-center gap-x-2 py-2 px-3 font-semibold leading-6 text-cyan-500 rounded-md
                transition-colors duration-150
                hover:bg-gray-50 hover"
                 href="/login">
                    <span class="block leading-5">Login</span>
                    <span class="block material-symbols-rounded self-center">
                        arrow_right_alt
                    </span>
                </a>
            </div>
        </nav>
        <!-- Mobile menu, show/hide based on menu open state. -->
        <div class="lg:hidden" role="dialog" aria-modal="true">
            <!-- Background backdrop, show/hide based on slide-over state. -->
            <div class="fixed inset-0 z-50"></div>
            <div
                class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
                <div class="flex items-center justify-between">
                    <a href="#" class="-m-1.5 p-1.5">
                        <span class="sr-only">Your Company</span>
                        <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=cyan&shade=600"
                            alt="">
                    </a>
                    <button type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700">
                        <span class="sr-only">Close menu</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="mt-6 flow-root">
                    <div class="-my-6 divide-y divide-gray-500/10">
                        <div class="space-y-2 py-6">
                            <a href="#"
                                class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Product</a>
                            <a href="#"
                                class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Features</a>
                            <a href="#"
                                class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Marketplace</a>
                            <a href="#"
                                class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Company</a>
                        </div>
                        <div class="py-6">
                            <a href="#"
                                class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Log
                                in</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="relative isolate px-4 pt-6 lg:px-8" id="home">
        <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80"
            aria-hidden="true">
            <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]"
                style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
            </div>
        </div>
        <div class="mx-auto max-w-2xl py-32">
            <div class="hidden sm:mb-8 sm:flex sm:justify-center">
                <div
                    class="relative rounded-full px-3 py-1 text-sm leading-6 text-gray-600 ring-1 ring-gray-900/10 hover:ring-gray-900/20">
                    Mulai melakukan Peminjaman. <a href="/login" class="font-semibold text-cyan-600"><span
                            class="absolute inset-0" aria-hidden="true"></span>Read more <span
                            aria-hidden="true">&rarr;</span></a>
                </div>
            </div>
            <div class="text-center">
                <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">Selamat Datang</h1>
                <p class="mt-16 text-lg leading-8 text-gray-600">Selamat datang di Aplikasi Peminjaman Gedung 454! Kami dengan senang hati menyambut Anda untuk pengalaman peminjaman gedung yang mudah dan efisien.</p>
                <div class="mt-10 flex items-center justify-center gap-x-6">
                    <a href="/login"
                        class="rounded-md bg-cyan-600 px-5 py-2.5 text-sm font-semibold text-white shadow-sm  focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-cyan-600
                                shadow-lg shadow-transparent
                                transition-colors duration-150
                                hover:bg-cyan-500 hover:shadow-cyan-200">
                        Get started
                    </a>
                    <a href="#" class="flex gap-x-2 text-sm font-semibold leading-6 text-gray-900">
                        <span class="block leading-5">Learn more</span>
                        <span class="block material-symbols-rounded self-center">
                            arrow_right_alt
                        </span>
                    </a>
                </div>
            </div>
        </div>
        <div class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]"
            aria-hidden="true">
            <div class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]"
                style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
            </div>
        </div>
    </div>

    <div class="bg-white py-24 sm:py-32" id="panduan">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl lg:text-center">
            <h2 class="text-base font-semibold leading-7 text-cyan-600">Lakukan Peminjaman Dengan Lebih Efisien</h2>
            <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Peminjaman Ruang Kelas Secara Online</p>
            <p class="mt-6 text-lg leading-8 text-gray-600">Dengan menggunakan website ini, anda dapat melakukan peminjaman dan pengembalian dengan lebih cepat dan efisien</p>
            </div>
            <div class="mx-auto mt-16 max-w-2xl sm:mt-20 lg:mt-24 lg:max-w-4xl">
            <dl class="grid max-w-xl grid-cols-1 gap-x-8 gap-y-10 lg:max-w-none lg:grid-cols-2 lg:gap-y-16">
                <div class="relative pl-16">
                <dt class="text-base font-semibold leading-7 text-gray-900">
                    <div class="absolute left-0 top-0 flex h-10 w-10 items-center justify-center rounded-lg bg-cyan-600">
                    <span class="material-symbols-outlined text-white">assignment_add</span>
                    </div>
                    1. Ajukan Peminjaman Terlebih Dahulu
                </dt>
                <dd class="mt-2 text-base leading-7 text-gray-600">
                    Memilih dan melakukan pengajuan terlebih dahulu dan tunggu konfirmasi admin.
                </dd>
                </div>
                <div class="relative pl-16">
                <dt class="text-base font-semibold leading-7 text-gray-900">
                    <div class="absolute left-0 top-0 flex h-10 w-10 items-center justify-center rounded-lg bg-cyan-600">
                    <span class="material-symbols-outlined text-white">switch_access_2</span>
                    </div>
                    2. Pengambilan Kunci dan Proyektor
                </dt>
                <dd class="mt-2 text-base leading-7 text-gray-600">Ambil kunci ruang kelas dan fasilitas pendukung di ruang UPK.</dd>
                </div>
                <div class="relative pl-16">
                <dt class="text-base font-semibold leading-7 text-gray-900">
                    <div class="absolute left-0 top-0 flex h-10 w-10 items-center justify-center rounded-lg bg-cyan-600">
                    <span class="material-symbols-outlined text-white">meeting_room</span>
                    </div>
                    3. Gunakan Ruang Kelas
                </dt>
                <dd class="mt-2 text-base leading-7 text-gray-600">Masuk ke dalam ruang kelas dan gunakan ruang kelas dengan sebaik-baiknya. Jagalah Kebersihan dan Jangan Lupa untuk melakukan foto terlebih dahulu sebelum menggunakan ruang kelas</dd>
                </div>
                <div class="relative pl-16">
                <dt class="text-base font-semibold leading-7 text-gray-900">
                    <div class="absolute left-0 top-0 flex h-10 w-10 items-center justify-center rounded-lg bg-cyan-600">
                    <span class="material-symbols-outlined text-white">outbox</span>
                    </div>
                    4. Pengembalian Ruangan
                </dt>
                <dd class="mt-2 text-base leading-7 text-gray-600">
                    Lakukan upload gambar sebelum dan sesudah menggunakan ruangan, selanjutnya kembalikan kunci ruangan dan fasilitas pendukung yang lain.
                </dd>
                </div>
            </dl>
            </div>
        </div>
    </div>

    <div class="relative isolate overflow-hidden bg-gray-900 py-24 sm:py-32" id="tentang">
    <img src="{{ asset('img_gedung_454.jpg') }}" alt="" class="absolute inset-0 -z-10 h-full w-full object-cover object-right md:object-center backdrop-grayscale">
    <div class="hidden sm:absolute sm:-top-10 sm:right-1/2 sm:-z-10 sm:mr-10 sm:block sm:transform-gpu sm:blur-3xl" aria-hidden="true">
        <div class="aspect-[1097/845] w-[68.5625rem] bg-gradient-to-tr from-[#ff4694] to-[#776fff] opacity-20" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
    </div>
    <div class="absolute -top-52 left-1/2 -z-10 -translate-x-1/2 transform-gpu blur-3xl sm:top-[-28rem] sm:ml-16 sm:translate-x-0 sm:transform-gpu" aria-hidden="true">
        <div class="aspect-[1097/845] w-[68.5625rem] bg-gradient-to-tr from-[#ff4694] to-[#776fff] opacity-20" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
    </div>
    <div class="mx-auto max-w-7xl px-24">
        <div class="mx-auto max-w-2xl lg:mx-0">
        <h2 class="text-2xl font-bold tracking-tight text-white sm:text-6xl">Gedung 454</h2>
        <p class="mt-6 text-base leading-6 text-gray-300 text-justify">Politeknik Negeri Banyuwangi atau Poliwangi adalah salah satu Perguruan Tinggi Vokasi yang berada di ujung provinsi Jawa Timur. Gedung 454 merupakan salah satu Gedung yang ada di poliwangi, gedung ini biasanya digunakan untuk menyelenggarakan berbagai kegiatan, baik akademik maupun non akademik. Dalam hal ini, Unit Pelayanan Kelas atau yang biasa disebut dengan UPK bertugas untuk mengelola administrasi mengenai peminjaman ruangan pada Gedung 454. Maka dari itu, UPK bertanggungjawab atas pengelolaan ruang kelas, mengelola peminjaman ruangan, memastikan fasilitas yang diperlukan tersedia, dan mengelola pengembalian ruangan.</p>
        </div>
    </div>
    </div>

<footer class="bg-gray-100">
  <div class="relative mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8 lg:pt-24">
    <div class="absolute end-4 top-4 sm:end-6 sm:top-6 lg:end-8 lg:top-8">
      <a
        class="inline-block rounded-full bg-cyan-600 p-2 text-white shadow transition hover:bg-cyan-500 sm:p-3 lg:p-4"
        href="#home"
      >
        <span class="sr-only">Back to top</span>

        <svg
          xmlns="http://www.w3.org/2000/svg"
          class="h-5 w-5"
          viewBox="0 0 20 20"
          fill="currentColor"
        >
          <path
            fill-rule="evenodd"
            d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
            clip-rule="evenodd"
          />
        </svg>
      </a>
    </div>
    <p class="mt-12 text-center text-sm text-gray-500 lg:text-right">
      Copyright &copy; 2024. All rights reserved.
    </p>
    <p class="text-center text-sm text-gray-500 lg:text-right">
      Politeknik Negeri Banyuwangi.
    </p>
  </div>
</footer>


</body>