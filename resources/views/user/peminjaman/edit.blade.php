<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Peminjaman</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/tw-elements.min.css" />
</head>

<body class="bg-gray-100">
  <div class="container max-w-full min-h-full">
    @include('partials.nav-pjmk', ['title' => 'Peminjaman'])

    <div class="p-8 w-full">
      <header class="flex gap-x-20 align-center">
        <div>
          <h2 class="text-2xl font-bold">Ajukan Peminjaman</h2>
          <p class="text-base text-gray-600">Buat pengajuan peminjaman ruang kelas</p>
        </div>
      </header>
      <main class="mt-5">
        <form action="" method="get">
          <div class="w-full mt-5 grid grid-cols-2 gap-2">
            <div class="row-span-1 order-first">
              <label for="prodi" class="block text-sm font-medium leading-6 text-gray-900">Pilih Ruangan</label>
              <div class="mt-2">
                <select id="prodi" name="prodi" autocomplete="prodi"
                  class="block w-2/3 rounded-md border-0 px-3 py-1.5 text-gray-500 text-sm shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-1 focus:ring-inset focus:ring-cyan-600">
                  <option selected default>Pilih Ruang Kelas...</option>
                  <option>C2.11</option>
                  <option>C2.11</option>
                  <option>C2.11</option>
                </select>
              </div>
            </div>

            <div class="row-span-1 order-3">
              <label for="nama" class="block text-sm font-medium leading-6 text-gray-900">Tanggal Peminjaman</label>
              <div class="mt-2">
                <input type="date" name="nama" id="nama" autocomplete="given-name"
                  class="block w-2/3 rounded-md border-0 px-3 py-1.5 text-gray-500 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-1 focus:ring-inset focus:ring-cyan-600 sm:text-sm sm:leading-6">
              </div>
            </div>

            <div class="row-span-1 order-5">
              <label for="peminjaman_timestart" class="block text-sm font-medium leading-6 text-gray-900">Waktu
                Peminjaman</label>
              <div class="flex gap-x-4">
                <div class="relative mt-2" id="timepicker-first" data-te-input-wrapper-init>
                  <input type="text" name="peminjaman_timestart" id="peminjaman_timestart" autocomplete="given-name"
                    placeholder="Mulai"
                    class="block w-full rounded-md border-0 pl-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-1 focus:ring-inset focus:ring-cyan-600 sm:text-sm sm:leading-6">
                </div>

                <div class="relative mt-2" id="timepicker-last" data-te-input-wrapper-init>
                  <input type="text" name="peminjaman_timefinish" id="peminjaman_timefinish" autocomplete="given-name"
                    placeholder="Selesai"
                    class="block w-full rounded-md border-0 pl-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-1 focus:ring-inset focus:ring-cyan-600 sm:text-sm sm:leading-6">
                </div>
              </div>
            </div>

            <div class="row-span-1 order-4">
              <label class="block text-sm font-medium leading-6 text-gray-900">Fasilitas</label>
              <div class="mt-2 h-max flex gap-x-8">
                <div class="w-max h-max flex gap-x-1">
                  <input type="checkbox" name="kunci" id="fasilitas_kunci" class="rounden-md">
                  <label for="fasilitas_kunci" class="text-sm  cursor-pointer">Kunci ruangan</label>
                </div>
                <div class="w-max h-max flex gap-x-1">
                  <input type="checkbox" name="kunci" id="fasilitas_proyektor" class="rounded-md">
                  <label for="fasilitas_proyektor" class="text-sm  cursor-pointer">Proyektor</label>
                </div>
                <div class="w-max h-max flex gap-x-1 cursor-pointer">
                  <input type="checkbox" name="kunci" id="fasilitas_stopkontak" class="rounded-md">
                  <label for="fasilitas_stopkontak" class="text-sm  cursor-pointer">Stopkontak</label>
                </div>
              </div>
            </div>

            <div class="row-span-1 order-2">
              <label for="nama" class="block text-sm font-medium leading-6 text-gray-900">Tujuan Peminjaman</label>
              <div class="mt-2">
                <input type="textarea" name="nama" id="nama" autocomplete="given-name"
                  class="block w-full rounded-md border-0 pl-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-1 focus:ring-inset focus:ring-cyan-600 sm:text-sm sm:leading-6">
              </div>
            </div>

            <div class="col-span-1 order-last place-self-end flex gap-x-4">
              <button type="reset" class="text-sm font-semibold leading-6 text-gray-500">Kosongkan Formulir</button>
              <button type="submit"
                class="rounded-md bg-cyan-600 px-5 py-2 text-sm font-semibold text-white shadow-sm hover:bg-cyan-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-cyan-600"
                id="next-btn">Submit
              </button>
            </div>
          </div>
        </form>
      </main>
    </div>
  </div>
  
  <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.umd.min.js"></script>
  <script>
    const timeStart = document.querySelector("#timepicker-first");
    const timepickerStart = new te.Timepicker(timeStart, {
      increment: true,
      format24: true,
      minTime: "07:30",
      maxTime: "16:00",
    });

    const input = timeStart.querySelector('input#peminjaman_timestart');

    let getTimeStart = "";
    input.addEventListener('input', () => {
      getTimeStart = input.value.toString();
      const timeFinish = document.querySelector("#timepicker-last");
      const timepickerFinish = new te.Timepicker(timeFinish, {
        increment: true,
        format24: true,
        minTime: getTimeStart,
        maxTime: "16:00",
      });
    });

  </script>
</body>

</html>