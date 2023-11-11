<!DOCTYPE html>
<html lang="en">

<head>
    <title>Cuisine Compass | Taste the World | Food Blog</title>
    <meta property="og:title" content="Cuisine Compass | Taste the World | Food Blog" />
    <meta property="og:description" content="Cuisine Compass | Taste the World | Food Blog" />
    <meta property="og:image" content="" />
    @include('inc.common_head_tags')
</head>

<body>
    @include('inc.header')
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
                    <a href="/recipe" class="px-7 py-3 bg-amber-400 inline-block transition-all hover:bg-amber-300 hover:text-neutral-600">See
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
                        @foreach ($recipe->categories as $category)
                        <a href="/category/{{ $category->slug }}" class="inline-flex items-center"><i class="fa-solid mr-1 fa-tag fa-flip-horizontal"></i> {{ $category->label }}</a>
                        @endforeach
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
                        <a href="/recipes/<?= $recipe->slug ?>" class="px-7 py-3 bg-amber-400 inline-block transition-all hover:bg-amber-300 hover:text-neutral-600">See
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
        @include('inc.aside')
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
    @include('inc.footer')
</body>

</html>