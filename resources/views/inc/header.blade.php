<header class="max-w-6xl mx-auto">
    <div class="flex flex-wrap items-center justify-between py-10 w-full border-b">
        <div class="mb-5 lg:mb-0 w-full lg:w-auto lg:mr-1">
            <a href="/" class="block"><img src="/images/logo.svg" alt="Logo"
                    class="block mx-auto lg:pl-1 block h-16"></a>
        </div>
        <div id="search_form" class="w-full mb-4 md:my-0 md:w-auto md:mr-auto md:ml-1 lg:mr-0 lg:ml-auto">
            <form class="border flex" action="{{ route('search') }}">
                <select name="category" id="category"
                    class="px-3 py-2 lg:py-3 lg:px-2 text-xs font-semibold outline-none uppercase border-white border-2 bg-neutral-100 transition-all hover:bg-neutral-200 cursor-pointer">
                    @php
                        $categories = \App\Models\Category::withCount('recipes')
                            ->orderBy('recipes_count', 'desc')
                            ->take(6)->get();
                        $cat = request("category", "");
                        $q = request("q", "");
                    @endphp
                    <option value="" @selected($cat == "")>All Categories</option>
                    @foreach ($categories as $category)
                        <option class="text-[2px]" disabled></option>
                        <option value="{{ $category->slug }}" @selected($cat == $category->slug)>{{ $category->label }}</option>
                    @endforeach
                </select>
                <input placeholder="Search recipes..." type="text" id="q" name="q" value="{{$q}}"
                    class="flex-1 px-1 py-3 border-none bg-none focus:outline-none w-72 text-sm">
                <button type="submit" class="w-12 h-12 bg-yellow-300 transition-all hover:bg-amber-200">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </form>
        </div>
        <div class="w-full md:w-auto">
            <ul class="flex items-center pl-3 justify-center">
                @auth
                    <li class="border-r">
                        <a href="{{ route('auth.profile') }}"
                            class="py-2 px-3 transition-all hover:text-neutral-500">{{ auth()->user()->firstname }}</a>
                    </li>
                    <li>
                        <form action="{{ route('auth.logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="py-2 px-3 transition-all hover:text-neutral-500">
                                Logout
                            </button>
                        </form>
                    </li>
                @endauth
                @guest
                    <li class="border-r">
                        <a href="{{ route('auth.login') }}"
                            class="py-2 px-3 transition-all hover:text-neutral-500">Login</a>
                    </li>
                    <li>
                        <a href="{{ route('auth.register') }}"
                            class="py-2 px-3 transition-all hover:text-neutral-500">Register</a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
    <nav class="flex items-center">
        <ul class="flex items-center">
            <li class="mr-3">
                <a href="/"
                    class="block text-sm font-bold text-neutral-600 px-3 py-5 transition-all hover:text-white hover:bg-amber-300 uppercase">
                    Home
                </a>
            </li>
            <li class="mr-3">
                <a href="{{ route('categories') }}"
                    class="block text-sm font-bold text-neutral-600 px-3 py-5 transition-all hover:text-white hover:bg-amber-300 uppercase">
                    Categories
                </a>
            </li>
            <li class="mr-3">
                <a href="{{ route('recipes.index') }}"
                    class="block text-sm font-bold text-neutral-600 px-3 py-5 transition-all hover:text-white hover:bg-amber-300 uppercase">
                    Recipes
                </a>
            </li>
            <li class="mr-3">
                <a href="{{ route('articles.index') }}"
                    class="block text-sm font-bold text-neutral-600 px-3 py-5 transition-all hover:text-white hover:bg-amber-300 uppercase">
                    Articles
                </a>
            </li>
            <li class="mr-3">
                <a href="/"
                    class="block text-sm font-bold text-neutral-600 px-3 py-5 transition-all hover:text-white hover:bg-amber-300 uppercase">
                    About Us
                </a>
            </li>
            <li>
                <a href="/"
                    class="block text-sm font-bold text-neutral-600 px-3 py-5 transition-all hover:text-white hover:bg-amber-300 uppercase">
                    Contact
                </a>
            </li>
        </ul>
        <ul class="flex items-center ml-auto">
            <li><a href="/" class="p-1 transition-all hover:text-amber-300 mr-1 block"><i
                        class="fa-sm fa-brands fa-instagram"></i></a></li>
            <li><a href="/" class="p-1 transition-all hover:text-amber-300 mr-1 block"><i
                        class="fa-sm fa-brands fa-facebook-f"></i></a></li>
            <li><a href="/" class="p-1 transition-all hover:text-amber-300 block"><i
                        class="fa-sm fa-brands fa-x-twitter"></i></a></li>
            <li><a href="/" class="p-1 transition-all hover:text-amber-300 block"><i
                        class="fa-sm fa-brands fa-pinterest"></i></a></li>
            <li><a href="/" class="p-1 transition-all hover:text-amber-300 block"><i
                        class="fa-sm fa-brands fa-tiktok"></i></a></li>
            <li><a href="/" class="p-1 transition-all hover:text-amber-300 block"><i
                        class="fa-sm fa-brands fa-youtube"></i></a></li>
        </ul>
    </nav>
</header>
