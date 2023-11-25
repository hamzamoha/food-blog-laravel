<!DOCTYPE html>
<html lang="en">

<head>
    <title>Cuisine Compass | Taste the World | Food Blog</title>
    <meta property="og:title" content="Cuisine Compass | Taste the World | Food Blog" />
    <meta property="og:description" content="Cuisine Compass | Taste the World | Food Blog" />
    <meta property="og:image" content="" />
    @include('inc.common_head_tags')
    <script>
        async function save_request(table, id) {
            const response = await fetch("/api/save", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "Accept": "application/json",
                    "X-CSRF-Token": "{{ csrf_token() }}"
                },
                body: JSON.stringify({
                    "table": table,
                    "id": id,
                })
            })
            const data = await response.json();
            return data.saved ? (data.saved === 'saved' ? 1 : 0) : -1;

        }
        async function save(event, table, id) {
            const i = await event.currentTarget.querySelector("i")
            const className = i.className
            i.className = "fa-solid fa-spinner-third fa-spin fa-lg"
            const save = await save_request(table, id)
            if (save === 1) i.className = className.replace("fa-regular", "fa-solid")
            else if (save === 0) i.className = className.replace("fa-solid", "fa-regular")
            else i.className = className
        }
    </script>
</head>

<body>
    @include('inc.header')
    <section class="relative h-[600px] overflow-hidden">
        <img class="w-full h-full object-cover scale-[1.05] blur-[3px]" src="{{ $featured_recipe->image_url }}"
            alt="Blackforest Peanut Cake" title="Blackforest Peanut Cake">
        <div class="absolute top-0 left-0 w-full h-full bg-blue-500 bg-opacity-20"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 max-w-6xl w-full flex justify-left">
            <div class="mr-auto w-[500px] max-w-full p-8 bg-white">
                <div class="text-neutral-500 text-sm uppercase">
                    <span class="inline-flex items-center mr-1"><i
                            class="fa-solid mr-1 fa-hourglass-half"></i>{{ $featured_recipe->cooking_time }} mins</span>
                    <span class="inline-flex items-center">
                        <i class="fa-solid mr-1 fa-tag fa-flip-horizontal"></i>
                        @foreach ($featured_recipe->categories as $key => $category)
                            <span>{{ $category->label }}</span>
                            @if ($key < count($featured_recipe->categories) - 1)
                                <span>,&nbsp;</span>
                            @endif
                        @endforeach
                    </span>
                </div>
                <h3 class="text-5xl font-light py-3 leading-tight">{{ $featured_recipe->title }}</h3>
                <p class="text-sm text-neutral-600 py-2 leading-tight">{{ $featured_recipe->description }}</p>
                <div class="py-3 text-sm text-neutral-500 flex items-center">
                    <time datetime="2023-10-12 21:00">{{ $featured_recipe->created_at->diffForHumans() }}</time>
                    <div class="ml-auto">
                        <a href="/" class="p-1 mr-1"><i class="fa-solid fa-share-nodes fa-lg"></i></a>
                        @auth
                            <button class="w-5" type="button"
                                onclick="save(event, 'recipes', '{{ $featured_recipe->id }}')">
                                @if (\App\Http\Controllers\SaverController::is_saved('recipes', $featured_recipe->id))
                                    <i class="fa-solid fa-bookmark fa-lg"></i>
                                @else
                                    <i class="fa-regular fa-bookmark fa-lg"></i>
                                @endif
                            </button>
                        @endauth
                    </div>
                </div>
                <div class="text-center py-1">
                    <a href="{{ route('recipes.show', ['slug' => $featured_recipe->slug]) }}"
                        class="px-7 py-3 bg-amber-400 inline-block transition-all hover:bg-amber-300 hover:text-neutral-600">See
                        the Recipe <i class="fa-solid fa-angles-right fa-xs"></i></a>
                </div>
            </div>
        </div>
    </section>
    <section class="max-w-6xl mx-auto py-10">
        <div class="grid px-6 md:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-8 lg:gap-12">
            @foreach ($articles as $article)
                <article class="">
                    <img src="{{ $article->image_url }}" alt="" class="block w-full h-64 mb-3 object-cover">
                    <div class="text-neutral-500 text-sm uppercase">
                        @foreach ($article->categories as $category)
                            <a href="/category/{{ $category->slug }}" class="inline-flex items-center"><i
                                    class="fa-solid mr-1 fa-tag fa-flip-horizontal"></i> {{ $category->label }}</a>
                        @endforeach
                    </div>
                    <h3 class="text-2xl font-light py-2 leading-tight"><?= $article->title ?></h3>
                    <p class="text-sm text-neutral-600 py-1 leading-tight line-clamp-2">snippet</p>
                    <div class="py-3 text-sm text-neutral-500 flex items-center">
                        <time datetime="2023-10-12 21:00">{{ $article->created_at->diffForHumans() }}</time>
                        <div class="ml-auto">
                            <a href="/" class="p-1 mr-1"><i class="fa-solid fa-share-nodes fa-lg"></i></a>
                            @auth
                                <button type="button" onclick="save(event, 'articles', '{{ $article->id }}')"
                                    class="inline p-1 w-7">
                                    @if (\App\Http\Controllers\SaverController::is_saved('articles', $article->id))
                                        <i class="fa-solid fa-bookmark fa-lg"></i>
                                    @else
                                        <i class="fa-regular fa-bookmark fa-lg"></i>
                                    @endif
                                </button>
                            @endauth
                        </div>
                    </div>
                    <div class="text-center py-1">
                        <a href="{{ route('articles.show', ['slug' => $article->slug]) }}"
                            class="px-7 py-3 bg-cyan-400 inline-block transition-all hover:bg-cyan-300 hover:text-neutral-600">Read
                            the Article<i class="fa-solid fa-angles-right fa-xs"></i></a>
                    </div>
                </article>
            @endforeach
        </div>
    </section>
    <section class="relative h-[700px]">
        <img src="/images/white-ceramic-bowl-with-food.jpg" alt="two sliced breads with avocado on top"
            class="w-full h-full object-cover">
        <div
            class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-full flex items-center justify-start max-w-6xl mx-auto">
            <div class="w-[500px] max-w-full bg-white bg-opacity-60 p-5">
                <h3 class="font-semibold text-5xl leading-tight text-neutral-800">The newest vegan recipes books</h3>
                <p class="py-5 text-lg text-neutral-600">Check out my newest vegan recipes books</p>
                <div class="grid grid-cols-3 gap-5 py-5">
                    <div
                        class="flex justify-center items-center h-60 text-2xl bg-yellow-100 font-extralight border-yellow-200 border-4">
                        Book 1
                    </div>
                    <div
                        class="flex justify-center items-center h-60 text-2xl bg-yellow-100 font-extralight border-yellow-200 border-4">
                        Book 2
                    </div>
                    <div
                        class="flex justify-center items-center h-60 text-2xl bg-yellow-100 font-extralight border-yellow-200 border-4">
                        Book 3
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="grid md:grid-cols-3 gap-5 py-10 max-w-6xl mx-auto">
        <main class="pl-1 col-span-2">
            <div
                class="flex items-baseline relative after:content-[''] after:block after:flex-1 after:h-1 after:bg-neutral-800 mb-3">
                <span class="block font-semibold mr-3 text-lg">Recent Recipes</span>
            </div>
            @foreach ($recipes as $recipe)
                <article class="flex flex-wrap my-5">
                    <div class="w-full sm:w-2/5">
                        <div class="h-0 pt-[50%] sm:pt-[70%] relative">
                            <img src="{{ $recipe->image_url }}" alt="Pancakes"
                                class="block absolute h-full w-full top-0 left-0 object-cover">
                        </div>
                    </div>
                    <div class="w-full sm:w-3/5 px-5 flex-0">
                        <div class="text-neutral-500 text-xs uppercase py-2">
                            <span class="inline-flex items-center mr-1"><i class="fa-solid mr-1 fa-hourglass-half"></i>
                                {{ $recipe->cooking_time }} mins
                            </span>
                            <span>
                                <i class="fa-solid mr-1 fa-tag fa-flip-horizontal"></i>
                                @foreach ($recipe->categories as $key => $category)
                                    <a href="/category/{{ $category->slug }}" class="inline-flex items-center">
                                        {{ $category->label }}
                                    </a>
                                    @if ($key < count($recipe->categories) - 1)
                                        <span>,&nbsp;</span>
                                    @endif
                                @endforeach
                            </span>
                        </div>
                        <a href="{{ route('recipes.show', ['slug' => $recipe->slug]) }}"
                            class="block text-xl font-semibold py-2">
                            {{ $recipe->title }}
                        </a>
                        <p class="text-sm text-neutral-600 py-1">
                            {{ $recipe->description }}
                        </p>
                        @auth
                            <div>
                                <button type="button" onclick="save(event, 'recipes', '{{ $recipe->id }}')">
                                    @if (\App\Http\Controllers\SaverController::is_saved('recipes', $recipe->id))
                                        <span class="w-5 inline-block"><i class="fa-solid fa-bookmark"></i></span> Saved
                                    @else
                                        <span class="w-5 inline-block"><i class="fa-regular fa-bookmark"></i></span> Save
                                    @endif
                                </button>
                            </div>
                        @endauth
                    </div>
                </article>
            @endforeach
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
                        <iframe class="w-full h-full" src="https://player.vimeo.com/video/471904636" frameborder="0"
                            allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
            <div class="w-1/2">
                <div class="h-0 pt-[56.25%] relative">
                    <div class="absolute top-0 left-0 w-full h-full p-2">
                        <iframe class="w-full h-full" src="https://player.vimeo.com/video/467264355" frameborder="0"
                            allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="p-10">
        <div class="max-w-6xl mx-auto">
            <h3 class="flex items-center py-3 mb-3 text-xl font-medium text-center">
                <span class="flex-1 h-1 bg-slate-200"></span>
                <span class="px-3">The most popular recipes</span>
                <span class="flex-1 h-1 bg-slate-200"></span>
            </h3>
            <div class="flex flex-wrap justify-center">
                @foreach ($popular_recipes as $recipe)
                    <div class="w-1/2 md:w-1/4 lg:w-1/6 p-2.5">
                        <div>
                            <img src="{{ $recipe->image_url }}" alt="{{ $recipe->title }}"
                                title="{{ $recipe->title }}" class="block h-32 object-cover w-full border">
                            <a href="{{ route('recipes.show', ['slug' => $recipe->slug]) }}"
                                class="block py-2 text-lg font-medium text-center transition-all hover:text-gray-500">{{ $recipe->title }}</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @include('inc.footer')
</body>

</html>
