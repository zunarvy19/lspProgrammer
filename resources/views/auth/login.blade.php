<!doctype html>
<html>
<head>
<title> Login </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css', 'resources/js/app.js')
  
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">

  <!-- Bootstrap Icon -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
  <body class="max-h-screen">
    <section class="border-red-500 bg-gray-200 min-h-screen flex items-center justify-center">
      <div class="bg-gray-100 p-5 flex rounded-2xl shadow-lg max-w-3xl">
        <div class="md:w-1/2 px-5">
          <h2 class="text-2xl font-bold tracking- text-[#002D74] text-center  ">Login</h2>

          <form class="mt-6" action="#" method="POST"  action="{{ route('login') }}">
            @csrf
            <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
  
            <div class="mt-4">
              <x-input-label for="password" :value="__('Password')" />
  
              <x-text-input id="password" class="block mt-1 w-full"
                              type="password"
                              name="password"
                              required autocomplete="current-password" />
  
              <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
  
            <div class="text-right mt-2 flex justify-between">
              <div class="">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>
            </div>
  
            <x-primary-button class=" w-full flex items-center justify-center my-5">
                {{ __('Log In') }}
            </x-primary-button>
          </form>

          <div class="grid grid-cols-3 items-center text-gray-500">
            <hr class="border-gray-500" />
            <p class="text-center text-sm">OR</p>
            <hr class="border-gray-500" />
          </div>
  
          <div class="text-sm flex justify-between items-center mt-3">
            <p>Tidak Punya Akun? </p>
            @if (Route::has('register'))
                <x-primary-button>
                  <a href="{{ route('register') }}">Register</a>
                </x-primary-button>
            @endif
          </div>
        </div>
  
        <div class="w-1/2 md:block hidden h-max">
          <img src="image/masuk.jpg" class="rounded-2xl" alt="page img">
        </div>
  
      </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
</body>
</html>