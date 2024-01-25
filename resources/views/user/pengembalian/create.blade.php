<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PJMK | Pengembalian</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/tw-elements.min.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>

<body class="bg-gray-100">
  <div class="container max-w-full min-h-full">
    @include('component.nav-pjmk', ['title' => 'Pengembalian', 'user' => $user])

    <div class="p-8 m-8 w-[80%] bg-white">
      <header class="flex gap-x-20 align-center">
        <div>
          <h2 class="text-2xl tracking-tight font-bold leading-8 text-black">Ajukan Pengembalian</h2>
          <p class="text-sm leading-16 text-gray-400">Buat pengajuan pengembalian ruang kelas</p>
        </div>
      </header>
      <main class="mt-5">
  
          @foreach ($peminjaman as $p)
          <li class="flex justify-between gap-x-6 p-3 group cursor-pointer border-[1.5px] border-dashed">
            <div class="flex min-w-0 gap-x-4">
              <div class="min-w-0 flex-auto">
                <p class="text-lg font-extrabold leading-8 text-cyan-600">{{ $p->peminjaman_ruangkelas }}</p>
                <div class="flex gap-x-4">
                  <p class="text-gray-500 flex items-center gap-x-2 bg-cyan-50 p-1 rounded-md">
                    <span class="text-lg material-symbols-outlined">event</span>
                    <span class="text-xs">{{ strftime('%A, %e %B %Y', strtotime($p->peminjaman_tanggal)) }}</span>
                  </p>
                  <p class="text-gray-500 flex items-center gap-x-2 bg-cyan-50 p-1 rounded-md">
                    <span class="text-lg material-symbols-outlined">schedule</span>
                    <span class="text-xs font-semibold">
                      {{ substr($p->peminjaman_waktu_mulai, 0, 5) }}
                      s/d
                      {{ substr($p->peminjaman_waktu_selesai, 0, 5) }}
                    </span>
                  </p>
                </div>
                <p class="mt-5 text-sm leading-5 text-gray-500 flex gap-x-2">
                  <span class="material-symbols-outlined">school</span>
                  {{ $p->peminjaman_matakuliah }}
                </p>
              </div>
            </div>
          </li>
          @endforeach

        <form action="{{ route('pjmk.kembali.store') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="w-full mt-5 grid grid-cols-1 gap-4">

            <div class="col-span-full">
              <label for="cover-photo" class="block text-lg font-medium leading-6 text-gray-900">Foto Sebelum</label>
                <div class="w-full mx-auto bg-white rounded-lg shadow-md overflow-hidden items-center">
                  <div class="px-4 py-6">
                    <div class="w-full p-6 mb-4 bg-gray-100 border-dashed border-2 border-gray-400 rounded-lg items-center mx-auto text-center cursor-pointer
                      @error('foto_sebelum') border-red-400 @enderror">
                      <input id="foto_sebelum" name="foto_sebelum" type="file" class="hidden" accept="image/*" />
                      <div id="image-preview">
                      <label for="foto_sebelum" class="cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-gray-700 mx-auto mb-4">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                        </svg>
                        <h5 class="mb-2 text-lg font-semibold tracking-tight text-gray-700">Upload picture</h5>
                        <p class="text-sm text-gray-400 md:px-6">Choose photo size should be less than <b class="text-gray-600">2mb</b></p>
                        <p class="text-sm text-gray-400 md:px-6">and should be in <b class="text-gray-600">JPG, PNG, or GIF</b> format.</p>
                        <span id="filename" class="text-gray-500 bg-gray-200 z-50"></span>
                      </label>
                      </div>
                    </div>
                    @error('foto_sebelum')
                      <p class="text-sm text-rose-500">{{ $message }}</p>
                    @enderror
                  </div>
                </div>
            </div>

            <div class="col-span-full">
              <label for="cover-photo" class="block text-lg font-medium leading-6 text-gray-900">Foto Sesudah</label>
                <div class="w-full mx-auto bg-white rounded-lg shadow-md overflow-hidden items-center">
                  <div class="px-4 py-6">
                    <div class="w-full p-6 mb-4 bg-gray-100 border-dashed border-2 border-gray-400 rounded-lg items-center mx-auto text-center cursor-pointer
                      @error('foto_sesudah') border-red-400 @enderror">
                      <input id="upload2" name="foto_sesudah" type="file" class="hidden" accept="image/*" />
                      <div id="image-preview2">
                        <label for="upload2" class="cursor-pointer">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-gray-700 mx-auto mb-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                          </svg>
                          <h5 class="mb-2 text-lg font-semibold tracking-tight text-gray-700">Upload picture</h5>
                          <p class="text-sm text-gray-400 md:px-6">Choose photo size should be less than <b class="text-gray-600">2mb</b></p>
                          <p class="text-sm text-gray-400 md:px-6">and should be in <b class="text-gray-600">JPG, PNG, or GIF</b> format.</p>
                          <span id="filename2" class="text-gray-500 bg-gray-200 z-50"></span>
                        </label>
                      </div>
                    </div>
                    @error('foto_sesudah')
                      <p class="text-sm text-rose-500">{{ $message }}</p>
                    @enderror
                  </div>
                </div>
            </div>

            <div class="col-span-1 order-last place-self-end flex gap-x-4">
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

  <script>
    // Upload Image sebelum
    const uploadInput = document.getElementById('foto_sebelum');
    const filenameLabel = document.getElementById('filename');
    const imagePreview = document.getElementById('image-preview');

    // Check if the event listener has been added before
    let isEventListenerAdded = false;

    uploadInput.addEventListener('change', (event) => {
      const file = event.target.files[0];

      if (file) {
        filenameLabel.textContent = file.name;

        const reader = new FileReader();
        reader.onload = (e) => {
          imagePreview.innerHTML =
            `<img src="${e.target.result}" class="max-h-48 rounded-lg mx-auto" alt="Image preview" />`;
          imagePreview.classList.remove('border-dashed', 'border-2', 'border-gray-400');

          // Add event listener for image preview only once
          if (!isEventListenerAdded) {
            imagePreview.addEventListener('click', () => {
              uploadInput.click();
            });

            isEventListenerAdded = true;
          }
        };
        reader.readAsDataURL(file);
      } else {
        filenameLabel.textContent = '';
        imagePreview.innerHTML =
          `<div class="bg-gray-200 h-48 rounded-lg flex items-center justify-center text-gray-500">No image preview</div>`;
        imagePreview.classList.add('border-dashed', 'border-2', 'border-gray-400');

        // Remove the event listener when there's no image
        imagePreview.removeEventListener('click', () => {
          uploadInput.click();
        });

        isEventListenerAdded = false;
      }
    });

    uploadInput.addEventListener('click', (event) => {
      event.stopPropagation();
    });


    // Upload Image Sesudah
    const uploadInput2 = document.getElementById('upload2');
    const filenameLabel2 = document.getElementById('filename2');
    const imagePreview2 = document.getElementById('image-preview2');

    // Check if the event listener has been added before
    let isEventListenerAdded2 = false;

    uploadInput2.addEventListener('change', (event) => {
      const file = event.target.files[0];

      if (file) {
        filenameLabel2.textContent = file.name;

        const reader = new FileReader();
        reader.onload = (e) => {
          imagePreview2.innerHTML =
            `<img src="${e.target.result}" class="max-h-48 rounded-lg mx-auto" alt="Image preview" />`;
          imagePreview2.classList.remove('border-dashed', 'border-2', 'border-gray-400');

          // Add event listener for image preview only once
          if (!isEventListenerAdded) {
            imagePreview2.addEventListener('click', () => {
              uploadInput2.click();
            });

            isEventListenerAdded2 = true;
          }
        };
        reader.readAsDataURL(file);
      } else {
        filenameLabel2.textContent = '';
        imagePreview2.innerHTML =
          `<div class="bg-gray-200 h-48 rounded-lg flex items-center justify-center text-gray-500">No image preview</div>`;
        imagePreview2.classList.add('border-dashed', 'border-2', 'border-gray-400');

        // Remove the event listener when there's no image
        imagePreview2.removeEventListener('click', () => {
          uploadInput2.click();
        });

        isEventListenerAdded2 = false;
      }
    });

    uploadInput2.addEventListener('click', (event) => {
      event.stopPropagation();
    });
  </script>
</body>

</html>