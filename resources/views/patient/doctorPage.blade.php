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
  <style>
    .visually-hidden {
      position: absolute;
      width: 1px;
      height: 1px;
      margin: -1px;
      padding: 0;
      overflow: hidden;
      clip: rect(0, 0, 0, 0);
      border: 0;

      .star {
        fill: none;
        /* Empty star */
      }

      .star.checked {
        fill: gold;
        /* Filled star */
      }
    }
  </style>
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
    <div class="h-full flex flex-col bg-gray-100 dark:bg-gray-700 shadow-xl">
      <div class="bg-green-300 shadow-lg pb-3 rounded-b-3xl">
        <div class="flex  rounded-b-3xl bg-gray-100 dark:bg-gray-700 space-y-5 flex-col items-center py-7">
          <img class="h-28 w-28 rounded-full" src="https://api.lorem.space/image/face?w=120&h=120&hash=bart89fe" alt="User">
          <a href="#"> <span class="text-h1">Michele</span></a>
        </div>
        <div class="grid px-7 py-2  items-center justify-around grid-cols-3 gap-4 divide-x divide-solid ">
          <div class="col-span-1 flex flex-col items-center ">
            <span class="text-2xl font-bold dark:text-gray-500">4</span>
            <span class="text-lg font-medium 0">Ranking</span>
          </div>
          <div class="col-span-1 px-3 flex flex-col items-center ">
            <span class="text-2xl font-bold dark:text-gray-500">
              Doctor Rating
            </span>
            @if($averageReviewCount == null)
            <div class="text-lg font-medium flex justify-center items-center">
              <p class=" font-bold">0</p>
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 ms-3 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
              </svg>
            </div>
            @else
            <div class="text-lg font-medium flex justify-center items-center">
              <p class=" font-bold">{{ number_format($averageReviewCount,1) }}</p>
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 ms-3 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
              </svg>
            </div>
            @endif
          </div>
          @if(Auth::check() && Auth::user()->patient)
                @php
                    $isFavori = $doctor->isFavori(Auth::user()->patient->id);
                @endphp
                @if ($isFavori)
                <form action="{{ route('favorites.remove', $doctor->id) }}" method="post">
                    @csrf
                    @method('DELETE')     
                    <input type="hidden" value="{{ $doctor->id }}" name="doctorID">
        
                    <button type="submit"> <i class="fas fa-heart text-red-600 text-2xl"></i></button>
                </form>
                    @else               
                        <form action="{{ route('favorites.add', $doctor->id)}}" method="post">
                        @csrf
                        @method('POST')
                      
                        <input type="hidden" value="{{ $doctor->id }}" name="doctorID">

                         <button type="submit"><i class="far fa-heart text-2xl"></i></button>
                        </form>
                        @endif
                        @endif
        </div>
      </div>

      <div class="flex mx-auto mt-6 w-100 ">
        <a href="{{ route('doctor.showAppointements', ['doctor'=>$doctor]) }}" class="p-2 mb-6 shadow-lg rounded-2xl tr-300 w-100 font-medium  bg-green-500 hover:bg-green-600 text-gray-50">
          Book An Appointement
        </a>
      </div>
    </div>

    <div class="flex-1 bg-white rounded-lg shadow-xl mt-4 p-8 mb-10">
      <div class="">
        <div class="bg-white w-full rounded-2xl px-10 py-8 shadow-lg hover:shadow-2xl transition duration-500">
          <div class=" flex justify-between items-center">
            <div class="w-14 h-14 bg-yellow-500 rounded-full flex items-center justify-center font-bold text-white"><i class="fa-regular fa-comments"></i></div>
            <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" class="w-14 h-14 bg-yellow-500 rounded-full flex items-center justify-center font-bold text-white"><i class="fa-solid fa-plus"></i></button>
            <!-- Main modal -->
            <div id="authentication-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
              <div class="relative p-4 w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                  <!-- Modal header -->
                  <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                      Sign in to our platform
                    </h3>
                    <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="authentication-modal">
                      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                      </svg>
                      <span class="sr-only">Close modal</span>
                    </button>
                  </div>
                  <!-- Modal body -->
                  <div class="p-4 md:p-5">
                    <form class="space-y-4" action="{{ route('review.store') }}" method="post">
                      @csrf
                      @method('post')
                      <div>
                        <label for="comment" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">What's your thought?</label>
                        <textarea type="text" name="comment" id="comment" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" rows="4" required>Write your review here</textarea>
                      </div>
                      <input type="hidden" name="doctorID" value="{{ $doctor->id }}">
                      <input type="hidden" name="patientID" value="{{ Auth::user()->id }}">
                      <div>
                        <select id="review" name="starCount">
                          <option value="5">5 Stars - Excellent</option>
                          <option value="4">4 Stars - Very Good</option>
                          <option value="3">3 Stars - Good</option>
                          <option value="2">2 Stars - Fair</option>
                          <option value="1">1 Star - Poor</option>
                        </select>
                      </div>
                      <div class="flex items-center">
                        <input type="checkbox" id="star5" class="star-checkbox visually-hidden" value="5" />
                        <label for="star5">
                          <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                            <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                          </svg>
                        </label>
                        <input type="checkbox" id="star4" class="star-checkbox visually-hidden" value="4" />
                        <label for="star4">
                          <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                            <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                          </svg>
                        </label>
                        <input type="checkbox" id="star3" class="star-checkbox visually-hidden" value="3" />
                        <label for="star3">
                          <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                            <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                          </svg>
                        </label>
                        <input type="checkbox" id="star2" class="star-checkbox visually-hidden" value="2" />
                        <label for="star2">
                          <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                            <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                          </svg>
                        </label>
                        <input type="checkbox" id="star1" class="star-checkbox visually-hidden" value="1" />
                        <label for="star1">
                          <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                            <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                          </svg>
                        </label>
                      </div>
                      <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login to your account</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="mt-4">
            <h1 class="text-lg text-gray-700 font-semibold">Doctor Reviews</h1>
            @foreach($reviews as $review)
            <hr class=" mt-4">
            </hr>
            <div class="flex justify-between items-center">
              <div class=" flex items-center space-x-4 py-6">
                <div class="">
                  <img class="w-12 h-12 rounded-full" src="https://images.unsplash.com/photo-1593104547489-5cfb3839a3b5?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1036&q=80" alt="" />
                </div>
                <div class="text-sm font-semibold">{{ $review->patient->user->name }}
                  <div class="flex mt-2">
                    @for($i = 1; $i < $review->starCount ; $i++)
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                      </svg>
                      @endfor
                  </div>
                </div>
              </div>
            </div>
            <p class=" text-md text-gray-600">{{ $review->comment }}</p>
            @endforeach
          </div>
        </div>
      </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script>
      // Get all star checkboxes
      const starCheckboxes = document.querySelectorAll('.star-checkbox');

      // Add event listener to each checkbox
      starCheckboxes.forEach(function(starCheckbox) {
        starCheckbox.addEventListener('change', function() {
          const checkedValue = parseInt(starCheckbox.value);

          // Update the style of each star based on the selection
          starCheckboxes.forEach(function(checkbox, index) {
            const star = checkbox.nextElementSibling.querySelector('.star');
            if (index < checkedValue) {
              star.classList.add('checked'); // Fill the star
            } else {
              star.classList.remove('checked'); // Empty the star
            }
          });
        });
      });
    </script>

</body>
<html>