<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
        <div class="my-4 flex space-x-14">

            <div class="flex items-center space-x-2 cursor-pointer">
                <!-- Doctor Role -->
                <div class=" mr-5">
                    <i class="fas fa-user-md text-green-500"></i>
                    <input type="radio" class="form-radio" name="role" value="doctor" onchange="toggleDoctorOptions(this.value)">
                    <label class="text-gray-700 font-medium text-sm">Doctor</label>
                </div>
                <!-- Patient Role -->
                <div>
                    <i class="fas fa-user-injured text-red-500"></i>
                    <input type="radio" class="form-radio" checked name="role" value="patient" onchange="toggleDoctorOptions(this.value)">
                    <label class="text-gray-700 font-medium text-sm">Patient</label>
                </div>
            </div>
        </div>
        <!-- Select options for doctor -->
        <div id="doctorOptions" class="mt-4" style="display: none;">
            <label for="specialty" class=" text-gray-700 font-medium text-sm">Specialty</label>
            <select id="specialty" name="specialityID" class="form-select mt-1 block w-full">
                <option selected>Choose a speciality</option>
                @foreach($specialities as $speciality)
                <option value="{{$speciality->id}}">{{$speciality->name}}</option>
                @endforeach
            </select>
        </div>
        <x-input-error :messages="$errors->get('speciality')" class="mt-2" />
        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>

    <script>
        function toggleDoctorOptions(role) {
            var doctorOptions = document.getElementById('doctorOptions');
            if (role === 'doctor') {
                doctorOptions.style.display = 'block';
            } else {
                doctorOptions.style.display = 'none';
            }
        }
    </script>
</x-guest-layout>