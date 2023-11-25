<!DOCTYPE html>
<html lang="en">

<head>
    <title>Show Recipe</title>
    <meta property="og:title" content="{{ $recipe->title }}" />
    <meta property="og:description" content="{{ $recipe->description }}" />
    <meta property="og:image" content="{{ $recipe->image_url }}" />
    @include('inc.common_head_tags')
    <style>
        .rating-container {
            display: inline-flex;
            margin-left: auto;
            width: fit-content;
            justify-content: center;
            align-items: center;
            flex-direction: row-reverse;
            padding: 0 .6em 0 2em;
            gap: 10px;
            border-top-right-radius: 75px;
            border-bottom-right-radius: 75px;
            position: relative;
            background: #2b2b2b;
        }

        .rating-container .rating-value {
            position: absolute;
            top: -2px;
            left: -22px;
            border-radius: 50%;
            height: 44px;
            width: 44px;
            background: #ffbb00;
        }

        .rating-container .rating-value:before {
            position: absolute;
            inset: 0;
            margin: auto;
            text-align: center;
            line-height: 44px;
            font-size: 1.2em;
            color: #2b2b2b;
            content: "0";
            transform-origin: center;
            transition: all 0.25s ease 0s;
        }

        .rating-container input {
            display: none;
        }

        .rating-container label {
            height: 40px;
            width: 40px;
            transform-origin: center;
            cursor: pointer;
        }

        .rating-container label i {
            width: 100%;
            height: 100%;
            line-height: 40px;
            text-align: center;
            transition: transform 0.4s ease-in-out;
            opacity: 0.5;
        }

        .rating-container input:checked~label i,
        .rating-container input:checked~label:hover i,
        .rating-container input:checked~label:hover~label i,
        .rating-container label:hover~input:checked~label i,
        .rating-container label:hover i,
        .rating-container label:hover~label i {
            opacity: 1;
            transform: scale(1.25) rotate(10deg);
        }

        .rating-container #rate1:checked~.rating-value:before,
        .rating-container #rate1+label:hover~.rating-value:before {
            content: "1" !important;
            font-size: 1.4em !important;
        }

        .rating-container #rate2:checked~.rating-value:before,
        .rating-container #rate2+label:hover~.rating-value:before {
            content: "2" !important;
            font-size: 1.6em !important;
        }

        .rating-container #rate3:checked~.rating-value:before,
        .rating-container #rate3+label:hover~.rating-value:before {
            content: "3" !important;
            font-size: 1.8em !important;
        }

        .rating-container #rate4:checked~.rating-value:before,
        .rating-container #rate4+label:hover~.rating-value:before {
            content: "4" !important;
            font-size: 2em !important;
        }

        .rating-container #rate5:checked~.rating-value:before,
        .rating-container #rate5+label:hover~.rating-value:before {
            content: "5" !important;
            font-size: 2.2em !important;
        }
    </style>
    <script>
        document.addEventListener("DOMContentLoaded", (event) => {
            document.querySelectorAll('.rating-container input[type="radio"][name="rating"]').forEach(radio => {
                radio.addEventListener("change", (event) => {
                    input = document.querySelector('.rating-container input[type="radio"]:checked')
                    if (input) {
                        fetch('/api/rating', {
                            headers: {
                                "Accept": "application/json",
                                "Content-Type": "application/json",
                                "X-CSRF-Token": '{{ csrf_token() }}'
                            },
                            method: "POST",
                            body: JSON.stringify({
                                rating: input.value,
                                recipe_id: {{ $recipe->id }},
                            })
                        })
                    }
                })
            });
        })
    </script>
</head>

<body>
    @include('inc.header')
    <div class="max-w-6xl mt-10 mx-auto flex flex-wrap">
        <div class="w-2/3 pr-5">
            <main class="bg-white pb-10">
                <div class="text-center">
                    <span>
                        @foreach ($recipe->categories as $key => $category)
                            <a class="font-bold text-sm text-blue-400 uppercase"
                                href="{{ route('recipes.index_category', ['category' => $category->slug]) }}">{{ $category->label }}</a>
                            @if ($key < count($recipe->categories) - 1)
                                <span>&nbsp;|&nbsp;</span>
                            @endif
                        @endforeach
                    </span>
                </div>
                <h1 class="text-center py-2 font-extralight text-4xl">{{ $recipe->title }}</h1>
                <p class="text-center py-2 text-neutral-500 font-light">Published on
                    {{ date('F d, Y', strtotime($recipe->created_at)) }} &nbsp;&bull;&nbsp;
                    Updated on {{ date('F d, Y', strtotime($recipe->updated_at)) }}</p>
                <p class="font-light text-center">
                    <span class="whitespace-nowrap">
                        Views:&nbsp;&nbsp;{{ $views }}&nbsp;</i><i class="fa-regular fa-eye"></i>
                    </span>
                    <span class="whitespace-nowrap inline-block"><span class="text-2xl">&nbsp;&bull;&nbsp;</span></span>
                    <span class="whitespace-nowrap">
                        Rating:&nbsp;{!! $rating === -1 ? 'Not Rated Yet' : number_format($rating, 1) . '&nbsp;<i class="fa-solid fa-star"></i>' !!}
                    </span>
                </p>
                <div class="py-1 text-center">
                    <span class="whitespace-nowrap inline-block py-1 font-medium"><i
                            class="fa-light fa-hourglass-half fa-sm mr-1"></i> Cooking Time: <span
                            class="font-light">{{ $recipe->cooking_time }}
                            mins</span></span>
                    <span class="whitespace-nowrap inline-block py-1"><span
                            class="text-2xl">&nbsp;&bull;&nbsp;</span></span>
                    <span class="whitespace-nowrap inline-block py-1 font-medium"><i
                            class="fa-light fa-gear-complex fa-sm mr-1"></i> Cooking Method: <span
                            class="font-light">{{ $recipe->cooking_method }}</span></span>
                    <span class="whitespace-nowrap inline-block py-1"><span
                            class="text-2xl">&nbsp;&bull;&nbsp;</span></span>
                    <span class="whitespace-nowrap inline-block py-1 font-medium"><i
                            class="fa-light fa-sliders fa-sm mr-1"></i> Difficulty Level: <span
                            class="font-light">{{ $recipe->difficulty_level }}</span></span>
                    <span class="whitespace-nowrap inline-block py-1"><span
                            class="text-2xl">&nbsp;&bull;&nbsp;</span></span>
                    <span class="whitespace-nowrap inline-block py-1 font-medium"><i
                            class="fa-light fa-users fa-sm mr-1"></i> Serving Size: <span
                            class="font-light">{{ $recipe->serving_size }}</span></span>
                </div>
                <p class="indent-10 text-lg font-light py-5">{{ $recipe->description }}</p>
                <img src="{{ $recipe->image_url }}"
                    class="w-[700px] max-w-full mx-auto my-5 rounded-sm block p-1 border shadow"
                    alt="{{ $recipe->title }}" title="{{ $recipe->title }}">
                <div class="ck-content text-lg font-light py-5">
                    {!! $recipe->content !!}
                </div>
                <section class="my-5 bg-green-400 p-3">
                    <h3 class="py-1 text-2xl font-semibold">Ingredients</h3>
                    <div class="flex flex-wrap py-4 items-center px-4  text-white">
                        @foreach ($recipe->ingredients as $ingredient)
                            <div class="flex items-center mr-2 mb-2">
                                <img src="{{ $ingredient->image_url }}" alt="{{ $ingredient->name }}"
                                    title="{{ $ingredient->name }}" class="w-10 h-10 rounded-full mr-2">
                                <span>{{ $ingredient->name }}</span>
                            </div>
                        @endforeach
                    </div>
                </section>
                <section class="p-3 my-5 bg-yellow-100">
                    <h3 class="py-1 text-2xl font-semibold">Instructions</h3>
                    <ol class="list-decimal px-8">
                        @foreach ($recipe->instructions as $instruction)
                            <li class="list-item my-2 pt-1 border-b border-yellow-800">{{$instruction->content}}</li>
                        @endforeach
                    </ol>
                </section>
                <div class="py-3">
                    <span class="font-semibold">Tags:</span>
                    @foreach ($recipe->tags as $tag)
                        <a class="px-1 bg-neutral-200 hover:bg-neutral-300 rounded"
                            href="{{ route('recipes.index_tag', ['tag' => $tag]) }}">{{ \Illuminate\Support\Str::title($tag) }}</a>
                    @endforeach
                </div>
                <section class="py-6">
                    <h4 class="py-1 text-2xl"><i class="fa-solid fa-share-nodes mr-2.5"></i>Tell your friends about it!
                    </h4>
                    <div class="flex flex-wrap py-2 items-center">
                        <div class="m-1">
                            <div class="fb-share-button"
                                data-href="https://www.allrecipes.com/article/cup-to-gram-conversions/"
                                data-layout="button_count" data-size="large">
                            </div>
                        </div>
                        <div class="m-1">
                            <div class="fb-save" data-uri="http://www.your-domain.com/your-page.html" data-size="large">
                            </div>
                        </div>
                        <div class="m-1">
                            <a class="twitter-share-button" data-size="large"
                                href="https://twitter.com/intent/tweet?text={{ \Illuminate\Support\Str::title($recipe->title) }}&via=Allrecipes&url={{ $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] }}">
                                Tweet</a>
                        </div>
                        {{--
                        <div class="m-1">
                            <a class="block py-0.5 px-2.5 text-white bg-green-500 hover:bg-green-600 rounded-full" target="_blank"
                                href="whatsapp://send?text=The text to share!" data-action="share/whatsapp/share"><i
                                    class="fa-brands fa-whatsapp"></i> Share</a>
                        </div>
                        --}}
                        <div class="m-1">
                            <a class="block py-0.5 px-2.5 text-white bg-green-500 hover:bg-green-600 rounded-full"
                                target="_blank" href="https://wa.me/?text=Awesome%20Blog!%5Cn%20blog.shahednasser.com"
                                data-action="share/whatsapp/share"><i class="fa-brands fa-whatsapp"></i> Share</a>
                        </div>
                        <div class="m-1">
                            <a href="https://www.pinterest.com/pin/create/button/" data-pin-tall="true"
                                data-pin-do="buttonPin" media="{{ $recipe->image_url }}"
                                description="{{ $recipe->title }}"> </a>
                        </div>
                        <div class="m-1">
                            <div class="snapchat-creative-kit-share" data-size="large"></div>
                        </div>
                        <div class="m-1">
                            <script type="IN/Share" data-url="{{ $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] }}"></script>
                        </div>
                    </div>
                </section>
                <section class="p-3 bg-neutral-100 my-5">
                    <div class="flex items-center flex-wrap bg-white p-3">
                        <span class="pr-7 text-2xl">Rate this recipe</span>
                        <fieldset class="rating-container">
                            <input type="radio" name="rating" id="rate5" value="5"
                                @auth
{{ \App\Http\Controllers\SaverController::getRatingByUser($recipe->id) == 5 ? 'checked' : '' }} @endauth>
                            <label for="rate5">
                                <i class="fa-solid fa-star text-yellow-400"></i>
                            </label>
                            <input type="radio" name="rating" id="rate4" value="4"
                                @auth
{{ \App\Http\Controllers\SaverController::getRatingByUser($recipe->id) == 4 ? 'checked' : '' }} @endauth>
                            <label for="rate4">
                                <i class="fa-solid fa-star text-yellow-400"></i>
                            </label>
                            <input type="radio" name="rating" id="rate3" value="3"
                                @auth
{{ \App\Http\Controllers\SaverController::getRatingByUser($recipe->id) == 3 ? 'checked' : '' }} @endauth>
                            <label for="rate3">
                                <i class="fa-solid fa-star text-yellow-400"></i>
                            </label>
                            <input type="radio" name="rating" id="rate2" value="2"
                                @auth
{{ \App\Http\Controllers\SaverController::getRatingByUser($recipe->id) == 2 ? 'checked' : '' }} @endauth>
                            <label for="rate2">
                                <i class="fa-solid fa-star text-yellow-400"></i>
                            </label>
                            <input type="radio" name="rating" id="rate1" value="1"
                                @auth
{{ \App\Http\Controllers\SaverController::getRatingByUser($recipe->id) == 1 ? 'checked' : '' }} @endauth>
                            <label for="rate1">
                                <i class="fa-solid fa-star text-yellow-400"></i>
                            </label>
                            <div class="rating-value"></div>
                        </fieldset>
                    </div>
                </section>
                <section class="py-2">
                    @if ($recipe->comments && is_countable($recipe->comments) && $recipe->comments->count() > 0)
                        <h2 class="text-2xl py-2">Comments</h2>
                        @foreach ($recipe->comments as $comment)
                            <div class="flex my-2">
                                <div class="w-16">
                                    @if ($comment->user->photo_url && Illuminate\Support\Facades\Storage::exists($comment->user->photo_url))
                                        <img src="{{ $comment->user->photo_url }}" alt=""
                                            class="w-16 h-16 p-2 rounded-full">
                                    @else
                                        <img src="/uploads/user.png" alt=""
                                            class="w-16 h-16 p-2 rounded-full">
                                    @endif
                                </div>
                                <div class="p-3 rounded border shadow flex-grow">
                                    <h4 class="font-semibold">
                                        {{ \Illuminate\Support\Str::title($comment->user->firstname . ' ' . $comment->user->lastname) }}
                                    </h4>
                                    <p class="text-sm">{{ $comment->updated_at->diffForHumans() }}</p>
                                    <p class="py-3 pl-2">
                                        {{ $comment->body }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <h2 class="text-2xl py-2">No Comments Yet </h2>
                    @endif
                </section>
                <section class="my-5">
                    <h4 class="py-2 text-2xl">Leave a Comment</h4>
                    @auth
                        <form method="POST" autocomplete="off"
                            action="{{ route('comments.store', ['type' => 'recipe', 'id' => $recipe->id]) }}">
                            @csrf
                            <div>
                                <span class="bg-neutral-200 rounded-t inline-block py-1 px-2">as: <span
                                        class="font-bold">{{ \Illuminate\Support\Str::title(auth()->user()->firstname . ' ' . auth()->user()->lastname) }}</span></span>
                            </div>
                            <textarea required name="body" id="body"
                                class="w-full block mb-2 bg-neutral-100 p-2 text-sm font-medium border outline-none"
                                placeholder="Type your comment here..." rows="6"></textarea>
                            <div class="flex py-2">
                                <input type="submit"
                                    class="py-2.5 px-5 rounded bg-teal-500 ml-auto hover:bg-teal-600 active:bg-teal-500 text-sm font-bold text-white cursor-pointer"
                                    value="Submit">
                            </div>
                        </form>
                    @endauth
                    @guest
                        <div class="text-lg py-2 text-center">
                            Login to comment
                        </div>
                    @endguest
                </section>
                <section class="py-2">
                    <div class="flex justify-center items-center">
                        <span class="h-1 bg-neutral-600 flex-1"></span>
                        <span class="px-3 text-xl font-medium pb-1">Recipes you may like</span>
                        <span class="h-1 bg-neutral-600 flex-1"></span>
                    </div>
                    <div class="grid md:grid-cols-3 gap-5 py-2">
                        @foreach ($recipe->relatedRecipes(3) as $relatedRecipe)
                            <article>
                                <a class="block transition-all duration-700 hover:scale-105"
                                    href="{{ route('recipes.show', ['slug' => $relatedRecipe->slug]) }}">
                                    <img src="{{ $relatedRecipe->image_url }}" alt="{{ $relatedRecipe->title }}"
                                        class="w-full h-64 object-cover block p-1 border">
                                    <h4 class="py-1 text-lg font-light text-center">{{ $relatedRecipe->title }}</h4>
                                </a>
                            </article>
                        @endforeach
                        <article>
                            <a class="block transition-all duration-700 hover:scale-105" href="">
                                <img src="https://images.immediate.co.uk/production/volatile/sites/30/2022/08/Cajun-chicken-one-pot-3f68774.jpg"
                                    alt="" class="w-full h-64 object-cover block p-1 border">
                                <h4 class="py-1 text-lg font-light text-center">Cajun chicken pasta</h4>
                            </a>
                        </article>
                        <article>
                            <a class="block transition-all duration-700 hover:scale-105" href="">
                                <img src="https://images.immediate.co.uk/production/volatile/sites/30/2023/08/Chicken-tinga-tacos-4d3272f.jpg"
                                    alt="" class="w-full h-64 object-cover block p-1 border">
                                <h4 class="py-1 text-lg font-light text-center">Chicken tinga tacos</h4>
                            </a>
                        </article>
                        <article>
                            <a class="block transition-all duration-700 hover:scale-105" href="">
                                <img src="https://images.immediate.co.uk/production/volatile/sites/30/2023/05/Next-level-buffalo-wings-56607c2.jpg  "
                                    alt="" class="w-full h-64 object-cover block p-1 border">
                                <h4 class="py-1 text-lg font-light text-center">Next level buffalo wings</h4>
                            </a>
                        </article>
                    </div>
                </section>
            </main>
        </div>
        <div class="w-1/3 pl-5">
            @include('inc.aside')
        </div>
    </div>
    <div id="fb-root"></div>
    @include('inc.footer')
</body>

</html>
