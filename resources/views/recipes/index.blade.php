<!DOCTYPE html>
<html lang="en">

<head>
    <title>Recipes</title>
    <meta property="og:title" content="Cuisine Compass | Taste the World | Food Blog" />
    <meta property="og:description" content="Cuisine Compass | Taste the World | Food Blog" />
    <meta property="og:image" content="" />
    @include('inc.common_head_tags')
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
    <section class="max-w-6xl mt-10 mx-auto">
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
    </section>
    <div class="max-w-6xl mt-10 mx-auto flex flex-wrap">
        <div class="w-2/3 pr-5">
            <main class="bg-white pb-10">
                @foreach ($recipes as $recipe)
                    <article>
                        <div class="flex pt-4 pb-8 items-start">
                            <img class="w-1/3" src="{{ $recipe->image_url }}" alt="">
                            <div class="pl-6 pr-3 w-2/3">
                                <a href="/recipes/{{ $recipe->slug }}" class="block pb-1 text-2xl text-amber-600 font-medium transition-all hover:text-amber-500">
                                    {{ \Illuminate\Support\Str::title($recipe->title) }}</a>
                                <p class="py-1 text-sm font-medium">{{ date('F d, Y', strtotime($recipe->created_at)) }}</p>
                                <div class="py-2 text-neutral-500 text-sm uppercase">
                                    <span class="inline-flex items-center px-1">
                                        <i class="fa-solid mr-1 fa-hourglass-half"></i>{{ $recipe->cooking_time }}
                                    </span>
                                    <span class="px-1">
                                        <i class="fa-solid fa-sliders mr-1"></i>
                                        {{ $recipe->difficulty_level }}
                                    </span>
                                    <span class="px-1">
                                        <i class="fa-solid fa-users mr-1"></i>{{ $recipe->serving_size }}
                                    </span>
                                    <span class="px-1">
                                        <i class="fa-solid mr-1 fa-tag fa-flip-horizontal"></i>
                                        @foreach ($recipe->categories as $key=>$category)
                                            <a href="/category/fish"
                                                class="inline-flex items-center hover:underline">{{ $category->label }}</a>{{ ($key<(count($recipe->categories)-1))? "," : "" }}
                                        @endforeach
                                    </span>
                                </div>
                                <p class="text-lg font-extralight py-1">{{ $recipe->description }}</p>
                            </div>
                        </div>
                    </article>
                @endforeach
            </main>
        </div>
        <div class="w-1/3 pl-5">
            @include('inc.aside')
        </div>
    </div>
    @include('inc.footer')
</body>

</html>
