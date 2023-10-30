<template>
    <div class="bg-white p-6 animate-push">
        <form action="/" method="POST" autocomplete="off">
            <h1 class="text-3xl font-semibold py-2">Create New Recipe</h1>
            <p class="text-sm text-neutral-700">Craft a Fresh, Innovative Recipe.</p>
            <table class="w-full mt-8">
                <tbody>
                    <tr class="border-b">
                        <td class="w-[1%] py-2 px-4">Title</td>
                        <td class="py-2 px-4">
                            <div class="relative">
                                <input name="title" type="text"
                                    class="block p-2 bg-neutral-300 focus:bg-neutral-100 focus:shadow-[0_0_0_1px_#ddd] w-full h-10 outline-none">
                            </div>
                        </td>
                    </tr>
                    <tr class="border-b">
                        <td class="w-[1%] py-2 px-4">Description</td>
                        <td class="py-2 px-4">
                            <div class="relative">
                                <input name="description" type="text"
                                    class="block p-2 bg-neutral-300 focus:bg-neutral-100 focus:shadow-[0_0_0_1px_#ddd] w-full h-10 outline-none">
                            </div>
                        </td>
                    </tr>
                    <tr class="border-b">
                        <td class="w-[1%] py-2 px-4">Ingredients</td>
                        <td class="py-2 px-4">
                            <div class="flex flex-wrap">
                                <input name="description" type="hidden"
                                    :value="recipe_ingredients.reduce((r, e) => (r.push(e.id) ? r : []), [])">
                                <div v-for="(ingredient, index) in recipe_ingredients" :key="index"
                                    class="w-20 h-20 p-2 bg-neutral-100 rounded border mr-2 mb-2 flex justify-center items-center text-center">
                                    {{ ingredient.name }}</div>
                                <button type="button" @click="addIngredient = true"
                                    class="w-20 h-20 bg-neutral-200 mr-2 mb-2 flex justify-center items-center cursor-pointer hover:bg-neutral-300"><i
                                        class="fa-solid fa-plus fa-2xl"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr class="border-b">
                        <td class="w-[1%] py-2 px-4">Difficulty</td>
                        <td class="py-2 px-4">
                            <div class="flex flex-wrap py-4">
                                <input name="difficulty"
                                    :class="['accent-green-500', 'accent-amber-500', 'accent-red-500'][recipe_difficulty]"
                                    type="range" min="0" max="2" v-model="recipe_difficulty"><span class="ml-2">{{ ['Easy',
                                        'Medium', 'Hard'][recipe_difficulty] }}</span>
                                <input type="hidden" :value="['easy', 'medium', 'hard'][recipe_difficulty]">
                            </div>
                        </td>
                    </tr>
                    <tr class="border-b">
                        <td class="w-[1%] py-5 px-4">Cooking Time (in Minutes)</td>
                        <td class="py-5 px-4">
                            <input name="cooking_time" class="p-2 border border-neutral-400" type="number" min="0">
                        </td>
                    </tr>
                    <tr class="border-b">
                        <td class="w-[1%] py-5 px-4">Cooking Method</td>
                        <td class="py-5 px-4 flex flex-wrap">
                            <input type="hidden" name="cooking_method" :value="recipe_cookingMethods.join(',')">
                            <div class="mb-2 mr-2 relative" v-for="(item, index) in cookingMethods" :key="index">
                                <input :id="'cookingMethod' + index" :value="item"
                                    :checked="recipe_cookingMethods.includes(item)"
                                    class="peer absolute w-0 h-0 opacity-0 invisible" type="checkbox">
                                <label
                                    @click="recipe_cookingMethods.includes(item) ? recipe_cookingMethods = recipe_cookingMethods.filter(id => id !== item) : recipe_cookingMethods.push(item)"
                                    class="py-1 px-3 rounded bg-neutral-200 block cursor-pointer transition-all hover:scale-95 peer-checked:bg-amber-400">{{
                                        item }}</label>
                            </div>
                        </td>
                    </tr>
                    <tr class="border-b">
                        <td class="w-[1%] py-5 px-4">Serving Size</td>
                        <td class="py-5 px-4 flex flex-wrap">
                            <input name="serving_size" class="p-2 border border-neutral-400" type="number" min="0">
                        </td>
                    </tr>
                    <tr class="border-b">
                        <td class="w-[1%] py-5 px-4 align-top">Category</td>
                        <td class="py-5 px-4 flex flex-wrap">
                            <input type="hidden" name="category" :value="recipe_categories.join(',')">
                            <div class="mb-2 mr-2 relative" v-for="(item, index) in categories" :key="index">
                                <input :id="'category' + index" :value="item.id"
                                    :checked="recipe_categories.includes(item.id)"
                                    class="peer absolute w-0 h-0 opacity-0 invisible" type="checkbox">
                                <label
                                    @click="recipe_categories.includes(item.id) ? recipe_categories = recipe_categories.filter(id => id !== item.id) : recipe_categories.push(item.id)"
                                    :style="`--bg-image: url('/${item.image_url}');`"
                                    class="group select-none transition-[transform] hover:scale-95 cursor-pointer border-2 border-amber-400 peer-checked:border-green-400 overflow-hidden pl-20 pt-10 bg-cover rounded flex bg-[image:var(--bg-image)]">
                                    <span class="bg-amber-300 group-peer-checked:bg-green-400 p-1 text-sm font-semibold">{{
                                        item.label }}</span>
                                </label>
                            </div>
                        </td>
                    </tr>
                    <tr class="border-b">
                        <td class="w-[1%] py-5 px-4">Tags</td>
                        <td class="py-5 px-4">
                            <div class="border inline-flex flex-wrap">
                                <input type="hidden" :value="recipe_tags.join(',')">
                                <span @click="recipe_tags.splice(index, 1)"
                                    class="m-1 text-sm font-medium p-1 rounded bg-neutral-100 border"
                                    v-for="(item, index) in recipe_tags" :key="index">{{ titleCase(item) }}<i
                                        class="ml-1 fa-light fa-xmark"></i></span>
                                <input type="text" class="m-1 outline-none indent-[0]" @keydown="addTag($event)">
                            </div>
                        </td>
                    </tr>
                    <tr class="border-b">
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
                                <div class="">
                                    <button class="py-2 px-3 rounded bg-blue-400 ml-3 hover:bg-blue-500 active:bg-blue-400" type="button" @click="editor.data = prettify(editor.data)"><i class="fa-regular fa-chevrons-right fa-2xs mr-1"></i>Format</button>
                                </div>
                                <div class="relative h-[400px]">
                                    <textarea placeholder="Enter HTML Source Code" id="editing" spellcheck="false" class="h-[350px]"
                                        v-model="editor.data" @input="update(); sync_scroll($event.target);"
                                        @scroll="sync_scroll($event.target);"
                                        @keydown="check_tab($event.target, $event);"></textarea>
                                    <pre class="language-html h-[350px]" id="highlighting" aria-hidden="true">
                                        <code class="language-html" id="highlighting-content" v-html="Prism.highlight(editor.data, Prism.languages.html, 'html')"></code>
                                    </pre>
                                </div>

                            </div>
                            <div class="border" v-else>
                                <ckeditor style="--ck-spacing-unit: 20px" :editor="editor.instance" @ready="onReady"
                                    v-model="editor.data" :config="editor.config"></ckeditor>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
    <div v-if="addIngredient"
        :class="'fixed pt-8 pb-4 top-0 left-0 w-full h-full transition-all animate-pop bg-black bg-opacity-20'">
        <div class="bg-white p-6 border shadow-lg max-w-auto w-[600px] flex flex-col mx-auto rounded-lg max-h-full">
            <div class="pb-5">
                <h2 class="text-center pb-2 text-3xl font-semibold">Add Ingredients</h2>
                <input type="text" placeholder="Search ..." v-model="search_query"
                    class="w-full bg-neutral-100 border h-10 p-2 outline-none rounded">
            </div>
            <div class="overflow-y-auto">
                <div v-for="(elements, category) in Object.keys(ingredients).reduce((r, k) => { r[k] = ingredients[k].filter(i => (i.name.toLowerCase().includes(search_query))); return r }, {})"
                    :key="category" class="border-b py-3">
                    <h3 class="py-2 text-xl font-semibold">{{ titleCase(category) }}</h3>
                    <div class="flex flex-wrap">
                        <div v-for="(ingredient, index) in elements" :key="index"
                            :class="'w-20 h-20 p-2 rounded border mr-2 mb-2 flex justify-center text-center items-center cursor-pointer ' + (isSelected(ingredient) ? 'bg-emerald-100' : 'bg-neutral-200')"
                            @click="select(ingredient)">
                            {{ titleCase(ingredient.name) }}</div>
                    </div>
                </div>
            </div>
            <div class="pt-5 text-center">
                <button type="button" @click="search_query = ''; addIngredient = false"
                    class="py-2 px-5 bg-sky-600 rounded text-white hover:bg-sky-700">Done</button>
            </div>
        </div>
    </div>
</template>
<style>
/* Please see the article */

#editing,
#highlighting {
    /* Both elements need the same text and space styling so they are directly on top of each other */
    margin: 10px;
    padding: 10px;
    border: 0;
    width: calc(100% - 32px);
}

#editing,
#highlighting,
#highlighting * {
    /* Also add text styles to highlighing tokens */
    font-size: 11pt;
    font-family: monospace;
    line-height: 1.5;
    tab-size: 2;
}


#editing,
#highlighting {
    /* In the same place */
    position: absolute;
    top: 0;
    left: 0;
}


/* Move the textarea in front of the result */

#editing {
    z-index: 1;
}

#highlighting {
    z-index: 0;
}


/* Make textarea almost completely transparent */

#editing {
    color: transparent;
    background: transparent;
    caret-color: white;
    /* Or choose your favourite color */
}

/* Can be scrolled */
#editing,
#highlighting {
    overflow: auto;
    white-space: nowrap;
    /* Allows textarea to scroll horizontally */
}

/* No resize on textarea */
#editing {
    resize: none;
}

/* Paragraphs; First Image */
* {
    font-family: "Fira Code", monospace;
}

p code {
    border-radius: 2px;
    background-color: #eee;
    color: #111;
}


/* Syntax Highlighting from prism.js starts below, partly modified: */

/* PrismJS 1.23.0
https://prismjs.com/download.html#themes=prism-funky&languages=markup */
/**
 * prism.js Funky theme
 * Based on “Polyfilling the gaps” talk slides http://lea.verou.me/polyfilling-the-gaps/
 * @author Lea Verou
 */

code[class*="language-"],
pre[class*="language-"] {
    font-family: Consolas, Monaco, 'Andale Mono', 'Ubuntu Mono', monospace;
    font-size: .8em;
    text-align: left;
    white-space: pre;
    word-spacing: normal;
    word-break: normal;
    word-wrap: normal;
    line-height: 1.5;

    -moz-tab-size: 4;
    -o-tab-size: 4;
    tab-size: 4;

    -webkit-hyphens: none;
    -moz-hyphens: none;
    -ms-hyphens: none;
    hyphens: none;
}

/* Code blocks */
pre[class*="language-"] {
    padding: .4em .8em;
    margin: .5em 0;
    overflow: auto;
    /* background: url('data:image/svg+xml;charset=utf-8,<svg%20version%3D"1.1"%20xmlns%3D"http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg"%20width%3D"100"%20height%3D"100"%20fill%3D"rgba(0%2C0%2C0%2C.2)">%0D%0A<polygon%20points%3D"0%2C50%2050%2C0%200%2C0"%20%2F>%0D%0A<polygon%20points%3D"0%2C100%2050%2C100%20100%2C50%20100%2C0"%20%2F>%0D%0A<%2Fsvg>');
  background-size: 1em 1em; - WebCoder49*/
    background: black;
    /* - WebCoder49 */
}

code[class*="language-"] {
    background: black;
    color: white;
    box-shadow: -.3em 0 0 .3em black, .3em 0 0 .3em black;
}

/* Inline code */
:not(pre)>code[class*="language-"] {
    padding: .2em;
    border-radius: .3em;
    box-shadow: none;
    white-space: normal;
}

.token.comment,
.token.prolog,
.token.doctype,
.token.cdata {
    color: #aaa;
}

.token.punctuation {
    color: #999;
}

.token.namespace {
    opacity: .7;
}

.token.property,
.token.tag,
.token.boolean,
.token.number,
.token.constant,
.token.symbol {
    color: #0cf;
}

.token.selector,
.token.attr-name,
.token.string,
.token.char,
.token.builtin {
    color: yellow;
}

.token.operator,
.token.entity,
.token.url,
.language-css .token.string,
.token.variable,
.token.inserted {
    color: yellowgreen;
}

.token.atrule,
.token.attr-value,
.token.keyword {
    color: deeppink;
}

.token.regex,
.token.important {
    color: orange;
}

.token.important,
.token.bold {
    font-weight: bold;
}

.token.italic {
    font-style: italic;
}

.token.entity {
    cursor: help;
}

.token.deleted {
    color: red;
}

/* Plugin styles: Diff Highlight */
pre.diff-highlight.diff-highlight>code .token.deleted:not(.prefix),
pre>code.diff-highlight.diff-highlight .token.deleted:not(.prefix) {
    background-color: rgba(255, 0, 0, .3);
    display: inline;
}

pre.diff-highlight.diff-highlight>code .token.inserted:not(.prefix),
pre>code.diff-highlight.diff-highlight .token.inserted:not(.prefix) {
    background-color: rgba(0, 255, 128, .3);
    display: inline;
}

/* End of prism.js syntax highlighting*/
</style>
<script>
import DecoupledEditor from '@ckeditor/ckeditor5-build-decoupled-document';
import Prism from 'prismjs'
export default {
    name: "AddRecipe",
    data() {
        return {
            Prism,
            recipe_ingredients: [],
            addIngredient: false,
            ingredients: {},
            recipe_categories: [1, 3],
            recipe_cookingMethods: ['Bake', 'Sauté'],
            search_query: "",
            recipe_difficulty: 1,
            cookingMethods: ['Bake', 'Boil', 'Braise', 'Broil', 'Fry', 'Grill', 'Roast', 'Poach', 'Sauté', 'Steam', 'Stir-Fry', 'Simmer'],
            categories: [],
            recipe_tags: ['Homemade', 'Family Dinner'],
            show_code: false,
            highlighted_code: '',
            editor: {
                instance: DecoupledEditor,
                data: `<p style="margin-left:0px;"><span class="text-big"><i><strong>Hearty &amp; Flavorful</strong></i></span></p><p style="margin-left:0px;"><br data-cke-filler="true"></p><p style="margin-left:0px;">Spaghetti Bolognese, a cherished Italian classic, unites al dente spaghetti with a rich, savory sauce. Whether you're a seasoned chef or a kitchen novice, this recipe guarantees to impress.</p><p style="margin-left:0px;"><br data-cke-filler="true"></p><p style="margin-left:0px;"><span class="text-big"><i><strong>The Secret's in the Sauce</strong></i></span></p><p style="margin-left:0px;"><br data-cke-filler="true"></p><p style="margin-left:0px;">The magic begins with a browned meat base and a trio of finely chopped vegetables—onions, carrots, and celery. Garlic adds its aromatic allure. Crushed tomatoes and tomato paste infuse the sauce with richness, while dried oregano, basil, and optional red pepper flakes provide Mediterranean charm. A dash of red wine (if you're feeling adventurous) and slow simmering for up to 2 hours yield a velvety, flavor-packed sauce.</p><p style="margin-left:0px;"><br data-cke-filler="true"></p><p style="margin-left:0px;"><span class="text-big"><i><strong>Perfect Pairing</strong></i></span></p><p style="margin-left:0px;"><br data-cke-filler="true"></p><p style="margin-left:0px;">Cook spaghetti to al dente perfection, marrying it with the sauce. For the finishing touch, sprinkle with Parmesan cheese and fresh basil. Spaghetti Bolognese epitomizes comfort and flavor. Share the joy by recreating Italy's essence in your kitchen. Buon appetito!</p><p style="margin-left:0px;"><br data-cke-filler="true"></p>`,
                config: {
                    toolbar: {
                        items: [
                            'undo', 'redo', '|',
                            'selectAll', '|',
                            'heading', '|',
                            'bold', 'italic', 'strikethrough', 'underline', '|',
                            'bulletedList', 'numberedList', '|',
                            'outdent', 'indent', '|',
                            'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', '|',
                            'alignment', '|',
                            'link', 'blockQuote', 'insertTable', '|'
                        ],
                        shouldNotGroupWhenFull: false
                    },
                }
            }
        }
    },
    components: { Prism },
    methods: {
        fetchIngredients() {
            fetch("/api/ingredients")
                .then(res => res.json())
                .then(res => {
                    res.forEach(element => {
                        this.ingredients[element.category] = [...(this.ingredients[element.category] ? this.ingredients[element.category] : []), element]
                    });
                    return res;
                })
                .then((res) => (this.recipe_ingredients = res.filter(i => ["salt", "onions", "garlic", "olive oil", "pepper"].includes(i.name.toLowerCase()))))
        },
        fetchCategories() {
            fetch("/api/categories")
                .then(res => res.json())
                .then(res => (this.categories = res));
        },
        isSelected(ingredient) {
            return this.recipe_ingredients.includes(ingredient)
        },
        select(ingredient) {
            if (this.isSelected(ingredient))
                this.recipe_ingredients = this.recipe_ingredients.filter(i => i !== ingredient)
            else
                this.recipe_ingredients = [...this.recipe_ingredients, ingredient]
        },
        addTag(event) {
            console.log("enter");
            if (event.key === 'Enter') {
                event.preventDefault()
                const tag = event.target.value.toLowerCase().trim()
                if (tag !== "" && !this.recipe_tags.includes(tag)) {
                    this.recipe_tags.push(tag)
                }
                event.target.value = ""
            }
        },
        onReady(editor) {
            // Insert the toolbar before the editable area.
            editor.ui.getEditableElement().parentElement.insertBefore(
                editor.ui.view.toolbar.element,
                editor.ui.getEditableElement()
            );
        },
        update() {
            if (this.editor.data[this.editor.data.length - 1] == "\n") {
                this.editor.data += " ";
            }
        },
        global_regex() {
            return this.editor.data.replace(new RegExp("&", "g"), "&amp;").replace(new RegExp("<", "g"), "&lt;");
        },
        sync_scroll(element) {
            /* Scroll result to scroll coords of event - sync with textarea */
            let result_element = document.querySelector("#highlighting");
            // Get and set x and y
            result_element.scrollTop = element.scrollTop;
            result_element.scrollLeft = element.scrollLeft;
        },
        check_tab(element, event) {
            let code = this.editor.data;
            if (event.key == "Tab") {
                /* Tab key pressed */
                event.preventDefault(); // stop normal
                let before_tab = code.slice(0, element.selectionStart); // text before tab
                let after_tab = code.slice(element.selectionEnd, this.editor.data.length); // text after tab
                let cursor_pos = element.selectionStart + 1; // where cursor moves after tab - moving forward by 1 char to after tab
                this.editor.data = before_tab + "\t" + after_tab; // add tab char
                // move cursor
                element.selectionStart = cursor_pos;
                element.selectionEnd = cursor_pos;
                update(); // Update text to include indent
            }
        },
        prettify(html) {
            return html;
        }
    },
    mounted() {
        this.fetchIngredients()
        this.fetchCategories()
    },

}
</script>