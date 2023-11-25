<article>
    <div class="flex pt-4 pb-8 items-start">
        <img class="w-1/3" src="{{ $article->image_url }}"
            alt="{{ \Illuminate\Support\Str::title($article->title) }}">
        <div class="pl-6 pr-3 w-2/3">
            <a href="/articles/{{ $article->slug }}"
                class="block pb-2 text-2xl text-amber-600 font-medium transition-all hover:text-amber-500">
                {{ \Illuminate\Support\Str::title($article->title) }}</a>
            <p class="py-2 text-sm font-medium">
                {{ date('F d, Y', strtotime($article->created_at)) }}</p>
            <div class="py-2 text-neutral-500 text-sm uppercase">
                <span class="px-1">
                    <i class="fa-solid mr-1 fa-tag fa-flip-horizontal"></i>
                    @foreach ($article->categories as $key => $category)
                        <a href="{{ route('articles.index_category', ['category' => $category->slug]) }}"
                            class="inline-flex items-center hover:underline">{{ $category->label }}</a>{{ $key < count($article->categories) - 1 ? ',' : '' }}
                    @endforeach
                </span>
            </div>
            <p class="text-lg font-light py-1">hello everyone this is one of the most amazing things
                to do in life just dont over do it while you are still have the potentionl to do
                so...</p>
        </div>
    </div>
</article>