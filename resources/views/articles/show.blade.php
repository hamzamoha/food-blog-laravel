a<!DOCTYPE html>
<html lang="en">

<head>
    <title>Show Article</title>
    <meta property="og:title" content="{{ $article->title }}" />
    <meta property="og:description" content="{{ $article->description }}" />
    <meta property="og:image" content="{{ $article->image_url }}" />
    @include('inc.common_head_tags')
</head>

<body>
    @include('inc.header')
    <div class="max-w-6xl mt-10 mx-auto flex flex-wrap">
        <div class="w-2/3 pr-5">
            <main class="bg-white pb-10">
                <div class="text-center">
                    <span>
                        @foreach ($article->categories as $key => $category)
                            <a class="font-bold text-sm text-blue-400 uppercase"
                                href="#">{{ $category->label }}</a>
                            @if ($key < count($article->categories) - 1)
                                <span>&nbsp;|&nbsp;</span>
                            @endif
                        @endforeach
                    </span>
                </div>
                <h1 class="text-center py-2 font-extralight text-4xl">
                    {{ \Illuminate\Support\Str::title($article->title) }}</h1>
                <p class="text-center py-2 text-neutral-500 font-light">Published on
                    {{ date('F d, Y', strtotime($article->created_at)) }} &nbsp;&bull;&nbsp;
                    Updated on {{ date('F d, Y', strtotime($article->created_at)) }}</p>
                <div class="ck-content text-lg font-light py-5">
                    <h2>Introduction</h2>
                    <p>Diet trends come and go, promising quick fixes and miraculous results, but few can boast the
                        simplicity and effectiveness of the potato diet. Potatoes, often considered a dietary villain
                        due to their association with high-carb, high-calorie meals, have been unfairly demonized. In
                        reality, when approached with mindfulness and moderation, potatoes can be a valuable and
                        nutritious part of a balanced diet.</p>
                    <img src="https://www.stylecraze.com/wp-content/uploads/2023/11/Potato-diet.jpg.webp"
                        class="w-[700px] max-w-full mx-auto my-5 rounded-sm block p-1 border shadow"
                        alt="One Skillet Mexican Beef and Rice">
                    <p>The potato diet is not a fad; it's a sustainable and science-backed approach to weight loss that
                        has gained popularity over the years. In this article, we'll explore what the potato diet is,
                        its benefits, potential drawbacks, and how to embark on this journey toward a healthier you.</p>
                    <h2>What is the Potato Diet?</h2>
                    <p>The potato diet is a dietary regimen that involves primarily consuming potatoes for an extended
                        period. While it may sound restrictive, the idea behind it is to simplify your food choices and
                        reduce calorie intake. It is not about living solely on French fries or loaded baked potatoes;
                        rather, it emphasizes eating plain, unprocessed, and boiled, baked, or steamed potatoes along
                        with non-starchy vegetables for a designated period, typically ranging from a few days to a few
                        weeks.</p>
                    <p>The potato diet's simplicity is its key feature, making it easy to follow and manage. It
                        eliminates the complexities of calorie counting, portion control, and meal planning. By sticking
                        to potatoes and vegetables, individuals aim to achieve a calorie deficit, which is essential for
                        weight loss.</p>
                    <h2>Benefits of the Potato Diet</h2>
                    <ol>
                        <li>Weight Loss: The potato diet can lead to effective weight loss due to the calorie
                            restriction involved. Potatoes are relatively low in calories and fat, making it challenging
                            to overconsume them.</li>
                        <li>Nutrient-Rich: Contrary to the misconception that potatoes are nutritionally empty, they are
                            rich in essential vitamins, minerals, and fiber. They provide a good amount of vitamin C,
                            potassium, and dietary fiber, which are important for overall health.</li>
                        <li>Satiety: Potatoes are known for their satiating effect. The high fiber content keeps you
                            feeling full, reducing the urge to snack on unhealthy foods.</li>
                        <li>Improved Eating Habits: By sticking to a simple diet of potatoes and vegetables, the potato
                            diet can help reset your eating habits and reduce cravings for processed and unhealthy
                            foods.</li>
                        <li>Sustainability: Unlike many restrictive diets, the potato diet is a sustainable choice. It
                            encourages the consumption of whole, unprocessed foods and can be adapted for long-term use
                            as part of a balanced diet.</li>
                    </ol>
                    <h2>Potential Drawbacks</h2>
                    <ol>
                        <li>Nutrient Gaps: While potatoes are nutritious, they may not provide all the essential
                            nutrients your body needs. To address this, it's important to include a variety of
                            non-starchy vegetables and possibly lean protein sources while on the potato diet.</li>
                        <li>Monotony: Eating only potatoes for an extended period may become monotonous and challenging
                            for some people. It's crucial to maintain variety in your meals to ensure long-term
                            compliance.</li>
                        <li>Lack of Long-Term Data: The potato diet's long-term effects on health and weight maintenance
                            are not well-researched. It is essential to consult a healthcare professional before
                            committing to such a diet.</li>
                    </ol>
                    <h2>How to Start the Potato Diet</h2>
                    <p>Before beginning the potato diet, consult with a healthcare professional, especially if you have
                        any underlying health conditions or dietary restrictions. Here are some general guidelines to
                        get started:</p>
                    <ol>
                        <li>Choose your potatoes wisely: Opt for a variety of potatoes like russet, red, or sweet
                            potatoes. Avoid processed potato products like chips or fries.</li>
                        <li>Plan balanced meals: Pair potatoes with non-starchy vegetables like broccoli, spinach, or
                            asparagus. This combination ensures a balanced nutrient intake.</li>
                        <li>Stay hydrated: Drink plenty of water to stay hydrated, and avoid sugary beverages or
                            excessive caffeine.</li>
                        <li>Mind portion sizes: While potatoes are nutritious, portion control remains important to
                            avoid overeating. Listen to your body's hunger cues.</li>
                        <li>Monitor your progress: Keep track of your weight loss and how you feel on the diet. Make
                            adjustments as necessary.</li>
                    </ol>
                    <h2>Conclusion</h2>
                    <p>The potato diet may not be a one-size-fits-all solution, but it offers a simple and sustainable
                        approach to weight loss and improved eating habits. When followed mindfully, it can serve as a
                        stepping stone to a healthier lifestyle. Always consult with a healthcare professional before
                        starting any diet, and remember that the key to successful weight management lies in balanced
                        and varied eating habits in the long term.</p>
                </div>
                <div class="py-3">
                    <span class="font-semibold">Tags:</span>
                    {{ \Illuminate\Support\Str::title(str_replace(',', ', ', $article->tags)) }}
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
                            href="https://twitter.com/intent/tweet?text={{ \Illuminate\Support\Str::title($article->title) }}&via=Allrecipes&url={{ $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] }}">
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
                                data-pin-do="buttonPin" media="{{ $article->image_url }}"
                                description="{{ $article->title }}"> </a>
                        </div>
                        <div class="m-1">
                            <div class="snapchat-creative-kit-share" data-size="large"></div>
                        </div>
                        <div class="m-1">
                            <script type="IN/Share" data-url="{{ $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] }}"></script>
                        </div>
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
                        <span class="px-3 text-xl font-medium pb-1">Check out other articles</span>
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
    @include('inc.footer')
</body>

</html>
