<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login | {{ env('APP_NAME', 'Cuisine Compass') }}</title>
    <meta property="og:title" content="{{ env('APP_NAME', 'Cuisine Compass') }} | Taste the World | Food Blog" />
    <meta property="og:description" content="{{ env('APP_NAME', 'Cuisine Compass') }} | Taste the World | Food Blog" />
    <meta property="og:image" content="" />
    @include('inc.common_head_tags')
    <script>
        document.addEventListener("DOMContentLoaded", ()=>{
            document.querySelectorAll("button[data-action]").forEach(button => {
                button.addEventListener("click", ()=>{
                    if (button.getAttribute('data-action') === "login") document.getElementById("blind").style.left = "50%"
                    else document.getElementById("blind").style.left = "0"
                });
            });
        });
    </script>
</head>

<body class="bg-gray-200">
    <div class="px-40 pt-24">
        <div class="grid relative md:grid-cols-2">
            <div class="p-16 bg-white">
                <img src="/images/logo.svg" alt="Logo" title="{{ env('APP_NAME', 'Cuisine Compass') }}"
                    class="w-64 max-w-full mx-auto block">
                <div class="text-7xl text-amber-200 py-5">
                    <span class="font-extralight">Hello,</span>&nbsp;<span class="font-bold">Welcome</span>
                </div>
                <form action="{{ route('auth.login') }}" method="POST" autocomplete="off">
                    @csrf
                    <div class="relative bg-gray-100 my-6">
                        <input
                            class="peer relative z-10 border-l-8 border-gray-100 focus:border-amber-200 outline-none block w-full pt-5 p-2 bg-transparent"
                            type="text" name="username" id="username">
                        <label
                            class="peer-focus:pt-1 peer-focus:pb-0 peer-focus:pl-2.5 peer-focus:text-xs absolute top-0 left-0 max-h-full w-full transition-all py-3.5 pl-4"
                            for="username">Username or Email *</label>
                    </div>
                    <div class="relative bg-gray-100 my-6">
                        <input
                            class="peer relative z-10 border-l-8 border-gray-100 focus:border-amber-200 outline-none block w-full pt-5 p-2 bg-transparent"
                            type="password" name="password" id="password">
                        <label
                            class="peer-focus:pt-1 peer-focus:pb-0 peer-focus:pl-2.5 peer-focus:text-xs absolute top-0 left-0 max-h-full w-full transition-all py-3.5 pl-4"
                            for="password">Password *</label>
                    </div>
                    <div class="grid grid-cols-2 my-2">
                        <div>
                            <input class="accent-amber-300 cursor-pointer" type="checkbox" name="remember"
                                id="remember">
                            <label class="pl-1 cursor-pointer" for="remember">Remember Me</label>
                        </div>
                        <div class="text-right">
                            <a href="?" class="italic text-gray-400 text-sm underline hover:no-underline">Forgot
                                Password?</a>
                        </div>
                    </div>
                    <div class="my-6">
                        <button type="submit"
                            class="py-3 px-8 bg-amber-300 border border-amber-400 hover:bg-amber-400 mr-4">
                            Login
                        </button>
                        <button data-action="register" type="button" class="py-3 px-8 bg-gray-200 border border-gray-300 hover:bg-gray-300">
                            Register
                        </button>
                    </div>
                </form>
            </div>
            <div class="p-16 bg-white">
                <img src="/images/logo.svg" alt="Logo" title="{{ env('APP_NAME', 'Cuisine Compass') }}"
                    class="w-64 max-w-full mx-auto block">
                <div class="text-7xl text-amber-200 py-5">
                    <span class="font-extralight">Hello,</span>&nbsp;<span class="font-bold">Welcome</span>
                </div>
                <form action="{{ route('auth.login') }}" method="POST" autocomplete="off">
                    @csrf
                    <div class="grid grid-cols-2 gap-6 my-6">
                        <div class="relative bg-gray-100">
                            <input
                                class="peer relative z-10 border-l-8 border-gray-100 focus:border-amber-200 outline-none block w-full pt-5 p-2 bg-transparent"
                                type="text" name="firstname" id="firstname">
                            <label
                                class="peer-focus:pt-1 peer-focus:pb-0 peer-focus:pl-2.5 peer-focus:text-xs absolute top-0 left-0 max-h-full w-full transition-all py-3.5 pl-4"
                                for="firstname">First Name *</label>
                        </div>
                        <div class="relative bg-gray-100">
                            <input
                                class="peer relative z-10 border-l-8 border-gray-100 focus:border-amber-200 outline-none block w-full pt-5 p-2 bg-transparent"
                                type="text" name="lastname" id="lastname">
                            <label
                                class="peer-focus:pt-1 peer-focus:pb-0 peer-focus:pl-2.5 peer-focus:text-xs absolute top-0 left-0 max-h-full w-full transition-all py-3.5 pl-4"
                                for="lastname">Last Name *</label>
                        </div>
                    </div>
                    <div class="relative bg-gray-100 my-6">
                        <input
                            class="peer relative z-10 border-l-8 border-gray-100 focus:border-amber-200 outline-none block w-full pt-5 p-2 bg-transparent"
                            type="text" name="username" id="username1">
                        <label
                            class="peer-focus:pt-1 peer-focus:pb-0 peer-focus:pl-2.5 peer-focus:text-xs absolute top-0 left-0 max-h-full w-full transition-all py-3.5 pl-4"
                            for="username1">Username *</label>
                    </div>
                    <div class="relative bg-gray-100 my-6">
                        <input
                            class="peer relative z-10 border-l-8 border-gray-100 focus:border-amber-200 outline-none block w-full pt-5 p-2 bg-transparent"
                            type="email" name="email" id="email">
                        <label
                            class="peer-focus:pt-1 peer-focus:pb-0 peer-focus:pl-2.5 peer-focus:text-xs absolute top-0 left-0 max-h-full w-full transition-all py-3.5 pl-4"
                            for="email">Email *</label>
                    </div>
                    <div class="relative bg-gray-100 my-6">
                        <input
                            class="peer relative z-10 border-l-8 border-gray-100 focus:border-amber-200 outline-none block w-full pt-5 p-2 bg-transparent"
                            type="password" name="password" id="password1">
                        <label
                            class="peer-focus:pt-1 peer-focus:pb-0 peer-focus:pl-2.5 peer-focus:text-xs absolute top-0 left-0 max-h-full w-full transition-all py-3.5 pl-4"
                            for="password1">Password *</label>
                    </div>
                    <div class="grid grid-cols-2 my-2">
                        <div>
                            <input class="accent-amber-300 cursor-pointer" type="checkbox" name="remember"
                                id="remember1">
                            <label class="pl-1 cursor-pointer" for="remember1">Remember Me</label>
                        </div>
                        <div class="text-right">
                            <a href="?" class="italic text-gray-400 text-sm underline hover:no-underline">Forgot
                                Password?</a>
                        </div>
                    </div>
                    <div class="my-6">
                        <button type="submit"
                            class="py-3 px-8 bg-amber-300 border border-amber-400 hover:bg-amber-400 mr-4">
                            Register
                        </button>
                        <button data-action="login" type="button" class="py-3 px-8 bg-gray-200 border border-gray-300 hover:bg-gray-300">
                            Login
                        </button>
                    </div>
                </form>
            </div>
            <div id="blind" class="absolute w-1/2 h-full bg-amber-400 top-0 left-0 z-20 transition-all duration-500"></div>
        </div>
    </div>
</body>

</html>
