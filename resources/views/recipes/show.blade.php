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
                                href="#">{{ $category->label }}</a>
                            @if ($key < count($recipe->categories) - 1)
                                <span>&nbsp;|&nbsp;</span>
                            @endif
                        @endforeach
                    </span>
                </div>
                <h1 class="text-center py-2 font-extralight text-4xl">
                    {{ \Illuminate\Support\Str::title($recipe->title) }}</h1>
                <p class="text-center py-2 text-neutral-500 font-light">Published on
                    {{ date('F d, Y', strtotime($recipe->created_at)) }} &nbsp;&bull;&nbsp;
                    Updated on {{ date('F d, Y', strtotime($recipe->updated_at)) }}</p>
                <p class="font-light text-center">
                    <span class="whitespace-nowrap">
                        Views:&nbsp;&nbsp;{{ \App\Http\Controllers\ViewerController::viewAndGet($recipe->id, "recipes") }}&nbsp;</i><i class="fa-regular fa-eye"></i>
                    </span>
                    <span class="whitespace-nowrap inline-block"><span
                        class="text-2xl">&nbsp;&bull;&nbsp;</span></span>
                    <span class="whitespace-nowrap">
                        Rating:&nbsp;&nbsp;<i class="fa-solid fa-star"></i><i
                        class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                        class="fa-solid fa-star-half-stroke"></i><i class="fa-regular fa-star"></i>
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
                    <p style="margin-left:0px;">
                        <strong>Ingredients:</strong>
                    </p>
                    <ul>
                        <li>
                            8 ounces (about 225 grams) of spaghetti
                        </li>
                        <li>
                            2 large eggs
                        </li>
                        <li>
                            1 cup (about 100 grams) of grated Pecorino Romano cheese
                        </li>
                        <li>
                            4 ounces (about 115 grams) of pancetta or guanciale, diced
                        </li>
                        <li>
                            2 cloves of garlic, minced
                        </li>
                        <li>
                            Salt and black pepper, to taste
                        </li>
                        <li>
                            Fresh parsley, chopped, for garnish (optional)
                        </li>
                    </ul>
                    <p style="margin-left:0px;">
                        <strong>Instructions:</strong>
                    </p>
                    <p style="margin-left:0px;">
                        <strong>Prepare the Pasta:</strong>
                    </p>
                    <ul>
                        <li>
                            Bring a large pot of salted water to a boil. Add the spaghetti and cook according to the
                            package instructions until al dente. Drain the pasta, but reserve about 1/2 cup of the
                            cooking water.
                        </li>
                    </ul>
                    <p style="margin-left:0px;">
                        <strong>Cook the Pancetta (or Guanciale):</strong>
                    </p>
                    <ul>
                        <li>
                            In a large skillet, cook the diced pancetta (or guanciale) over medium heat until it becomes
                            crispy and lightly browned, usually about 5-7 minutes. Remove it from the pan with a slotted
                            spoon and set it aside.
                        </li>
                    </ul>
                    <p style="margin-left:0px;">
                        <strong>Prepare the Sauce:</strong>
                    </p>
                    <ul>
                        <li>
                            In a bowl, whisk together the eggs, grated Pecorino Romano cheese, minced garlic, and a
                            generous amount of freshly ground black pepper. Mix until well combined.
                        </li>
                    </ul>
                    <p style="margin-left:0px;">
                        <strong>Combine the Pasta and Sauce:</strong>
                    </p>
                    <ul>
                        <li>
                            While the cooked pasta is still hot, quickly toss it with the egg and cheese mixture. The
                            heat from the pasta will gently cook the eggs and create a creamy sauce. If the mixture is
                            too thick, add a little of the reserved pasta cooking water to reach the desired
                            consistency.
                        </li>
                    </ul>
                    <p style="margin-left:0px;">
                        <strong>Add Pancetta (or Guanciale):</strong>
                    </p>
                    <ul>
                        <li>
                            Mix in the crispy pancetta (or guanciale) that you had set aside.
                        </li>
                    </ul>
                    <p style="margin-left:0px;">
                        <strong>Serve and Garnish:</strong>
                    </p>
                    <ul>
                        <li>
                            Plate the spaghetti carbonara, garnish with chopped fresh parsley (if desired), and sprinkle
                            with extra Pecorino Romano cheese and black pepper.
                        </li>
                    </ul>
                    <p style="margin-left:0px;">
                        Spaghetti carbonara is best enjoyed immediately while it's still warm. It's a delicious, creamy,
                        and indulgent pasta dish that's sure to satisfy your cravings for Italian comfort food. Enjoy!
                    </p>
                    <p style="margin-left:0px;">
                        Feel free to adjust the ingredients and measurements to suit your preferences, and remember to
                        savor this classic pasta dish with a nice glass of wine if you like.
                    </p>
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
                        <li class="list-item my-2 pt-1 border-b border-yellow-800">800g-1kg prepared chicken wings </li>
                        <li class="list-item my-2 pt-1 border-b border-yellow-800">1-1.5 litres corn or rapeseed oil,
                            for deep-frying </li>
                        <li class="list-item my-2 pt-1 border-b border-yellow-800">celery crudités, to serve (optional)
                        </li>
                        <li class="list-item my-2 pt-1 border-b border-yellow-800">½ tsp chilli powder </li>
                        <li class="list-item my-2 pt-1 border-b border-yellow-800">large pinch of cayenne pepper </li>
                        <li class="list-item my-2 pt-1 border-b border-yellow-800">3 tbsp cornflour </li>
                        <li class="list-item my-2 pt-1 border-b border-yellow-800">25g butter, melted </li>
                        <li class="list-item my-2 pt-1 border-b border-yellow-800">4 tbsp American-style hot sauce,
                            plus
                            1 tsp </li>
                    </ol>
                </section>
                <div class="py-3">
                    <span class="font-semibold">Tags:</span>
                    {{ \Illuminate\Support\Str::title(str_replace(',', ', ', $recipe->tags)) }}
                </div>
                <section class="py-6">
                    <h4 class="py-1 text-2xl"><i class="fa-solid fa-share-nodes mr-2.5"></i>Tell your friends about it!</h4>
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
                            <input type="radio" name="rating" id="rate5">
                            <label for="rate5">
                                <i class="fa-solid fa-star text-yellow-400"></i>
                            </label>
                            <input type="radio" name="rating" id="rate4">
                            <label for="rate4">
                                <i class="fa-solid fa-star text-yellow-400"></i>
                            </label>
                            <input type="radio" name="rating" id="rate3">
                            <label for="rate3">
                                <i class="fa-solid fa-star text-yellow-400"></i>
                            </label>
                            <input type="radio" name="rating" id="rate2">
                            <label for="rate2">
                                <i class="fa-solid fa-star text-yellow-400"></i>
                            </label>
                            <input type="radio" name="rating" id="rate1">
                            <label for="rate1">
                                <i class="fa-solid fa-star text-yellow-400"></i>
                            </label>
                            <div class="rating-value"></div>
                        </fieldset>
                    </div>
                </section>
                <section class="my-5">
                    <h4 class="py-2 text-2xl">Leave a Comment</h4>
                    <div>
                        <textarea required name="comment" id="comment"
                            class="w-full block my-2 bg-neutral-100 p-2 text-sm font-medium border outline-none"
                            placeholder="Type your comment here..." rows="6"></textarea>
                        <input type="text" required
                            class="block w-full my-2 p-2 bg-neutral-100 border outline-none text-sm"
                            placeholder="Enter your name" name="name">
                        <input type="text" required
                            class="block w-full my-2 p-2 bg-neutral-100 border outline-none text-sm"
                            placeholder="Your Email here" name="name">
                    </div>
                    <div class="flex py-2">
                        <input type="button"
                            class="py-2.5 px-5 rounded bg-teal-500 ml-auto hover:bg-teal-600 active:bg-teal-500 text-sm font-bold text-white cursor-pointer"
                            value="Submit">
                    </div>
                </section>
                <section class="py-2">
                    <div class="flex justify-center items-center">
                        <span class="h-1 bg-neutral-600 flex-1"></span>
                        <span class="px-3 text-xl font-medium pb-1">Recipes you may like</span>
                        <span class="h-1 bg-neutral-600 flex-1"></span>
                    </div>
                    <div class="grid md:grid-cols-3 gap-5 py-2">
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
