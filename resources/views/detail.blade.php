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
    @vite('resources/css/detail.css')
</head>


<body>
    <section class="dtl-banner">
        <img class="dtl-img" src="images/dummy-img.png">
        <div class="dtl-layover "></div>
        
        <div class="dtl-icons text-white ">
            <a href="{{ url('/') }}" class="absolute top-5 left-5">
                <img src="icons/arrow_back_left_icon.png" class="icon-back" alt="Back">
            </a>
            <img src="icons/share_arrow_icon.png" class="icon-share">
            <img src="icons/save_icon.png" class="icon-save">
        </div>
    </section>

    <section class="dtl-tags">
        <h2 class="">Tags:<h2>
                <h2 class="dtl-tag-cat">Werk<h2>
                        <h2 class="dtl-tag-age">14-16 jaar<h2>
    </section>

    <section class="dtl-article">
        <p class="dtl-article-header">Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis, doloremque quasi.
            Voluptas doloribus reiciendis praesentium eveniet soluta necessitatibus beatae accusantium?
        </p>
        <p class="dtl-article-content">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos fugit recusandae exercitationem
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