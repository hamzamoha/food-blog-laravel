<article>
    <div class="flex pt-4 pb-8 items-start">
        <img class="w-1/3" src="{{ $recipe->image_url }}" alt="">
        <div class="pl-6 pr-3 w-2/3">
            <a href="/recipes/{{ $recipe->slug }}"
                class="block pb-1 text-2xl text-amber-600 font-medium transition-all hover:text-amber-500">
                {{ \Illuminate\Support\Str::title($recipe->title) }}</a>
            <p class="py-1 text-sm font-medium">{{ date('F d, Y', strtotime($recipe->created_at)) }}
            </p>
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
                    @foreach ($recipe->categories as $key => $category)
                        <a href="{{ route('recipes.index_category', ['category' => $category->slug]) }}"
                            class="inline-flex items-center hover:underline">{{ $category->label }}</a>{{ $key < count($recipe->categories) - 1 ? ',' : '' }}
                    @endforeach
                </span>
            </div>
            <p class="text-lg font-extralight py-1">{{ $recipe->description }}</p>
        </div>
    </div>
</article>
