<div class="relative z-10" aria-labelledby="slide-over-title" role="dialog" aria-modal="true">
  <!--
    Background backdrop, show/hide based on slide-over state.

    Entering: "ease-in-out duration-500"
      From: "opacity-0"
      To: "opacity-100"
    Leaving: "ease-in-out duration-500"
      From: "opacity-100"
      To: "opacity-0"
  -->
  <div class="fixed inset-0 bg-gray-500 bg-opacity-75 ease-in-out duration-500 delay-100 transition-opacity hidden" id="bg-effect"></div>

  <div class="fixed inset-0 overflow-hidden hidden" id="panel-parent">
    <div class="absolute inset-0 overflow-hidden">
      <div class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10">
        <!--
          Slide-over panel, show/hide based on slide-over state.

          Entering: "transform transition ease-in-out duration-500 sm:duration-700"
            From: "translate-x-full"
            To: "translate-x-0"
          Leaving: "transform transition ease-in-out duration-500 sm:duration-700"
            From: "translate-x-0"
            To: "translate-x-full"
        -->
        <div class="pointer-events-auto relative w-screen max-w-md transform transition ease-in-out duration-500 sm:duration-700 translate-x-full" id="panel-section">
          <!--
            Close button, show/hide based on slide-over state.

            Entering: "ease-in-out duration-500"
              From: "opacity-0"
              To: "opacity-100"
            Leaving: "ease-in-out duration-500"
              From: "opacity-100"
              To: "opacity-0"
          -->
          <div class="absolute left-0 top-0 -ml-8 flex pr-2 pt-4 sm:-ml-10 sm:pr-4" id="panel-button">
            <button type="button" id="close-btn"
              class="relative rounded-md text-gray-300 hover:text-white focus:outline-none focus:ring-2 focus:ring-white">
              <span class="absolute -inset-2.5"></span>
              <span class="sr-only">Close panel</span>
              <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
          </div>

          <div class="flex h-full flex-col overflow-y-scroll bg-white py-6 shadow-xl">
            <div class="px-4">
              <h2 class="text-base font-semibold leading-6 text-gray-900" id="slide-over-title">Filter</h2>
            </div>
            <div class="relative mt-6 flex-1 px-4 flex flex-col gap-y-2">
            <form action="" method="POST">
              <p class="text-sm font-medium leading-6 text-gray-400">Berdasarkan Tanggal Peminjaman</p>
              <div>
                <label for="dateStart" class="block text-sm font-medium leading-6 text-gray-900">Mulai Tanggal</label>
                <div class="mt-2">
                  <input type="date" name="dateStart" id="dateStart" autocomplete="given-name"
                    class="block w-2/3 rounded-md border-0 px-3 py-1.5 text-gray-500 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-1 focus:ring-inset focus:ring-cyan-600 sm:text-sm sm:leading-6">
                </div>
              </div>
              <div class="mt-6">
                <label for="dateEnd" class="block text-sm font-medium leading-6 text-gray-900">Sampai Tanggal</label>
                <div class="mt-2">
                  <input type="date" name="dateEnd" id="dateEnd" autocomplete="given-name"
                    class="block w-2/3 rounded-md border-0 px-3 py-1.5 text-gray-500 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-1 focus:ring-inset focus:ring-cyan-600 sm:text-sm sm:leading-6">
                </div>
              </div>

              <!-- <p class="mt-8 text-sm font-medium leading-6 text-gray-400">Berdasarkan Waktu</p> -->
              <!-- <div class="row-span-1 order-5">
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
              </div> -->
              
              <button type="submit"
                class="flex mt-10 cursor-pointer rounded-md bg-indigo-600 px-4 py-2.5 text-base font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Filter
              </button>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>