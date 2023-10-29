<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuisine Compass | Taste the World | Food Blog</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="/fontawesome/css/all.css">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <script src="/script.js"></script>
</head>

<body>
    <header class="max-w-6xl mx-auto">
        <div class="flex flex-wrap items-center justify-between py-10 w-full border-b">
            <div class="mb-5 lg:mb-0 w-full lg:w-auto lg:mr-1">
                <a href="/" class="block"><img src="/images/logo.svg" alt="Logo" class="block mx-auto lg:pl-1 block h-16"></a>
            </div>
            <div id="search_form" class="w-full mb-4 md:my-0 md:w-auto md:mr-auto md:ml-1 lg:mr-0 lg:ml-auto">
                <form class="border flex" action="search">
                    <select name="category" id="category" class="px-3 py-2 lg:py-3 lg:px-2 text-xs font-semibold outline-none uppercase border-white border-2 bg-neutral-100 transition-all hover:bg-neutral-200 cursor-pointer">
                        <option value="all" selected>All Categories</option>
                        <option class="text-[2px]" disabled></option>
                        <option value="desserts">Desserts</option>
                        <option class="text-[2px]" disabled></option>
                        <option value="diets">Diets</option>
                        <option class="text-[2px]" disabled></option>
                        <option value="breakfast">Breakfast</option>
                        <option class="text-[2px]" disabled></option>
                        <option value="11">Salads</option>
                        <option class="text-[2px]" disabled></option>
                        <option value="drinks">Drinks</option>
                        <option class="text-[2px]" disabled></option>
                        <option value="fast_food">Fast Food</option>
                    </select>
                    <input placeholder="Search recipes..." type="text" id="q" name="q" class="flex-1 px-1 py-3 border-none bg-none focus:outline-none w-72 text-sm">
                    <button type="submit" class="w-12 h-12 bg-yellow-300 transition-all hover:bg-amber-200">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </form>
            </div>
            <div class="w-full md:w-auto">
                <ul class="flex items-center pl-3 justify-center">
                    <li class="border-r">
                        <a href="/" class="py-2 px-3 transition-all hover:text-neutral-500">Home</a>
                    </li>
                    <li class="border-r">
                        <a href="/" class="py-2 px-3 transition-all hover:text-neutral-500">About Us</a>
                    </li>
                    <li>
                        <a href="/" class="py-2 px-3 transition-all hover:text-neutral-500">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
        <nav class="flex items-center">
            <ul class="flex items-center">
                <li class="mr-3"><a href="/" class="block text-sm font-bold text-neutral-600 px-3 py-5 transition-all hover:text-white hover:bg-amber-300 uppercase">Home</a>
                </li>
                <li class="mr-3"><a href="/" class="block text-sm font-bold text-neutral-600 px-3 py-5 transition-all hover:text-white hover:bg-amber-300 uppercase">Categories</a>
                </li>
                <li class="mr-3"><a href="/" class="block text-sm font-bold text-neutral-600 px-3 py-5 transition-all hover:text-white hover:bg-amber-300 uppercase">Recipes</a>
                </li>
                <li><a href="/" class="block text-sm font-bold text-neutral-600 px-3 py-5 transition-all hover:text-white hover:bg-amber-300 uppercase">Link</a>
                </li>
            </ul>
            <ul class="flex items-center ml-auto">
                <li><a href="/" class="p-1 transition-all hover:text-amber-300 mr-1 block"><i class="fa-sm fa-brands fa-instagram"></i></a></li>
                <li><a href="/" class="p-1 transition-all hover:text-amber-300 mr-1 block"><i class="fa-sm fa-brands fa-facebook-f"></i></a></li>
                <li><a href="/" class="p-1 transition-all hover:text-amber-300 block"><i class="fa-sm fa-brands fa-x-twitter"></i></a></li>
                <li><a href="/" class="p-1 transition-all hover:text-amber-300 block"><i class="fa-sm fa-brands fa-pinterest"></i></a></li>
                <li><a href="/" class="p-1 transition-all hover:text-amber-300 block"><i class="fa-sm fa-brands fa-tiktok"></i></a></li>
                <li><a href="/" class="p-1 transition-all hover:text-amber-300 block"><i class="fa-sm fa-brands fa-youtube"></i></a></li>
            </ul>
        </nav>
    </header>
    <section class="relative h-[600px]">
        <img class="w-full h-full object-cover" src="/images/blackforest-peanut-cake.jpg" alt="Blackforest Peanut Cake" title="Blackforest Peanut Cake">
        <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-b from-[rgba(0,0,0,.8)] via-transparent to-[rgba(0,0,0,.8)]">
        </div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 max-w-6xl w-full flex justify-left">
            <div class="mr-auto w-[500px] max-w-full p-8 bg-white">
                <div class="text-neutral-500 text-sm uppercase">
                    <span class="inline-flex items-center mr-1"><i class="fa-solid mr-1 fa-hourglass-half"></i> 15
                        mins</span>
                    <span class="inline-flex items-center"><i class="fa-solid mr-1 fa-tag fa-flip-horizontal"></i> Tips
                        & Tricks</span>
                </div>
                <h3 class="text-5xl font-light py-3 leading-tight">Blackforest Peanut Cake</h3>
                <p class="text-sm text-neutral-600 py-2 leading-tight">A delectable dessert featuring a moist chocolate
                    cake with the added crunch and flavor of peanuts.</p>
                <div class="py-3 text-sm text-neutral-500 flex items-center">
                    <time datetime="2023-10-12 21:00">Thu 12 Oct 2023</time>
                    <div class="ml-auto">
                        <a href="/" class="p-1 mr-1"><i class="fa-solid fa-share-nodes fa-lg"></i></a>
                        <a href="/" class="p-1"><i class="fa-regular fa-bookmark fa-lg"></i></a>
                    </div>
                </div>
                <div class="text-center py-1">
                    <a href="/" class="px-7 py-3 bg-amber-400 inline-block transition-all hover:bg-amber-300 hover:text-neutral-600">See
                        the Recipe <i class="fa-solid fa-angles-right fa-xs"></i></a>
                </div>
            </div>
        </div>
    </section>
    <section class="max-w-6xl mx-auto py-10">
        <div class="grid px-6 md:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-8 lg:gap-12">
            @foreach ($recipes as $recipe)
                <article class="">
                    <img src="{{ $recipe->image_url }}" alt="" class="block w-full h-64 mb-3 object-cover">
                    <div class="text-neutral-500 text-sm uppercase">
                        <span class="inline-flex items-center mr-1"><i class="fa-solid mr-1 fa-hourglass-half"></i>{{ $recipe->cooking_time }} mins</span>
                        <a href="/category/{{ $recipe->category->slug }}" class="inline-flex items-center"><i class="fa-solid mr-1 fa-tag fa-flip-horizontal"></i> {{ $recipe->category->label }}</a>
                    </div>
                    <h3 class="text-2xl font-light py-2 leading-tight"><?= $recipe->title ?></h3>
                    <p class="text-sm text-neutral-600 py-1 leading-tight line-clamp-2"><?= $recipe->description ?></p>
                    <div class="py-3 text-sm text-neutral-500 flex items-center">
                        <time datetime="2023-10-12 21:00">{{ $recipe->created_at->diffForHumans() }}</time>
                        <div class="ml-auto">
                            <a href="/" class="p-1 mr-1"><i class="fa-solid fa-share-nodes fa-lg"></i></a>
                            <a href="/" class="p-1"><i class="fa-regular fa-bookmark fa-lg"></i></a>
                        </div>
                    </div>
                    <div class="text-center py-1">
                        <a href="/recipe/<?= $recipe->slug ?>" class="px-7 py-3 bg-amber-400 inline-block transition-all hover:bg-amber-300 hover:text-neutral-600">See
                            the Recipe <i class="fa-solid fa-angles-right fa-xs"></i></a>
                    </div>
                </article>
            @endforeach
            <article class="">
                <img src="/images/crispy-pan-fried-penne-pasta.jpg" alt="" class="block w-full h-64 mb-3 object-cover">
                <div class="text-neutral-500 text-sm uppercase">
                    <span class="inline-flex items-center mr-1"><i class="fa-solid mr-1 fa-hourglass-half"></i> 15
                        mins</span>
                    <span class="inline-flex items-center"><i class="fa-solid mr-1 fa-tag fa-flip-horizontal"></i> Tips
                        & Tricks</span>
                </div>
                <h3 class="text-2xl font-light py-2 leading-tight">Crispy Pan-Fried Penne Pasta</h3>
                <p class="text-sm text-neutral-600 py-1 leading-tight">with arrabiata sauce and Caesar salad</p>
                <div class="py-3 text-sm text-neutral-500 flex items-center">
                    <time datetime="2023-10-12 21:00">Thu 12 Oct 2023</time>
                    <div class="ml-auto">
                        <a href="/" class="p-1 mr-1"><i class="fa-solid fa-share-nodes fa-lg"></i></a>
                        <a href="/" class="p-1"><i class="fa-regular fa-bookmark fa-lg"></i></a>
                    </div>
                </div>
                <div class="text-center py-1">
                    <a href="/" class="px-7 py-3 bg-amber-400 inline-block transition-all hover:bg-amber-300 hover:text-neutral-600">See
                        the Recipe <i class="fa-solid fa-angles-right fa-xs"></i></a>
                </div>
            </article>
        </div>
    </section>
    <section class="relative h-[700px]">
        <img src="/images/white-ceramic-bowl-with-food.jpg" alt="two sliced breads with avocado on top" class="w-full h-full object-cover">
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-full flex items-center justify-start max-w-6xl mx-auto">
            <div class="w-[500px] max-w-full bg-white bg-opacity-60 p-5">
                <h3 class="font-semibold text-5xl leading-tight text-neutral-800">The newest vegan recipes books</h3>
                <p class="py-5 text-lg text-neutral-600">Check out my newest vegan recipes books</p>
                <div class="grid grid-cols-3 gap-5 py-5">
                    <div class="flex justify-center items-center h-60 text-2xl bg-yellow-100 font-extralight border-yellow-200 border-4">
                        Book 1
                    </div>
                    <div class="flex justify-center items-center h-60 text-2xl bg-yellow-100 font-extralight border-yellow-200 border-4">
                        Book 2
                    </div>
                    <div class="flex justify-center items-center h-60 text-2xl bg-yellow-100 font-extralight border-yellow-200 border-4">
                        Book 3
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="grid md:grid-cols-3 gap-5 py-10 max-w-6xl mx-auto">
        <main class="pl-1 col-span-2">
            <div class="flex items-baseline relative after:content-[''] after:block after:flex-1 after:h-1 after:bg-neutral-800 mb-3">
                <span class="block font-semibold mr-3 text-lg">Recent Recipes</span>
            </div>
            <article class="flex flex-wrap my-5">
                <div class="w-full sm:w-2/5">
                    <div class="h-0 pt-[50%] sm:pt-[70%] relative">
                        <img src="/images/pancakes.jpg" alt="Pancakes" class="block absolute h-full w-full top-0 left-0 object-cover">
                    </div>
                </div>
                <div class="w-full sm:w-3/5 p-5 flex-0">
                    <div class="text-neutral-500 text-xs uppercase py-1">
                        <span class="inline-flex items-center mr-1"><i class="fa-solid mr-1 fa-hourglass-half"></i> 15
                            mins</span>
                        <span class="inline-flex items-center"><i class="fa-solid mr-1 fa-tag fa-flip-horizontal"></i>
                            Breakfast</span>
                    </div>
                    <h3 class="text-xl font-semibold py-2">The Secret of Fluffy Pancakes: A Breakfast Lover's Dream</h3>
                    <p class="text-sm text-neutral-600 py-1">Pancakes are a breakfast classic enjoyed by people of all
                        ages. There's something undeniably comforting about biting into a stack of warm, fluffy pancakes
                        drizzled with syrup.</p>
                </div>
            </article>
            <article class="flex flex-wrap my-5">
                <div class="w-full sm:w-2/5">
                    <div class="h-0 pt-[50%] sm:pt-[70%] relative">
                        <img src="/images/pancakes.jpg" alt="Pancakes" class="block absolute h-full w-full top-0 left-0 object-cover">
                    </div>
                </div>
                <div class="w-full sm:w-3/5 p-5 flex-0">
                    <div class="text-neutral-500 text-xs uppercase py-1">
                        <span class="inline-flex items-center mr-1"><i class="fa-solid mr-1 fa-hourglass-half"></i> 15
                            mins</span>
                        <span class="inline-flex items-center"><i class="fa-solid mr-1 fa-tag fa-flip-horizontal"></i>
                            Breakfast</span>
                    </div>
                    <h3 class="text-xl font-semibold py-2">The Secret of Fluffy Pancakes: A Breakfast Lover's Dream</h3>
                    <p class="text-sm text-neutral-600 py-1">Pancakes are a breakfast classic enjoyed by people of all
                        ages. There's something undeniably comforting about biting into a stack of warm, fluffy pancakes
                        drizzled with syrup.</p>
                </div>
            </article>
            <article class="flex flex-wrap my-5">
                <div class="w-full sm:w-2/5">
                    <div class="h-0 pt-[50%] sm:pt-[70%] relative">
                        <img src="/images/pancakes.jpg" alt="Pancakes" class="block absolute h-full w-full top-0 left-0 object-cover">
                    </div>
                </div>
                <div class="w-full sm:w-3/5 p-5 flex-0">
                    <div class="text-neutral-500 text-xs uppercase py-1">
                        <span class="inline-flex items-center mr-1"><i class="fa-solid mr-1 fa-hourglass-half"></i> 15
                            mins</span>
                        <span class="inline-flex items-center"><i class="fa-solid mr-1 fa-tag fa-flip-horizontal"></i>
                            Breakfast</span>
                    </div>
                    <h3 class="text-xl font-semibold py-2">The Secret of Fluffy Pancakes: A Breakfast Lover's Dream</h3>
                    <p class="text-sm text-neutral-600 py-1">Pancakes are a breakfast classic enjoyed by people of all
                        ages. There's something undeniably comforting about biting into a stack of warm, fluffy pancakes
                        drizzled with syrup.</p>
                </div>
            </article>
            <article class="flex flex-wrap my-5">
                <div class="w-full sm:w-2/5">
                    <div class="h-0 pt-[50%] sm:pt-[70%] relative">
                        <img src="/images/pancakes.jpg" alt="Pancakes" class="block absolute h-full w-full top-0 left-0 object-cover">
                    </div>
                </div>
                <div class="w-full sm:w-3/5 p-5 flex-0">
                    <div class="text-neutral-500 text-xs uppercase py-1">
                        <span class="inline-flex items-center mr-1"><i class="fa-solid mr-1 fa-hourglass-half"></i> 15
                            mins</span>
                        <span class="inline-flex items-center"><i class="fa-solid mr-1 fa-tag fa-flip-horizontal"></i>
                            Breakfast</span>
                    </div>
                    <h3 class="text-xl font-semibold py-2">The Secret of Fluffy Pancakes: A Breakfast Lover's Dream</h3>
                    <p class="text-sm text-neutral-600 py-1">Pancakes are a breakfast classic enjoyed by people of all
                        ages. There's something undeniably comforting about biting into a stack of warm, fluffy pancakes
                        drizzled with syrup.</p>
                </div>
            </article>
            <article class="flex flex-wrap my-5">
                <div class="w-full sm:w-2/5">
                    <div class="h-0 pt-[50%] sm:pt-[70%] relative">
                        <img src="/images/pancakes.jpg" alt="Pancakes" class="block absolute h-full w-full top-0 left-0 object-cover">
                    </div>
                </div>
                <div class="w-full sm:w-3/5 p-5 flex-0">
                    <div class="text-neutral-500 text-xs uppercase py-1">
                        <span class="inline-flex items-center mr-1"><i class="fa-solid mr-1 fa-hourglass-half"></i> 15
                            mins</span>
                        <span class="inline-flex items-center"><i class="fa-solid mr-1 fa-tag fa-flip-horizontal"></i>
                            Breakfast</span>
                    </div>
                    <h3 class="text-xl font-semibold py-2">The Secret of Fluffy Pancakes: A Breakfast Lover's Dream</h3>
                    <p class="text-sm text-neutral-600 py-1">Pancakes are a breakfast classic enjoyed by people of all
                        ages. There's something undeniably comforting about biting into a stack of warm, fluffy pancakes
                        drizzled with syrup.</p>
                </div>
            </article>
            <article class="flex flex-wrap my-5">
                <div class="w-full sm:w-2/5">
                    <div class="h-0 pt-[50%] sm:pt-[70%] relative">
                        <img src="/images/pancakes.jpg" alt="Pancakes" class="block absolute h-full w-full top-0 left-0 object-cover">
                    </div>
                </div>
                <div class="w-full sm:w-3/5 p-5 flex-0">
                    <div class="text-neutral-500 text-xs uppercase py-1">
                        <span class="inline-flex items-center mr-1"><i class="fa-solid mr-1 fa-hourglass-half"></i> 15
                            mins</span>
                        <span class="inline-flex items-center"><i class="fa-solid mr-1 fa-tag fa-flip-horizontal"></i>
                            Breakfast</span>
                    </div>
                    <h3 class="text-xl font-semibold py-2">The Secret of Fluffy Pancakes: A Breakfast Lover's Dream</h3>
                    <p class="text-sm text-neutral-600 py-1">Pancakes are a breakfast classic enjoyed by people of all
                        ages. There's something undeniably comforting about biting into a stack of warm, fluffy pancakes
                        drizzled with syrup.</p>
                </div>
            </article>
            <article class="flex flex-wrap my-5">
                <div class="w-full sm:w-2/5">
                    <div class="h-0 pt-[50%] sm:pt-[70%] relative">
                        <img src="/images/pancakes.jpg" alt="Pancakes" class="block absolute h-full w-full top-0 left-0 object-cover">
                    </div>
                </div>
                <div class="w-full sm:w-3/5 p-5 flex-0">
                    <div class="text-neutral-500 text-xs uppercase py-1">
                        <span class="inline-flex items-center mr-1"><i class="fa-solid mr-1 fa-hourglass-half"></i> 15
                            mins</span>
                        <span class="inline-flex items-center"><i class="fa-solid mr-1 fa-tag fa-flip-horizontal"></i>
                            Breakfast</span>
                    </div>
                    <h3 class="text-xl font-semibold py-2">The Secret of Fluffy Pancakes: A Breakfast Lover's Dream</h3>
                    <p class="text-sm text-neutral-600 py-1">Pancakes are a breakfast classic enjoyed by people of all
                        ages. There's something undeniably comforting about biting into a stack of warm, fluffy pancakes
                        drizzled with syrup.</p>
                </div>
            </article>
            <article class="flex flex-wrap my-5">
                <div class="w-full sm:w-2/5">
                    <div class="h-0 pt-[50%] sm:pt-[70%] relative">
                        <img src="/images/pancakes.jpg" alt="Pancakes" class="block absolute h-full w-full top-0 left-0 object-cover">
                    </div>
                </div>
                <div class="w-full sm:w-3/5 p-5 flex-0">
                    <div class="text-neutral-500 text-xs uppercase py-1">
                        <span class="inline-flex items-center mr-1"><i class="fa-solid mr-1 fa-hourglass-half"></i> 15
                            mins</span>
                        <span class="inline-flex items-center"><i class="fa-solid mr-1 fa-tag fa-flip-horizontal"></i>
                            Breakfast</span>
                    </div>
                    <h3 class="text-xl font-semibold py-2">The Secret of Fluffy Pancakes: A Breakfast Lover's Dream</h3>
                    <p class="text-sm text-neutral-600 py-1">Pancakes are a breakfast classic enjoyed by people of all
                        ages. There's something undeniably comforting about biting into a stack of warm, fluffy pancakes
                        drizzled with syrup.</p>
                </div>
            </article>
        </main>
        <aside>
            <div class="relative px-5 pb-5 pt-10 border">
                <span class="absolute block -top-3 left-1/2 -translate-x-1/2 bg-white px-4 uppercase text-sm font-semibold tracking-wider">Categories</span>
                <div class="grid grid-cols-3 gap-5">
                    <div class="text-center transition-all hover:-translate-y-1 cursor-pointer">
                        <img src="/images/categories/salads.svg" alt="Salads" class="w-16 h-16 mx-auto block">
                        <span class="block py-1">Salads</span>
                    </div>
                    <div class="text-center transition-all hover:-translate-y-1 cursor-pointer">
                        <img src="/images/categories/fast-food.svg" alt="Fast Food" class="w-16 h-16 mx-auto block">
                        <span class="block py-1">Fast Food</span>
                    </div>
                    <div class="text-center transition-all hover:-translate-y-1 cursor-pointer">
                        <img src="/images/categories/breakfast.svg" alt="Breakfast" class="w-16 h-16 mx-auto block">
                        <span class="block py-1">Breakfast</span>
                    </div>
                    <div class="text-center transition-all hover:-translate-y-1 cursor-pointer">
                        <img src="/images/categories/soups.svg" alt="Breakfast" class="w-16 h-16 mx-auto block">
                        <span class="block py-1">Soups</span>
                    </div>
                    <div class="text-center transition-all hover:-translate-y-1 cursor-pointer">
                        <img src="/images/categories/meat.svg" alt="Breakfast" class="w-16 h-16 mx-auto block">
                        <span class="block py-1">Meat</span>
                    </div>
                    <div class="text-center transition-all hover:-translate-y-1 cursor-pointer">
                        <img src="/images/categories/drinks.svg" alt="Breakfast" class="w-16 h-16 mx-auto block">
                        <span class="block py-1">Drinks</span>
                    </div>
                </div>
            </div>
            <div class="bg-neutral-100 p-10 text-center my-5">
                <h3 class="text-2xl font-medium py-2">Never Miss a Post</h3>
                <p class="text-sm text-neutral-600 py-2">Signup for free and be the first to get notified on new
                    updates.</p>
                <input class="p-3 bg-white w-full my-4 leading-relaxed outline-none" placeholder="Your Email*" type="email" name="email" id="email">
                <button class="bg-neutral-800 text-white py-3 px-1 w-full">Subscribe</button>
            </div>
            <div class="my-5">
                <img src="/images/get-app.png" alt="Get APP" class="block">
            </div>
            <div class="relative px-5 pb-5 pt-10 border mt-10 mb-5">
                <span class="absolute block -top-3 left-1/2 -translate-x-1/2 bg-white px-4 uppercase text-sm font-semibold tracking-wider">Follow
                    Me</span>
                <div class="flex justify-between items-center">
                    <a href="/" class="block w-12 h-12 flex hover:text-neutral-100 items-center justify-center relative before:absolute before:block before:inset-0 before:w-full before:h-full before:opacity-0 before:content-[''] before:bg-gradient-to-tr before:bg-gradient-to-tr before:from-[#ff7a00] before:via-[#ff0069] before:to-[#d300c5] before:transition-all hover:before:opacity-100">
                        <i class="fa-brands fa-instagram fa-lg transition-all relative"></i>
                    </a>
                    <a href="/" class="block w-12 h-12 flex hover:text-neutral-100 items-center justify-center relative before:absolute before:block before:inset-0 before:w-full before:h-full before:opacity-0 before:content-[''] before:bg-gradient-to-tr before:bg-gradient-to-tr before:from-[#333333] before:to-[#111111] before:transition-all hover:before:opacity-100">
                        <i class="fa-brands fa-x-twitter fa-lg transition-all relative"></i>
                    </a>
                    <a href="/" class="block w-12 h-12 flex hover:text-neutral-100 items-center justify-center relative before:absolute before:block before:inset-0 before:w-full before:h-full before:opacity-0 before:content-[''] before:bg-gradient-to-tr before:bg-gradient-to-tr before:from-[#3b5998] before:to-[#2b4170] before:transition-all hover:before:opacity-100">
                        <i class="fa-brands fa-facebook-f fa-lg transition-all relative"></i>
                    </a>
                    <a href="/" class="block w-12 h-12 flex hover:text-neutral-100 items-center group justify-center relative before:absolute before:block before:inset-0 before:w-full before:h-full before:opacity-0 before:content-[''] before:bg-gradient-to-tr before:bg-gradient-to-tr before:to-[#EE1D52] before:from-[#69C9D0] before:transition-all hover:before:opacity-100">
                        <i class="fa-brands fa-tiktok fa-lg transition-all relative"></i>
                    </a>
                    <a href="/" class="block w-12 h-12 flex hover:text-neutral-100 items-center justify-center relative before:absolute before:block before:inset-0 before:w-full before:h-full before:opacity-0 before:content-[''] before:bg-gradient-to-tr before:bg-gradient-to-tr before:to-[#E60023] before:from-[#ef4444] before:transition-all hover:before:opacity-100">
                        <i class="fa-brands fa-pinterest fa-lg transition-all relative"></i>
                    </a>
                </div>
            </div>
            <div class="my-5">
                <img src="./images/find-us-on-youtube.jpg" alt="Find Us On Youtube" class="block">
            </div>
        </aside>
    </div>
    <section class="bg-slate-200 py-10">
        <div class="text-center max-w-6xl mx-auto">
            <h3 class="py-1 text-2xl font-medium">New Recipe Every Wednesday</h3>
            <p class="py-2 text-sm text-neutral-800">Get ready for a culinary spectacle! Every week, we bring you a
                tantalizing new recipe that'll set your taste buds on fire. Join us and savor the thrill of culinary
                creation!</p>
        </div>
        <div class="flex items-center justify-between max-w-6xl mx-auto my-6">
            <div class="w-1/2">
                <div class="h-0 pt-[56.25%] relative">
                    <div class="absolute top-0 left-0 w-full h-full p-2">
                        <iframe class="w-full h-full" src="https://player.vimeo.com/video/471904636" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
            <div class="w-1/2">
                <div class="h-0 pt-[56.25%] relative">
                    <div class="absolute top-0 left-0 w-full h-full p-2">
                        <iframe class="w-full h-full" src="https://player.vimeo.com/video/467264355" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="p-10">
        <div class="max-w-6xl mx-auto">
            <h3 class="flex items-center py-3 mb-3 text-xl font-medium text-center">
                <span class="flex-1 h-1 bg-slate-200"></span>
                <span class="px-3">The most popular recipes this week</span>
                <span class="flex-1 h-1 bg-slate-200"></span>
            </h3>
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-5">
                <div>
                    <img src="/images/week-recipe.jpg" alt="Week Recipe" class="block h-32 object-cover w-full border">
                    <h5 class="py-2 text-lg font-medium">Simple Italian Salad</h5>
                </div>
                <div>
                    <img src="/images/week-recipe.jpg" alt="Week Recipe" class="block h-32 object-cover w-full border">
                    <h5 class="py-2 text-lg font-medium">Simple Italian Salad</h5>
                </div>
                <div>
                    <img src="/images/week-recipe.jpg" alt="Week Recipe" class="block h-32 object-cover w-full border">
                    <h5 class="py-2 text-lg font-medium">Simple Italian Salad</h5>
                </div>
                <div>
                    <img src="/images/week-recipe.jpg" alt="Week Recipe" class="block h-32 object-cover w-full border">
                    <h5 class="py-2 text-lg font-medium">Simple Italian Salad</h5>
                </div>
                <div>
                    <img src="/images/week-recipe.jpg" alt="Week Recipe" class="block h-32 object-cover w-full border">
                    <h5 class="py-2 text-lg font-medium">Simple Italian Salad</h5>
                </div>
                <div>
                    <img src="/images/week-recipe.jpg" alt="Week Recipe" class="block h-32 object-cover w-full border">
                    <h5 class="py-2 text-lg font-medium">Simple Italian Salad</h5>
                </div>
                <div>
                    <img src="/images/week-recipe.jpg" alt="Week Recipe" class="block h-32 object-cover w-full border">
                    <h5 class="py-2 text-lg font-medium">Simple Italian Salad</h5>
                </div>
                <div>
                    <img src="/images/week-recipe.jpg" alt="Week Recipe" class="block h-32 object-cover w-full border">
                    <h5 class="py-2 text-lg font-medium">Simple Italian Salad</h5>
                </div>
                <div>
                    <img src="/images/week-recipe.jpg" alt="Week Recipe" class="block h-32 object-cover w-full border">
                    <h5 class="py-2 text-lg font-medium">Simple Italian Salad</h5>
                </div>
                <div>
                    <img src="/images/week-recipe.jpg" alt="Week Recipe" class="block h-32 object-cover w-full border">
                    <h5 class="py-2 text-lg font-medium">Simple Italian Salad</h5>
                </div>
                <div>
                    <img src="/images/week-recipe.jpg" alt="Week Recipe" class="block h-32 object-cover w-full border">
                    <h5 class="py-2 text-lg font-medium">Simple Italian Salad</h5>
                </div>
                <div>
                    <img src="/images/week-recipe.jpg" alt="Week Recipe" class="block h-32 object-cover w-full border">
                    <h5 class="py-2 text-lg font-medium">Simple Italian Salad</h5>
                </div>
            </div>
        </div>
    </section>
    <footer class="py-3 text-sm font-medium border-t border-neutral-400">
        <nav class="max-w-6xl mx-auto flex flex-wrap items-center">
            <span class="flex-0 md:flex-1 block w-full md:w-auto text-center py-1 md:py-0 md:text-left mr-0 md:mr-auto">&copy; 2023 <a href="/">Cuisine Compass</a></span>
            <ul class="flex-0 md:flex-1 flex justify-center w-full md:w-auto py-1 md:py-0">
                <li class="px-1"><a class="hover:underline px-2 py-2 block" href="/">Home</a></li>
                <li class="px-1"><a class="hover:underline px-2 py-2 block" href="/">Categories</a></li>
                <li class="px-1"><a class="hover:underline px-2 py-2 block" href="/">Recipes</a></li>
                <li class="px-1"><a class="hover:underline px-2 py-2 block" href="/">Contact</a></li>
                <li class="px-1"><a class="hover:underline px-2 py-2 block" href="/">About</a></li>
            </ul>
            <ul class="flex-0 md:flex-1 flex justify-center w-full md:w-auto md:justify-end ml-auto py-1 md:py-0">
                <li><a href="/" class="p-1"><i class="fa-brands fa-facebook-f"></i></a></li>
                <li><a href="/" class="p-1"><i class="fa-brands fa-instagram"></i></a></li>
                <li><a href="/" class="p-1"><i class="fa-brands fa-x-twitter"></i></a></li>
                <li><a href="/" class="p-1"><i class="fa-brands fa-youtube"></i></a></li>
                <li><a href="/" class="p-1"><i class="fa-brands fa-tiktok"></i></a></li>
                <li><a href="/" class="p-1"><i class="fa-brands fa-pinterest"></i></a></li>
            </ul>
        </nav>
    </footer>
</body>

</html>