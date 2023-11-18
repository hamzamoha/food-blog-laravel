<!DOCTYPE html>
<html lang="en">

<head>
    <title>Profile | {{ env('APP_NAME', 'Cuisine Compass') }}</title>
    @include('inc.common_head_tags')
    <script>
        class Router {
            constructor() {
                document.querySelectorAll("input[type='radio'][name='section']").forEach(input => {
                    input.addEventListener('change', this.on_change)
                });
            }
            go_to(section_id = 1) {
                const input = document.querySelector("input[type='radio'][name='section']#section_" + section_id)
                input.checked = true
                input.dispatchEvent(new Event('change'))
            }
            on_change() {
                const section_id = document.querySelector("input[type='radio'][name='section']:checked")
                    .value.substr(8);
                document.querySelectorAll("section[data-section]").forEach(section => {
                    section.className = section.getAttribute('data-section') == section_id ? 'block' : 'hidden'
                });
            }
        }
        class Image_Upload_Previwer {
            constructor(input, img) {
                const form = input.closest("form");
                const submit_button_container = form.querySelector("#submit-button-container");
                form.onreset = function(event) {
                    input.value = ""
                    submit_button_container.classList.add('hidden')
                    img.classList.add('hidden')
                }
                input.addEventListener("change", (event) => {
                    //input = event.currentTarget
                    if (input.files.length > 0) {
                        const file = input.files[0]
                        const reader = new FileReader()
                        reader.readAsDataURL(file)
                        reader.onload = function() {
                            img.setAttribute('src', reader.result)
                            img.classList.remove('hidden')
                            submit_button_container.classList.remove('hidden')
                        }
                        reader.onerror = function(error) {
                            console.log('Error: ', error);
                            img.setAttribute('src', '')
                            img.classList.add('hidden')
                            submit_button_container.classList.add('hidden')
                        }
                    } else {
                        img.setAttribute('src', '')
                        img.classList.add('hidden')
                        submit_button_container.classList.add('hidden')
                    }
                })
            }
        }
    </script>
</head>

<body>
    @include('inc.header')
    <main class="max-w-6xl mx-auto py-10">
        <section class="flex justify-center items-center">
            <div class="relative mx-1">
                <input class="peer w-0 h-0 opacity-0 invisible absolute" type="radio" name="section" id="section_1"
                    value="section_1" checked>
                <label
                    class="block py-2 px-4 rounded bg-neutral-200 cursor-pointer hover:bg-neutral-300 peer-checked:bg-amber-400"
                    for="section_1">Section 1</label>
            </div>
            <div class="relative mx-1">
                <input class="peer w-0 h-0 opacity-0 invisible absolute" type="radio" name="section" id="section_2"
                    value="section_2">
                <label
                    class="block py-2 px-4 rounded bg-neutral-200 cursor-pointer hover:bg-neutral-300 peer-checked:bg-amber-400"
                    for="section_2">Section 2</label>
            </div>
            <div class="relative mx-1">
                <input class="peer w-0 h-0 opacity-0 invisible absolute" type="radio" name="section" id="section_3"
                    value="section_3">
                <label
                    class="block py-2 px-4 rounded bg-neutral-200 cursor-pointer hover:bg-neutral-300 peer-checked:bg-amber-400"
                    for="section_3">Section 3</label>
            </div>
        </section>
        <section data-section="1">
            <div class="mb-4 mt-20 pt-20 relative">
                <div class="absolute top-0 left-1/2 -translate-x-1/2 -translate-y-1/2 w-32 h-32 rounded-full">
                    <form id="user_photo_form" enctype="multipart/form-data" method="POST" autocomplete="off"
                        action="{{ route('auth.profile') }}">
                        @csrf
                        @if (auth()->user()->photo_url && \Illuminate\Support\Facades\Storage::exists(auth()->user()->photo_url))
                            <img onerror="this.classList.add('hidden')"
                                class="rounded-full overflow-hidden absolute w-full h-full object-cover"
                                src="{{ auth()->user()->photo_url }}"
                                alt="{{ auth()->user()->firstname . ' ' . auth()->user()->lastname }}">
                        @else
                            <img class="rounded-full overflow-hidden absolute w-full h-full object-cover bg-neutral-200"
                                src="/uploads/user.png"
                                alt="{{ auth()->user()->firstname . ' ' . auth()->user()->lastname }}">
                        @endif
                        <img id="preview_user_photo"
                            class="rounded-full overflow-hidden absolute w-full h-full object-cover hidden">
                        <div class="group absolute w-full h-full rounded-full overflow-hidden">
                            <label
                                class="bg-black bg-opacity-30 w-full h-full rounded-full overflow-hidden hidden group-hover:flex justify-center items-center cursor-pointer"
                                for="image"><i class="fa-solid fa-image text-2xl text-neutral-200"></i></label>
                            <input type="file" id="image" name="image" class="hidden">
                        </div>
                        <div id="submit-button-container"
                            class="absolute top-full left-0 w-full pt-2 text-center hidden">
                            <button type="reset"
                                class="py-1 px-2 text-sm font-bold rounded bg-red-300 hover:bg-red-200">X</button>
                            <button type="submit"
                                class="py-1 px-2.5 text-sm font-bold rounded bg-teal-300 hover:bg-teal-200">Submit</button>
                        </div>
                    </form>
                </div>
                <div class="grid sm:grid-cols-2">
                    <form method="POST" autocomplete="off" action="{{ route('auth.profile') }}" class="p-2">
                        @csrf
                        <h2 class="py-1 text-2xl text-center">Your Informations</h2>
                        <input value="{{ auth()->user()->firstname }}"
                            class="w-full p-2 rounded border border-neutral-200 bg-neutral-200 focus:bg-white hover:border-neutral-100 hover:bg-neutral-100 my-2 outline-none leading-8"
                            type="text" name="firstname" id="firstname" placeholder="First Name">
                        <input value="{{ auth()->user()->lastname }}"
                            class="w-full p-2 rounded border border-neutral-200 bg-neutral-200 focus:bg-white hover:border-neutral-100 hover:bg-neutral-100 my-2 outline-none leading-8"
                            type="text" name="lastname" id="lastname" placeholder="Last Name">
                        <input value="{{ auth()->user()->username }}"
                            class="w-full p-2 rounded border border-neutral-200 bg-neutral-200 focus:bg-white hover:border-neutral-100 hover:bg-neutral-100 my-2 outline-none leading-8"
                            type="text" name="username" id="username" placeholder="Username">
                        <input value="{{ auth()->user()->email }}"
                            class="w-full p-2 rounded border border-neutral-200 bg-neutral-200 focus:bg-white hover:border-neutral-100 hover:bg-neutral-100 my-2 outline-none leading-8"
                            type="email" name="email" id="email" placeholder="Email">
                        <button type="submit"
                            class="py-2 px-5 bg-teal-400 hover:bg-teal-300 my-1 mx-auto block w-fit rounded">Save</button>
                    </form>
                    <form method="POST" autocomplete="off" action="{{ route('auth.profile') }}" class="p-2">
                        @csrf
                        <h2 class="py-1 text-2xl text-center">Your Password</h2>
                        <input
                            class="w-full p-2 rounded border border-neutral-200 bg-neutral-200 focus:bg-white hover:border-neutral-100 hover:bg-neutral-100 my-2 outline-none leading-8"
                            type="password" name="old_password" id="old_password" placeholder="Old Password">
                        <input
                            class="w-full p-2 rounded border border-neutral-200 bg-neutral-200 focus:bg-white hover:border-neutral-100 hover:bg-neutral-100 my-2 outline-none leading-8"
                            type="password" name="new_password" id="new_password" placeholder="New Password">
                        <input
                            class="w-full p-2 rounded border border-neutral-200 bg-neutral-200 focus:bg-white hover:border-neutral-100 hover:bg-neutral-100 my-2 outline-none leading-8"
                            type="password" name="new_password_confirmation" id="new_password_confirmation"
                            placeholder="New Password Confirmation">
                        <button type="submit"
                            class="py-2 px-5 bg-teal-400 hover:bg-teal-300 my-1 mx-auto block w-fit rounded">Change
                            Password</button>
                    </form>
                </div>
            </div>
        </section>
        <section data-section="2">
        </section>
        <section data-section="3">
        </section>
        <script>
            new Router()
            const temp = new Image_Upload_Previwer(
                document.querySelector("#user_photo_form input[type='file']"),
                document.querySelector("img#preview_user_photo")
            )
        </script>
    </main>
    @include('inc.footer')
</body>

</html>
