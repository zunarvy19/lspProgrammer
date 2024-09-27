<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css','resources/js/app.js'])
    </head>

    <body class="bg-[#FFF4EA]">
      <main>
        <section>
          <div class="flex justify-center items-center h-screen flex-col mx-auto">
            <div class="">
              <h1 class="text-[#78ABA8] text-8xl">Restoran </h1>
              <h1 class="text-6xl text-[#EF9C66] italic underline">Dapur Bunda Bahagia<span class="text-black">.</span></h1>
              <h1 class="mt-2"><a href="/daftar-menu" class="text-2xl font-semibold">Pesan Sekarang &rarr;</a></h1>
            </div>
          </div>
        </section>
      </main>
    </body>
</html>