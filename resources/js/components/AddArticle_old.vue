<template>
    <div class="bg-neutral-100 p-0 animate-push">
        <form action="/api/articles" method="POST" autocomplete="off" enctype="multipart/form-data">
            <input type="hidden" name="_token" :value="csrf_token">
            <h1 class="text-3xl font-semibold bg-white p-3">Create New Recipe</h1>
            <p class="text-sm text-neutral-700 bg-white px-3 pb-3">Craft a Fresh, Innovative Recipe.</p>
            <div class="grid md:grid-cols-3 gap-3 mt-3">
                <div class="col-span-2 p-3 bg-white">
                    <table class="w-full">
                        <tbody>
                            <tr class="border-b">
                                <td class="w-[1%] py-2 px-4 align-top">Image</td>
                                <td class="py-2 px-4">
                                    <div class="flex items-center justify-center w-full">
                                        <label for="image" @drop="drop($event)" @dragover="$event.preventDefault()"
                                            class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                                <div v-if="imagePreview" class="py-2 text-center">
                                                    <img :src="imagePreview" alt="Image Preview" class="h-60">
                                                </div>
                                                <div v-else id="previewImagePlaceholder">
                                                    <svg class="w-8 h-8 mb-4 text-gray-500" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                                    </svg>
                                                    <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Click
                                                            to
                                                            upload</span> or drag and drop</p>
                                                    <p class="text-xs text-gray-500">SVG, PNG, JPG or GIF</p>
                                                </div>
                                            </div>
                                            <input id="image" name="image" type="file" class="hidden"
                                                @change="imageSelected($event)" />
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="border-b">
                                <td class="w-[1%] py-2 px-4">Title</td>
                                <td class="py-2 px-4">
                                    <div class="relative">
                                        <input name="title" type="text"
                                            class="block p-2 bg-neutral-300 focus:bg-neutral-100 focus:shadow-[0_0_0_1px_#ddd] w-full h-10 outline-none">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="w-[1%] py-5 px-4 align-top">Content</td>
                                <td class="py-5 px-4">
                                    <div class="text-center py-1">
                                        <div
                                            class="relative inline-flex justify-content items-center rounded-full p-1 bg-neutral-200">
                                            <div
                                                :class="'absolute transition-all h-[calc(100%-.5rem)] w-20 top-1 rounded-full bg-amber-400 ' + (show_code ? 'left-1/2' : 'left-1')">
                                            </div>
                                            <button type="button" @click="show_code = false"
                                                :class="'w-20 transition-all text-center relative py-2 px-4 rounded-full mr-1' + (show_code ? '' : ' text-white')">Text</button>
                                            <button type="button" @click="show_code = true"
                                                :class="'w-20 transition-all text-center relative py-2 px-4 rounded-full' + (show_code ? ' text-white' : '')">Code</button>
                                        </div>
                                    </div>
                                    <div v-if="show_code">
                                        <div>
                                            <button
                                                class="py-2 px-3 rounded bg-blue-400 ml-3 hover:bg-blue-500 active:bg-blue-400"
                                                type="button"
                                                @click="(async () => { editor.data = await prettify(editor.data) })"><i
                                                    class="fa-regular fa-chevrons-right fa-2xs mr-1"></i>Format</button>
                                        </div>
                                        <div class="relative h-[400px] code">
                                            <textarea placeholder="Enter HTML Source Code" id="editing" spellcheck="false"
                                                class="h-[350px]" v-model="editor.data" name="content"
                                                @input="update(); sync_scroll($event.target);"
                                                @scroll="sync_scroll($event.target);"
                                                @keydown="check_tab($event.target, $event);"></textarea>
                                            <pre class="language-html" id="highlighting"
                                                aria-hidden="true"><code class="language-html" id="highlighting-content" v-html="Prism.highlight(editor.data, Prism.languages.html, 'html')"></code></pre>
                                        </div>
                                    </div>
                                    <div class="border" v-else>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="bg-white p-4">
                    <div class="py-2">Tags</div>
                    <div class="px-4">
                        <div class="border inline-flex flex-wrap">
                            <input type="hidden" :value="article_tags.join(',')" name="tags">
                            <span @click="article_tags.splice(index, 1)"
                                class="m-1 text-sm font-medium p-1 rounded bg-neutral-100 border"
                                v-for="(item, index) in article_tags" :key="index">{{ titleCase(item) }}<i
                                    class="ml-1 fa-light fa-xmark"></i></span>
                            <input type="text" class="m-1 outline-none indent-[0]" @keydown="addTag($event)">
                        </div>
                    </div>
                    <div class="py-2">Category</div>
                    <div class="px-4 flex flex-wrap">
                        <input type="hidden" name="categories" :value="article_categories.join(',')">
                        <div class="mb-2 mr-2 relative" v-for="(item, index) in categories" :key="index">
                            <input :id="'category' + index" :value="item.id" :checked="article_categories.includes(item.id)"
                                class="peer absolute w-0 h-0 opacity-0 invisible" type="checkbox">
                            <label
                                @click="article_categories.includes(item.id) ? article_categories = article_categories.filter(id => id !== item.id) : article_categories.push(item.id)"
                                :style="`--bg-image: url('/${item.image_url}');`"
                                class="group select-none transition-[transform] hover:scale-95 cursor-pointer border-2 border-amber-400 peer-checked:border-green-400 overflow-hidden pl-20 pt-10 bg-cover rounded flex bg-[image:var(--bg-image)]">
                                <span class="bg-amber-300 group-peer-checked:bg-green-400 p-1 text-sm font-semibold">{{
                                    item.label }}</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="py-2 text-center">
                <button class="py-2 px-4 rounded bg-green-500 hover:bg-green-400">Save</button>
            </div>
        </form>
    </div>
</template>
<style>
.ck.ck-toolbar.ck-toolbar_grouping>.ck-toolbar__items {
    flex-wrap: wrap !important;
}
</style>
<script>
import Prism from 'prismjs'
import "../../css/code.css"
import * as prettier from "prettier";
import prettierHtmlPlugin from "prettier/plugins/html"
export default {
    name: "AddRecipe",
    data() {
        return {
            Prism,
            imagePreview: null,
            csrf_token: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            article_categories: [],
            categories: [],
            article_tags: [],
            show_code: false,
            editor: {
                data: `<p style="margin-left:0px;"><span class="text-big"><i><strong>Hearty &amp; Flavorful</strong></i></span></p><p style="margin-left:0px;"><br data-cke-filler="true"></p><p style="margin-left:0px;">Spaghetti Bolognese, a cherished Italian classic, unites al dente spaghetti with a rich, savory sauce. Whether you're a seasoned chef or a kitchen novice, this recipe guarantees to impress.</p><p style="margin-left:0px;"><br data-cke-filler="true"></p><p style="margin-left:0px;"><span class="text-big"><i><strong>The Secret's in the Sauce</strong></i></span></p><p style="margin-left:0px;"><br data-cke-filler="true"></p><p style="margin-left:0px;">The magic begins with a browned meat base and a trio of finely chopped vegetables—onions, carrots, and celery. Garlic adds its aromatic allure. Crushed tomatoes and tomato paste infuse the sauce with richness, while dried oregano, basil, and optional red pepper flakes provide Mediterranean charm. A dash of red wine (if you're feeling adventurous) and slow simmering for up to 2 hours yield a velvety, flavor-packed sauce.</p><p style="margin-left:0px;"><br data-cke-filler="true"></p><p style="margin-left:0px;"><span class="text-big"><i><strong>Perfect Pairing</strong></i></span></p><p style="margin-left:0px;"><br data-cke-filler="true"></p><p style="margin-left:0px;">Cook spaghetti to al dente perfection, marrying it with the sauce. For the finishing touch, sprinkle with Parmesan cheese and fresh basil. Spaghetti Bolognese epitomizes comfort and flavor. Share the joy by recreating Italy's essence in your kitchen. Buon appetito!</p><p style="margin-left:0px;"><br data-cke-filler="true"></p>`,
                config: {
                    toolbar: ['undo', 'redo' ,'removeFormat', '|', 'selectAll', '|', 'heading', '|', 'bold', 'italic', 'strikethrough', 'underline', '|', 'bulletedList', 'numberedList', '|', 'outdent', 'indent', '|', 'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', '|', 'alignment', '|', 'link', 'blockQuote', 'insertTable', '|'],
                }
            }
        }
    },
    methods: {
        fetchCategories() {
            fetch("/api/articles/categories")
                .then(res => res.json())
                .then(res => (this.categories = res));
        },
        addTag(event) {
            if (event.key === 'Enter') {
                event.preventDefault()
                const tag = event.target.value.toLowerCase().trim()
                if (tag !== "" && !this.article_tags.includes(tag)) {
                    this.article_tags.push(tag)
                }
                event.target.value = ""
            }
        },
        onReady(editor) {
            editor.ui.getEditableElement().parentElement.insertBefore(
                editor.ui.view.toolbar.element,
                editor.ui.getEditableElement()
            );
        },
        update() {
            if (this.editor.data[this.editor.data.length - 1] == "\n") this.editor.data += " "
        },
        sync_scroll(element) {
            let result_element = document.querySelector("#highlighting");
            result_element.scrollTop = element.scrollTop;
            result_element.scrollLeft = element.scrollLeft;
        },
        check_tab(element, event) {
            let code = this.editor.data;
            if (event.key == "Tab") {
                event.preventDefault();
                let before_tab = code.slice(0, element.selectionStart);
                let after_tab = code.slice(element.selectionEnd, this.editor.data.length);
                let cursor_pos = element.selectionStart + 1;
                this.editor.data = before_tab + "\t" + after_tab;
                element.selectionStart = cursor_pos;
                element.selectionEnd = cursor_pos;
                update();
            }
        },
        async prettify(html) {
            return (await prettier.format(html, { parser: "html", plugins: [prettierHtmlPlugin], bracketSameLine: true, proseWrap: "never", singleAttributePerLine: true })).slice(0, -1);
        },
        imageSelected(event) {
            const ref = this
            const input = event.target;
            if (input.files.length > 0) {
                const file = input.files[0]
                const reader = new FileReader()
                reader.readAsDataURL(file)
                reader.onload = function () {
                    ref.imagePreview = reader.result
                };
                reader.onerror = function (error) {
                    console.log('Error: ', error);
                };
            }
            else {
                this.imagePreview = null
            }
        },
        drop(ev) {
            ev.preventDefault();
            if (ev.dataTransfer.files) {
                const input = ev.currentTarget.querySelector("input[name='image'][type='file']");
                input.files = ev.dataTransfer.files;
                input.dispatchEvent(new Event("change"));
            }
        },
    },
    mounted() {
        this.fetchCategories()
    },
}
</script>