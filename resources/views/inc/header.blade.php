
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