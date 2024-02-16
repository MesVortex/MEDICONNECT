<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mediconnect</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/Loopple/loopple-public-assets@main/motion-tailwind/motion-tailwind.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />

</head>

<body class="bg-white">
  <div class="container flex flex-col mx-auto bg-white">
    <div class="relative flex flex-wrap items-center justify-between w-full bg-white group py-7 shrink-0">
      <div class=" flex">
        <img class="h-8" src="{{asset('img/logologo-removebg-preview.png')}}">
        <img class="h-8" src="{{asset('img/WebSiteName-removebg-preview.png')}}">
      </div>
      <div class="hidden sm:flex sm:items-center sm:ms-6">
        <x-dropdown align="right" width="48">
          <x-slot name="trigger">
            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
              <div>{{ Auth::user()->name }}</div>

              <div class="ms-1">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
              </div>
            </button>
          </x-slot>

          <x-slot name="content">
            <x-dropdown-link :href="route('profile.edit')">
              {{ __('Profile') }}
            </x-dropdown-link>

            <!-- Authentication -->
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                {{ __('Log Out') }}
              </x-dropdown-link>
            </form>
          </x-slot>
        </x-dropdown>
      </div>
      <button onclick="(() => { this.closest('.group').classList.toggle('open')})()" class="flex md:hidden">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
          <path d="M3 8H21C21.2652 8 21.5196 7.89464 21.7071 7.70711C21.8946 7.51957 22 7.26522 22 7C22 6.73478 21.8946 6.48043 21.7071 6.29289C21.5196 6.10536 21.2652 6 21 6H3C2.73478 6 2.48043 6.10536 2.29289 6.29289C2.10536 6.48043 2 6.73478 2 7C2 7.26522 2.10536 7.51957 2.29289 7.70711C2.48043 7.89464 2.73478 8 3 8ZM21 16H3C2.73478 16 2.48043 16.1054 2.29289 16.2929C2.10536 16.4804 2 16.7348 2 17C2 17.2652 2.10536 17.5196 2.29289 17.7071C2.48043 17.8946 2.73478 18 3 18H21C21.2652 18 21.5196 17.8946 21.7071 17.7071C21.8946 17.5196 22 17.2652 22 17C22 16.7348 21.8946 16.4804 21.7071 16.2929C21.5196 16.1054 21.2652 16 21 16ZM21 11H3C2.73478 11 2.48043 11.1054 2.29289 11.2929C2.10536 11.4804 2 11.7348 2 12C2 12.2652 2.10536 12.5196 2.29289 12.7071C2.48043 12.8946 2.73478 13 3 13H21C21.2652 13 21.5196 12.8946 21.7071 12.7071C21.8946 12.5196 22 12.2652 22 12C22 11.7348 21.8946 11.4804 21.7071 11.2929C21.5196 11.1054 21.2652 11 21 11Z" fill="black"></path>
        </svg>
      </button>
      <div class="absolute flex md:hidden transition-all duration-300 ease-in-out flex-col items-start shadow-main justify-center w-full gap-3 overflow-hidden bg-white max-h-0 group-[.open]:py-4 px-4 rounded-2xl group-[.open]:max-h-64 top-full">
        @if (Route::has('login'))
        @auth
        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
        @else
        <a href="{{ route('login') }}" class="flex items-center font-semibold text-sm text-gray-800 hover:text-gray-900 transition duration-300">Log in</a>
        @if (Route::has('register'))
        <a href="{{ route('register') }}" class="flex items-center px-4 py-2 text-sm font-bold rounded-xl bg-red-100 text-red-600 hover:bg-green-600 hover:text-white transition duration-300">Sign Up</a>
        @endif
        @endauth
        @endif
      </div>
    </div>

    <section>
      <a href="{{ route('patient.emergency') }}" class="flex select-none items-center gap-3 rounded-lg bg-red-600 py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-pink-500/20 transition-all hover:shadow-lg hover:shadow-pink-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="button" data-ripple-light="true">
        <i class="fa-regular fa-hospital fa-xl"></i>
        Emergency Appointment
      </a>
    </section>

    <section class=" bg-blue-500ray-50">
      <div class="py-10  sm:py-16 block lg:py-24 relative bg-opacity-50  z-40">
        <div class="mx-auto h-full px-4 pb-20   md:pb-10 sm:max-w-xl md:max-w-full md:px-24 lg:max-w-screen-xl lg:px-8">
          <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8 relative">
            <div class="max-w-xl mx-auto text-center">
              <div class="inline-flex px-4 py-1.5 mx-auto rounded-full  ">
                <p class="text-4xl font-semibold tracking-widest text-g uppercase">Specialities:</p>
              </div>
              <p class="mt-4 text-base leading-relaxed text-gray-600 group-hover:text-white">Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit..</p>
            </div>
            <div class="grid grid-cols-1 gap-2 mt-12 sm:grid-cols-3 lg:mt-20   ">
              @foreach($specialities as $speciality)
              <a href="{{route('patient.explore', ['speciality' => $speciality])}}" class="transition-all rounded-xl border-2 border-green-600 bg-red-600 hover:bg-green-600 hover:border-red-600  hover:shadow-xl m-2 p-4 relative z-40 group  ">
                <div class="py-2 px-9 relative flex justify-center items-center">
                  <i class=" me-5 fa-solid fa-kit-medical fa-2xl group-hover:text-white"></i>
                  <h3 class="text-lg font-bold text-black group-hover:text-white">{{$speciality->name}}</h3>
                </div>
              </a>
              @endforeach
            </div>
          </div>
        </div>
    </section>
  </div>
</body>
<html>