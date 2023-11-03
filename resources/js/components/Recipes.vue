<template>
    <div class="bg-white p-6 animate-push">
        <!-- Recipes -->
        <h2 class="mb-4 text-2xl font-semibold">All Recipes <router-link to="/recipes/create" class="float-right py-2 px-5 rounded bg-teal-500 text-base text-white hover:bg-teal-600">Add</router-link></h2>
        <table
            class="multiple-check-handle bg-neutral-100 w-full text-sm overflow-hidden rounded-lg shadow-[0_1px_5px_-1px_rgba(0,0,0,.2)]">
            <thead>
                <tr class="text-left bg-slate-200 font-bold">
                    <td class="flex items-center justify-center py-3 w-9 text-center">
                        <input type="checkbox" name="all" class="cursor-pointer w-4 h-4 accent-amber-500">
                    </td>
                    <td class="px-3 py-2">Title</td>
                    <td class="px-3 py-2">Category</td>
                    <td class="px-3 py-2">Created at</td>
                    <td class="px-3 py-2">Views</td>
                    <td class="px-3 py-2">Action</td>
                </tr>
            </thead>
            <tbody>
                <tr class="border-b" v-for="(recipe, index) in recipes" :key="index">
                    <td class="flex items-center justify-center py-3 w-9 text-center">
                        <input type="checkbox" name="recipe-<?= $recipe->id ?>"
                            class="cursor-pointer w-4 h-4 accent-amber-500">
                    </td>
                    <td class="px-3 py-2">{{ recipe.title }}</td>
                    <td class="px-3 py-2 italic">
                        <a v-for="(category, index) in recipe.categories" :key="index" :href="'#/categories/' + category.slug" class="hover:underline">{{ category.label }}</a>
                    </td>
                    <td class="px-3 py-2">{{ (new Date((recipe.created_at))).toLocaleString() }}</td>
                    <td class="px-3 py-2">341<i class="ml-1 fa-regular fa-eye"></i></td>
                    <td class="px-3 py-1">
                        <button class="bg-neutral-200 rounded py-1 px-2 hover:bg-neutral-300 text-neutral-700"><i
                                class="fa-solid fa-pen"></i></button>
                        <button class="bg-neutral-200 rounded py-1 px-2 hover:bg-neutral-300 text-neutral-700"><i
                                class="fa-solid fa-trash"></i></button>
                    </td>
                </tr>
            </tbody>
            <tfoot class="hidden">
                <tr>
                    <td colspan="6" class="px-3 py-2 bg-slate-200">
                        <span>Multiple Action: </span>
                        <button class="bg-neutral-300 ml-1 rounded py-1 px-2 hover:bg-neutral-400 text-neutral-700"><i
                                class="fa-solid fa-trash"></i></button>
                </td>
            </tr>
        </tfoot>
    </table>
</div></template>

<script>
export default {
    name: "Recipes",
    data() {
        return {
            recipes: []
        }
    },
    mounted() {
        this.fetchRecipes();
    },
    methods: {
        fetchRecipes() {
            fetch("/api/recipes")
                .then(res => res.json())
                .then(data => { this.recipes = data })
        }
    }
}
</script>