<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Articles</title>
    @vite('resources/css/ckeditor-tailwind-reset.css')
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="/fontawesome/css/all.css">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/min/tiny-slider.js"
        integrity="sha512-j+F4W//4Pu39at5I8HC8q2l1BNz4OF3ju39HyWeqKQagW6ww3ZF9gFcu8rzUbyTDY7gEo/vqqzGte0UPpo65QQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/tiny-slider.css"
        integrity="sha512-eMxdaSf5XW3ZW1wZCrWItO2jZ7A9FhuZfjVdztr7ZsKNOmt6TUMTQgfpNoVRyfPE5S9BC0A4suXzsGSrAOWcoQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const slider = tns({
                container: '.tiny-slider',
                controlsContainer: ".tiny-slider-control",
                navContainer: ".tiny-slider-nav",
                items: 1,
                slideBy: 'page',
                autoplay: true,
                autoplayButtonOutput: false,
                autoplayHoverPause: true,
            });
        });
    </script>
</head>

<body>
    @include('inc.header')
    <div class="max-w-6xl mt-10 mx-auto">
        <div class="relative bg-gradient-to-l from-[rgba(0,0,0,.4)] via-transparent to-[rgba(0,0,0,.4)]">
            <div class="tiny-slider">
                <div class="relative">
                    <img class="absolute inset-0 w-full h-full object-cover"
                        src="https://images.unsplash.com/photo-1493193218435-eb21654c7df6?q=80&w=1740&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                        alt="">
                    <a href="#"
                        class="block relative py-32 hover:pt-28 hover:pb-36 transition-all duration-500 bg-gradient-to-t from-[rgba(0,0,0,.7)] to-[rgba(0,0,0,.3)]">
                        <h3 class="text-3xl py-2 text-center text-white">The Best Way to Open an English Muffin Will
                            Blow Your Mind</h3>
                        <p class="text-center py-2 text-neutral-300 font-light">Published on October 11, 2023
                            &nbsp;&bull;&nbsp;
                            Updated on October 22, 2023</p>
                    </a>
                </div>
                <div class="relative">
                    <img class="absolute inset-0 w-full h-full object-cover"
                        src="https://images.unsplash.com/photo-1493193218435-eb21654c7df6?q=80&w=1740&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                        alt="">
                    <a href="#"
                        class="block relative py-32 hover:pt-28 hover:pb-36 transition-all duration-500 bg-gradient-to-t from-[rgba(0,0,0,.7)] to-[rgba(0,0,0,.3)]">
                        <h3 class="text-3xl py-2 text-center text-white">The Best Way to Open an English Muffin Will
                            Blow Your Mind</h3>
                        <p class="text-center py-2 text-neutral-300 font-light">Published on October 11, 2023
                            &nbsp;&bull;&nbsp;
                            Updated on October 22, 2023</p>
                    </a>
                </div>
                <div class="relative">
                    <img class="absolute inset-0 w-full h-full object-cover"
                        src="https://images.unsplash.com/photo-1493193218435-eb21654c7df6?q=80&w=1740&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                        alt="">
                    <a href="#"
                        class="block relative py-32 hover:pt-28 hover:pb-36 transition-all duration-500 bg-gradient-to-t from-[rgba(0,0,0,.7)] to-[rgba(0,0,0,.3)]">
                        <h3 class="text-3xl py-2 text-center text-white">The Best Way to Open an English Muffin Will
                            Blow Your Mind</h3>
                        <p class="text-center py-2 text-neutral-300 font-light">Published on October 11, 2023
                            &nbsp;&bull;&nbsp;
                            Updated on October 22, 2023</p>
                    </a>
                </div>
            </div>
            <div class="tiny-slider-nav absolute bottom-0 left-0 right-0 mx-auto w-fit text-center py-1">
                <button class="group mx-1">
                    <span class="block w-3 h-3 rounded-full bg-neutral-400 group-[.tns-nav-active]:bg-white"></span>
                </button>
                <button class="group mx-1">
                    <span class="block w-3 h-3 rounded-full bg-neutral-400 group-[.tns-nav-active]:bg-white"></span>
                </button>
                <button class="group mx-1">
                    <span class="block w-3 h-3 rounded-full bg-neutral-400 group-[.tns-nav-active]:bg-white"></span>
                </button>
            </div>
            <div class="tiny-slider-control">
                <button class="absolute top-1/2 -translate-y-1/2  left-0 text-neutral-400 hover:text-white"><i
                        class="fa-light fa-angle-left  text-7xl"></i></button>
                <button class="absolute top-1/2 -translate-y-1/2 right-0 text-neutral-400 hover:text-white"><i
                        class="fa-light fa-angle-right text-7xl"></i></button>
            </div>
        </div>
    </div>
    <div class="max-w-6xl mt-10 mx-auto flex flex-wrap">
        <div class="w-2/3 pr-5">
            <main class="bg-white pb-10">
                <article>
                    <div class="flex pt-4 pb-8">
                        <img class="w-1/3" src="https://source.unsplash.com/collection/9978864/800x450?food"
                            alt="">
                        <div class="pl-6 pr-3 w-2/3">
                            <h3 class="pb-2 text-2xl text-amber-600 font-medium">Free things to do in there 3</h3>
                            <p class="py-2 text-sm font-medium">December 8, 2023</p>
                            <p class="text-lg font-light py-1">hello everyone this is one of the most amazing things to do in
                                life just dont over do it while you are still have the potentionl to do so...</p>
                        </div>
                    </div>
                </article>
                <article>
                    <div class="flex pt-4 pb-8">
                        <img class="w-1/3" src="https://source.unsplash.com/collection/9978864/400x450?healthy"
                            alt="">
                        <div class="pl-6 pr-3 w-2/3">
                            <h3 class="pb-2 text-2xl text-amber-600 font-medium">Free things to do in there 3</h3>
                            <p class="py-2 text-sm font-medium">December 8, 2023</p>
                            <p class="text-lg font-light py-1">hello everyone this is one of the most amazing things to do in
                                life just dont over do it while you are still have the potentionl to do so...</p>
                        </div>
                    </div>
                </article>
                <article>
                    <div class="flex pt-4 pb-8">
                        <img class="w-1/3" src="https://source.unsplash.com/collection/9978864/400x400?snack"
                            alt="">
                        <div class="pl-6 pr-3 w-2/3">
                            <h3 class="pb-2 text-2xl text-amber-600 font-medium">Free things to do in there 3</h3>
                            <p class="py-2 text-sm font-medium">December 8, 2023</p>
                            <p class="text-lg font-light py-1">hello everyone this is one of the most amazing things to do in
                                life just dont over do it while you are still have the potentionl to do so...</p>
                        </div>
                    </div>
                </article>
                <article>
                    <div class="flex pt-4 pb-8">
                        <img class="w-1/3" src="https://source.unsplash.com/collection/9978864/600x400?eat"
                            alt="">
                        <div class="pl-6 pr-3 w-2/3">
                            <h3 class="pb-2 text-2xl text-amber-600 font-medium">Free things to do in there 3</h3>
                            <p class="py-2 text-sm font-medium">December 8, 2023</p>
                            <p class="text-lg font-light py-1">hello everyone this is one of the most amazing things to do in
                                life just dont over do it while you are still have the potentionl to do so...</p>
                        </div>
                    </div>
                </article>
                <article>
                    <div class="flex pt-4 pb-8">
                        <img class="w-1/3" src="https://source.unsplash.com/collection/9978864/500x350?vegetables"
                            alt="">
                        <div class="pl-6 pr-3 w-2/3">
                            <h3 class="pb-2 text-2xl text-amber-600 font-medium">Free things to do in there 3</h3>
                            <p class="py-2 text-sm font-medium">December 8, 2023</p>
                            <p class="text-lg font-light py-1">hello everyone this is one of the most amazing things to do in
                                life just dont over do it while you are still have the potentionl to do so...</p>
                        </div>
                    </div>
                </article>
                <article>
                    <div class="flex pt-4 pb-8">
                        <img class="w-1/3" src="https://source.unsplash.com/collection/9978864/400x400?recipe"
                            alt="">
                        <div class="pl-6 pr-3 w-2/3">
                            <h3 class="pb-2 text-2xl text-amber-600 font-medium">Free things to do in there 3</h3>
                            <p class="py-2 text-sm font-medium">December 8, 2023</p>
                            <p class="text-lg font-light py-1">hello everyone this is one of the most amazing things to do in
                                life just dont over do it while you are still have the potentionl to do so...</p>
                        </div>
                    </div>
                </article>
                <article>
                    <div class="flex pt-4 pb-8">
                        <img class="w-1/3" src="https://source.unsplash.com/collection/9978864/500x300?vegetables"
                            alt="">
                        <div class="pl-6 pr-3 w-2/3">
                            <h3 class="pb-2 text-2xl text-amber-600 font-medium">Free things to do in there 3</h3>
                            <p class="py-2 text-sm font-medium">December 8, 2023</p>
                            <p class="text-lg font-light py-1">hello everyone this is one of the most amazing things to do in
                                life just dont over do it while you are still have the potentionl to do so...</p>
                        </div>
                    </div>
                </article>
                <article>
                    <div class="flex pt-4 pb-8">
                        <img class="w-1/3" src="https://source.unsplash.com/collection/9978864/500x300?strawberry"
                            alt="">
                        <div class="pl-6 pr-3 w-2/3">
                            <h3 class="pb-2 text-2xl text-amber-600 font-medium">Free things to do in there 3</h3>
                            <p class="py-2 text-sm font-medium">December 8, 2023</p>
                            <p class="text-lg font-light py-1">hello everyone this is one of the most amazing things to do in
                                life just dont over do it while you are still have the potentionl to do so...</p>
                        </div>
                    </div>
                </article>
                <article>
                    <div class="flex pt-4 pb-8">
                        <img class="w-1/3" src="https://source.unsplash.com/collection/9978864/500x300?eggs"
                            alt="">
                        <div class="pl-6 pr-3 w-2/3">
                            <h3 class="pb-2 text-2xl text-amber-600 font-medium">Free things to do in there 3</h3>
                            <p class="py-2 text-sm font-medium">December 8, 2023</p>
                            <p class="text-lg font-light py-1">hello everyone this is one of the most amazing things to do in
                                life just dont over do it while you are still have the potentionl to do so...</p>
                        </div>
                    </div>
                </article>
                <section class="flex py-3">
                    <ul class="flex mx-auto border rounded-lg overflow-hidden">
                        <li><a class="block px-3 py-2 text-sm border-r hover:bg-amber-300" href=""><i class="fa-regular fa-angles-left"></i></a></li>
                        <li><a class="block px-3 py-2 text-sm border-r hover:bg-amber-300" href=""><i class="fa-regular fa-angle-left"></i></a></li>
                        <li><a class="block px-3 py-2 text-sm border-r hover:bg-amber-300" href="">3</a></li>
                        <li><a class="block px-3 py-2 text-sm border-r hover:bg-amber-300" href="">4</a></li>
                        <li><a class="block px-3 py-2 text-sm border-r hover:bg-amber-300 bg-amber-300" href="">5</a></li>
                        <li><a class="block px-3 py-2 text-sm border-r hover:bg-amber-300" href="">6</a></li>
                        <li><a class="block px-3 py-2 text-sm border-r hover:bg-amber-300" href="">7</a></li>
                        <li><a class="block px-3 py-2 text-sm border-r hover:bg-amber-300" href=""><i class="fa-regular fa-angle-right"></i></a></li>
                        <li><a class="block px-3 py-2 text-sm hover:bg-amber-300" href=""><i class="fa-regular fa-angles-right"></i></a></li>
                    </ul>
                </section>
            </main>
        </div>
        <div class="w-1/3 pl-5">
            @include('inc.aside')
        </div>
    </div>
    @include('inc.footer')
</body>

</html>
