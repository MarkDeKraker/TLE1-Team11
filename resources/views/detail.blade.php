<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">


    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @vite('resources/css/app.css')
</head>


<body>
    <section class="relative">
        <img class="h-full w-full" src="images/dummy-img.png">
        <div class="absolute top-0 left-0 w-full h-full bg-black opacity-40"></div>
        
        <div class="text-white">
            <a href="{{ url('/') }}" class="absolute top-5 left-5">
                <img src="icons/arrow_back_left_icon.png" class="w-8" alt="Back">
            </a>
            <img src="icons/share_arrow_icon.png" class="absolute top-6 right-5 w-7">
            <img src="icons/save_icon.png" class="absolute bottom-5 right-5 w-6">
        </div>
    </section>

    <section class="flex font-bold m-2">
        <h2 class="m-2">Tags:<h2>
                <h2 class="m-1 p-1 border-1 border-green-600 rounded-xl">Werk<h2>
                        <h2 class="m-1 p-1 bg-orange-500 rounded-xl text-white">14-16 jaar<h2>
    </section>

    <section class="m-3 text-xl">
        <p class="font-bold">Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis, doloremque quasi.
            Voluptas doloribus reiciendis praesentium eveniet soluta necessitatibus beatae accusantium?
        </p>
        <p class="mt-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos fugit recusandae exercitationem
            quasi fugiat, molestiae quaerat similique saepe. Aperiam, saepe, doloremque quia quidem excepturi asperiores
            officiis corporis fugiat autem repellendus, consequatur ipsa fuga eos! Ipsa at sequi, tempore exercitationem
            incidunt reiciendis sapiente dolor cupiditate officiis nihil molestiae, distinctio sunt debitis ut assumenda
            sit eos vitae expedita optio quo facere qui voluptas! Dolorem blanditiis velit alias veniam architecto ipsam
            recusandae autem vitae est soluta, ipsa quod! Ducimus ut, necessitatibus harum, asperiores repellendus
            molestias iure saepe eos amet aliquid corrupti nostrum assumenda, mollitia minima tempora. Natus consequatur
            exercitationem quisquam cum maiores iste quibusdam est, molestias quia a, accusantium cupiditate. Ipsum
            praesentium nostrum fugiat. Rem, sint aspernatur non harum et minima praesentium dignissimos id inventore
            adipisci magni autem dolores assumenda recusandae dolore consectetur, totam veniam voluptas quo repellendus
            incidunt aut corporis deserunt. Odit accusantium odio incidunt reiciendis ex, quae ullam nesciunt quia
            quibusdam!</p>
    </section>

</html>

</body>