<!-- component -->
<!DOCTYPE html>
<html>

<head>
  @yield('head-optional')
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
  <title>Admin - @yield('title')</title>
</head>

<body class="bg-white">
  <div class="relative h-screen w-full overflow-hidden">
    @include('component.nav', ['title' => $page])
    <div class="relative px-6 flex flex-wrap h-[100vh] my-5 overflow-auto">
      <div class="ml-[300px] w-full max-w-full">
        @yield('main-content')
      </div>
    </div>
  </div>
  <!-- 
  <script>
    const filterButton = document.querySelector('#filterButton');
    const closeBtn = document.querySelector('#close-btn');
    const bgEffect = document.querySelector('#bg-effect');
    const panelSection = document.querySelector('#panel-section');
    const panelBtn = document.querySelector('#panel-button');
    const panelParent = document.querySelector('#panel-parent');

    filterButton.addEventListener('click', () => {
      bgEffect.classList.toggle('hidden')
      panelParent.classList.toggle('hidden')
      panelBtn.classList.remove('opacity-0')
      bgEffect.classList.remove('opacity-0')
      setTimeout(() => {
        panelSection.classList.add('translate-x-0')
        panelBtn.classList.add('opacity-1')
        bgEffect.classList.add('opacity-1')
      }, 100);
    })

    closeBtn.addEventListener('click', () => {
      panelSection.classList.remove('translate-x-0')
      panelSection.classList.add('translate-x-full')
      panelBtn.classList.remove('opacity-1')
      panelBtn.classList.add('opacity-0')
      bgEffect.classList.remove('opacity-1')
      bgEffect.classList.add('opacity-0')
      setTimeout(() => {
        bgEffect.classList.toggle('hidden')
        panelParent.classList.toggle('hidden')
      }, 1000);
    })
  </script> -->
</body>
<html>