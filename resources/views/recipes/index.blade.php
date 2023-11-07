<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Recipes</title>
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
                        src="https://images.pexels.com/photos/4551832/pexels-photo-4551832.jpeg?auto=compress&cs=tinysrgb&w=1920"
                        alt="">
                    <a href="#"
                        class="block relative py-32 hover:pt-28 hover:pb-36 transition-all duration-500 bg-gradient-to-t from-[rgba(0,0,0,.7)] to-[rgba(0,0,0,.3)]">
                        <h3 class="text-3xl py-2 text-center text-white">Hash Brown and Bacon Omelet Cups</h3>
                        <p class="text-center py-2 text-neutral-200">
                            <span>Easy</span>
                            <span>&nbsp;&bull;&nbsp;</span>
                            <span>20 mins</span>
                            <span>&nbsp;&bull;&nbsp;</span>
                            <span>6 people</span>
                            <span>&nbsp;&bull;&nbsp;</span>
                            <span class="italic"><span class="underline">Breakfast</span>, <span
                                    class="underline">Brunch</span>, <span class="underline">Pancakes</span></span>
                        </p>
                    </a>
                </div>
                <div class="relative">
                    <img class="absolute inset-0 w-full h-full object-cover"
                        src="https://images.pexels.com/photos/4551832/pexels-photo-4551832.jpeg?auto=compress&cs=tinysrgb&w=1920"
                        alt="">
                    <a href="#"
                        class="block relative py-32 hover:pt-28 hover:pb-36 transition-all duration-500 bg-gradient-to-t from-[rgba(0,0,0,.7)] to-[rgba(0,0,0,.3)]">
                        <h3 class="text-3xl py-2 text-center text-white">Hash Brown and Bacon Omelet Cups</h3>
                        <p class="text-center py-2 text-neutral-200">
                            <span>Easy</span>
                            <span>&nbsp;&bull;&nbsp;</span>
                            <span>20 mins</span>
                            <span>&nbsp;&bull;&nbsp;</span>
                            <span>6 people</span>
                            <span>&nbsp;&bull;&nbsp;</span>
                            <span class="italic"><span class="underline">Breakfast</span>, <span
                                    class="underline">Brunch</span>, <span class="underline">Pancakes</span></span>
                        </p>
                    </a>
                </div>
                <div class="relative">
                    <img class="absolute inset-0 w-full h-full object-cover"
                        src="https://images.pexels.com/photos/4551832/pexels-photo-4551832.jpeg?auto=compress&cs=tinysrgb&w=1920"
                        alt="">
                    <a href="#"
                        class="block relative py-32 hover:pt-28 hover:pb-36 transition-all duration-500 bg-gradient-to-t from-[rgba(0,0,0,.7)] to-[rgba(0,0,0,.3)]">
                        <h3 class="text-3xl py-2 text-center text-white">Hash Brown and Bacon Omelet Cups</h3>
                        <p class="text-center py-2 text-neutral-200">
                            <span>Easy</span>
                            <span>&nbsp;&bull;&nbsp;</span>
                            <span>20 mins</span>
                            <span>&nbsp;&bull;&nbsp;</span>
                            <span>6 people</span>
                            <span>&nbsp;&bull;&nbsp;</span>
                            <span class="italic"><span class="underline">Breakfast</span>, <span
                                    class="underline">Brunch</span>, <span class="underline">Pancakes</span></span>
                        </p>
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
                        <img class="w-1/3" src="https://source.unsplash.com/collection/9978864/750x350?breakfast"
                            alt="">
                        <div class="pl-6 pr-3 w-2/3">
                            <h3 class="pb-1 text-2xl text-amber-600 font-medium">Free things to do in there 3</h3>
                            <p class="py-1 text-sm font-medium">December 8, 2023</p>
                            <div class="py-2 text-neutral-500 text-sm uppercase">
                                <span class="inline-flex items-center px-1">
                                    <i class="fa-solid mr-1 fa-hourglass-half"></i>10 mins
                                </span>
                                <span class="px-1">
                                    <i class="fa-solid fa-sliders mr-1"></i>
                                    Easy
                                </span>
                                <span class="px-1">
                                    <i class="fa-solid fa-users mr-1"></i>5
                                </span>
                                <span class="px-1">
                                    <i class="fa-solid mr-1 fa-tag fa-flip-horizontal"></i>
                                    <a href="/category/fish" class="inline-flex items-center hover:underline">Fish</a>, 
                                    <a href="/category/fish" class="inline-flex items-center hover:underline">Cake</a>, 
                                    <a href="/category/fish" class="inline-flex items-center hover:underline">Eggs</a>
                                </span>
                            </div>
                            <p class="text-lg font-extralight py-1">hello everyone this is one of the most amazing things to
                                do in
                                life just dont over do it while you are still have the potentionl to do so...</p>
                        </div>
                    </div>
                </article>
                <article>
                    <div class="flex pt-4 pb-8">
                        <img class="w-1/3" src="https://source.unsplash.com/collection/9978864/800x420?breakfast"
                            alt="">
                        <div class="pl-6 pr-3 w-2/3">
                            <h3 class="pb-1 text-2xl text-amber-600 font-medium">Free things to do in there 3</h3>
                            <p class="py-1 text-sm font-medium">December 8, 2023</p>
                            <div class="py-2 text-neutral-500 text-sm uppercase">
                                <span class="inline-flex items-center px-1">
                                    <i class="fa-solid mr-1 fa-hourglass-half"></i>10 mins
                                </span>
                                <span class="px-1">
                                    <i class="fa-solid fa-sliders mr-1"></i>
                                    Easy
                                </span>
                                <span class="px-1">
                                    <i class="fa-solid fa-users mr-1"></i>5
                                </span>
                                <span class="px-1">
                                    <i class="fa-solid mr-1 fa-tag fa-flip-horizontal"></i>
                                    <a href="/category/fish" class="inline-flex items-center hover:underline">Fish</a>, 
                                    <a href="/category/fish" class="inline-flex items-center hover:underline">Cake</a>, 
                                    <a href="/category/fish" class="inline-flex items-center hover:underline">Eggs</a>
                                </span>
                            </div>
                            <p class="text-lg font-extralight py-1">hello everyone this is one of the most amazing things to
                                do in
                                life just dont over do it while you are still have the potentionl to do so...</p>
                        </div>
                    </div>
                </article>
                <article>
                    <div class="flex pt-4 pb-8">
                        <img class="w-1/3" src="https://source.unsplash.com/collection/9978864/800x450?breakfast"
                            alt="">
                        <div class="pl-6 pr-3 w-2/3">
                            <h3 class="pb-1 text-2xl text-amber-600 font-medium">Free things to do in there 3</h3>
                            <p class="py-1 text-sm font-medium">December 8, 2023</p>
                            <div class="py-2 text-neutral-500 text-sm uppercase">
                                <span class="inline-flex items-center px-1">
                                    <i class="fa-solid mr-1 fa-hourglass-half"></i>10 mins
                                </span>
                                <span class="px-1">
                                    <i class="fa-solid fa-sliders mr-1"></i>
                                    Easy
                                </span>
                                <span class="px-1">
                                    <i class="fa-solid fa-users mr-1"></i>5
                                </span>
                                <span class="px-1">
                                    <i class="fa-solid mr-1 fa-tag fa-flip-horizontal"></i>
                                    <a href="/category/fish" class="inline-flex items-center hover:underline">Fish</a>, 
                                    <a href="/category/fish" class="inline-flex items-center hover:underline">Cake</a>, 
                                    <a href="/category/fish" class="inline-flex items-center hover:underline">Eggs</a>
                                </span>
                            </div>
                            <p class="text-lg font-extralight py-1">hello everyone this is one of the most amazing things to
                                do in
                                life just dont over do it while you are still have the potentionl to do so...</p>
                        </div>
                    </div>
                </article>
                <article>
                    <div class="flex pt-4 pb-8">
                        <img class="w-1/3" src="https://source.unsplash.com/collection/9978864/500x450?breakfast"
                            alt="">
                        <div class="pl-6 pr-3 w-2/3">
                            <h3 class="pb-1 text-2xl text-amber-600 font-medium">Free things to do in there 3</h3>
                            <p class="py-1 text-sm font-medium">December 8, 2023</p>
                            <div class="py-2 text-neutral-500 text-sm uppercase">
                                <span class="inline-flex items-center px-1">
                                    <i class="fa-solid mr-1 fa-hourglass-half"></i>10 mins
                                </span>
                                <span class="px-1">
                                    <i class="fa-solid fa-sliders mr-1"></i>
                                    Easy
                                </span>
                                <span class="px-1">
                                    <i class="fa-solid fa-users mr-1"></i>5
                                </span>
                                <span class="px-1">
                                    <i class="fa-solid mr-1 fa-tag fa-flip-horizontal"></i>
                                    <a href="/category/fish" class="inline-flex items-center hover:underline">Fish</a>, 
                                    <a href="/category/fish" class="inline-flex items-center hover:underline">Cake</a>, 
                                    <a href="/category/fish" class="inline-flex items-center hover:underline">Eggs</a>
                                </span>
                            </div>
                            <p class="text-lg font-extralight py-1">hello everyone this is one of the most amazing things to
                                do in
                                life just dont over do it while you are still have the potentionl to do so...</p>
                        </div>
                    </div>
                </article>
                <article>
                    <div class="flex pt-4 pb-8">
                        <img class="w-1/3" src="https://source.unsplash.com/collection/9978864/600x350?breakfast"
                            alt="">
                        <div class="pl-6 pr-3 w-2/3">
                            <h3 class="pb-1 text-2xl text-amber-600 font-medium">Free things to do in there 3</h3>
                            <p class="py-1 text-sm font-medium">December 8, 2023</p>
                            <div class="py-2 text-neutral-500 text-sm uppercase">
                                <span class="inline-flex items-center px-1">
                                    <i class="fa-solid mr-1 fa-hourglass-half"></i>10 mins
                                </span>
                                <span class="px-1">
                                    <i class="fa-solid fa-sliders mr-1"></i>
                                    Easy
                                </span>
                                <span class="px-1">
                                    <i class="fa-solid fa-users mr-1"></i>5
                                </span>
                                <span class="px-1">
                                    <i class="fa-solid mr-1 fa-tag fa-flip-horizontal"></i>
                                    <a href="/category/fish" class="inline-flex items-center hover:underline">Fish</a>, 
                                    <a href="/category/fish" class="inline-flex items-center hover:underline">Cake</a>, 
                                    <a href="/category/fish" class="inline-flex items-center hover:underline">Eggs</a>
                                </span>
                            </div>
                            <p class="text-lg font-extralight py-1">hello everyone this is one of the most amazing things to
                                do in
                                life just dont over do it while you are still have the potentionl to do so...</p>
                        </div>
                    </div>
                </article>
                <article>
                    <div class="flex pt-4 pb-8">
                        <img class="w-1/3" src="https://source.unsplash.com/collection/9978864/600x400?breakfast"
                            alt="">
                        <div class="pl-6 pr-3 w-2/3">
                            <h3 class="pb-1 text-2xl text-amber-600 font-medium">Free things to do in there 3</h3>
                            <p class="py-1 text-sm font-medium">December 8, 2023</p>
                            <div class="py-2 text-neutral-500 text-sm uppercase">
                                <span class="inline-flex items-center px-1">
                                    <i class="fa-solid mr-1 fa-hourglass-half"></i>10 mins
                                </span>
                                <span class="px-1">
                                    <i class="fa-solid fa-sliders mr-1"></i>
                                    Easy
                                </span>
                                <span class="px-1">
                                    <i class="fa-solid fa-users mr-1"></i>5
                                </span>
                                <span class="px-1">
                                    <i class="fa-solid mr-1 fa-tag fa-flip-horizontal"></i>
                                    <a href="/category/fish" class="inline-flex items-center hover:underline">Fish</a>, 
                                    <a href="/category/fish" class="inline-flex items-center hover:underline">Cake</a>, 
                                    <a href="/category/fish" class="inline-flex items-center hover:underline">Eggs</a>
                                </span>
                            </div>
                            <p class="text-lg font-extralight py-1">hello everyone this is one of the most amazing things to
                                do in
                                life just dont over do it while you are still have the potentionl to do so...</p>
                        </div>
                    </div>
                </article>
                <article>
                    <div class="flex pt-4 pb-8">
                        <img class="w-1/3" src="https://source.unsplash.com/collection/9978864/800x430?breakfast"
                            alt="">
                        <div class="pl-6 pr-3 w-2/3">
                            <h3 class="pb-1 text-2xl text-amber-600 font-medium">Free things to do in there 3</h3>
                            <p class="py-1 text-sm font-medium">December 8, 2023</p>
                            <div class="py-2 text-neutral-500 text-sm uppercase">
                                <span class="inline-flex items-center px-1">
                                    <i class="fa-solid mr-1 fa-hourglass-half"></i>10 mins
                                </span>
                                <span class="px-1">
                                    <i class="fa-solid fa-sliders mr-1"></i>
                                    Easy
                                </span>
                                <span class="px-1">
                                    <i class="fa-solid fa-users mr-1"></i>5
                                </span>
                                <span class="px-1">
                                    <i class="fa-solid mr-1 fa-tag fa-flip-horizontal"></i>
                                    <a href="/category/fish" class="inline-flex items-center hover:underline">Fish</a>, 
                                    <a href="/category/fish" class="inline-flex items-center hover:underline">Cake</a>, 
                                    <a href="/category/fish" class="inline-flex items-center hover:underline">Eggs</a>
                                </span>
                            </div>
                            <p class="text-lg font-extralight py-1">hello everyone this is one of the most amazing things to
                                do in
                                life just dont over do it while you are still have the potentionl to do so...</p>
                        </div>
                    </div>
                </article>
                <article>
                    <div class="flex pt-4 pb-8">
                        <img class="w-1/3" src="https://source.unsplash.com/collection/9978864/900x450?breakfast"
                            alt="">
                        <div class="pl-6 pr-3 w-2/3">
                            <h3 class="pb-1 text-2xl text-amber-600 font-medium">Free things to do in there 3</h3>
                            <p class="py-1 text-sm font-medium">December 8, 2023</p>
                            <div class="py-2 text-neutral-500 text-sm uppercase">
                                <span class="inline-flex items-center px-1">
                                    <i class="fa-solid mr-1 fa-hourglass-half"></i>10 mins
                                </span>
                                <span class="px-1">
                                    <i class="fa-solid fa-sliders mr-1"></i>
                                    Easy
                                </span>
                                <span class="px-1">
                                    <i class="fa-solid fa-users mr-1"></i>5
                                </span>
                                <span class="px-1">
                                    <i class="fa-solid mr-1 fa-tag fa-flip-horizontal"></i>
                                    <a href="/category/fish" class="inline-flex items-center hover:underline">Fish</a>, 
                                    <a href="/category/fish" class="inline-flex items-center hover:underline">Cake</a>, 
                                    <a href="/category/fish" class="inline-flex items-center hover:underline">Eggs</a>
                                </span>
                            </div>
                            <p class="text-lg font-extralight py-1">hello everyone this is one of the most amazing things to
                                do in
                                life just dont over do it while you are still have the potentionl to do so...</p>
                        </div>
                    </div>
                </article>
                <article>
                    <div class="flex pt-4 pb-8">
                        <img class="w-1/3" src="https://source.unsplash.com/collection/9978864/800x450?breakfast"
                            alt="">
                        <div class="pl-6 pr-3 w-2/3">
                            <h3 class="pb-1 text-2xl text-amber-600 font-medium">Free things to do in there 3</h3>
                            <p class="py-1 text-sm font-medium">December 8, 2023</p>
                            <div class="py-2 text-neutral-500 text-sm uppercase">
                                <span class="inline-flex items-center px-1">
                                    <i class="fa-solid mr-1 fa-hourglass-half"></i>10 mins
                                </span>
                                <span class="px-1">
                                    <i class="fa-solid fa-sliders mr-1"></i>
                                    Easy
                                </span>
                                <span class="px-1">
                                    <i class="fa-solid fa-users mr-1"></i>5
                                </span>
                                <span class="px-1">
                                    <i class="fa-solid mr-1 fa-tag fa-flip-horizontal"></i>
                                    <a href="/category/fish" class="inline-flex items-center hover:underline">Fish</a>, 
                                    <a href="/category/fish" class="inline-flex items-center hover:underline">Cake</a>, 
                                    <a href="/category/fish" class="inline-flex items-center hover:underline">Eggs</a>
                                </span>
                            </div>
                            <p class="text-lg font-extralight py-1">hello everyone this is one of the most amazing things to
                                do in
                                life just dont over do it while you are still have the potentionl to do so...</p>
                        </div>
                    </div>
                </article>
                <article>
                    <div class="flex pt-4 pb-8">
                        <img class="w-1/3" src="https://source.unsplash.com/collection/9978864/600x300?breakfast"
                            alt="">
                        <div class="pl-6 pr-3 w-2/3">
                            <h3 class="pb-1 text-2xl text-amber-600 font-medium">Free things to do in there 3</h3>
                            <p class="py-1 text-sm font-medium">December 8, 2023</p>
                            <div class="py-2 text-neutral-500 text-sm uppercase">
                                <span class="inline-flex items-center px-1">
                                    <i class="fa-solid mr-1 fa-hourglass-half"></i>10 mins
                                </span>
                                <span class="px-1">
                                    <i class="fa-solid fa-sliders mr-1"></i>
                                    Easy
                                </span>
                                <span class="px-1">
                                    <i class="fa-solid fa-users mr-1"></i>5
                                </span>
                                <span class="px-1">
                                    <i class="fa-solid mr-1 fa-tag fa-flip-horizontal"></i>
                                    <a href="/category/fish" class="inline-flex items-center hover:underline">Fish</a>, 
                                    <a href="/category/fish" class="inline-flex items-center hover:underline">Cake</a>, 
                                    <a href="/category/fish" class="inline-flex items-center hover:underline">Eggs</a>
                                </span>
                            </div>
                            <p class="text-lg font-extralight py-1">hello everyone this is one of the most amazing things to
                                do in
                                life just dont over do it while you are still have the potentionl to do so...</p>
                        </div>
                    </div>
                </article>
            </main>
        </div>
        <div class="w-1/3 pl-5">
            @include('inc.aside')
        </div>
    </div>
    @include('inc.footer')
</body>

</html>
