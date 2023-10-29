<template>
    <div class="bg-white p-6 animate-push">
        <form action="/" method="POST" autocomplete="off">
            <h1 class="text-3xl font-semibold py-2">Create New Recipe</h1>
            <p class="text-sm text-neutral-700">Craft a Fresh, Innovative Recipe.</p>
            <table class="w-full mt-8">
                <tbody>
                    <tr class="border-b">
                        <td class="py-2 px-4">Title</td>
                        <td class="py-2 px-4">
                            <div class="relative">
                                <input name="title" type="text"
                                    class="block p-2 bg-neutral-300 focus:bg-neutral-100 focus:shadow-[0_0_0_1px_#ddd] w-full h-10 outline-none">
                            </div>
                        </td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-2 px-4">Description</td>
                        <td class="py-2 px-4">
                            <div class="relative">
                                <input name="description" type="text"
                                    class="block p-2 bg-neutral-300 focus:bg-neutral-100 focus:shadow-[0_0_0_1px_#ddd] w-full h-10 outline-none">
                            </div>
                        </td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-2 px-4">Ingredients</td>
                        <td class="py-2 px-4">
                            <div class="flex flex-wrap">
                                <input name="description" type="hidden" v-model="recipe_ingredients">
                                <div v-for="(ingredient, index) in recipe_ingredients.split(',')" :key="index"
                                    class="w-20 h-20 p-2 bg-neutral-100 rounded border mr-2 mb-2 flex justify-center items-center text-center">
                                    {{ ingredient }}</div>
                                <button type="button" @click="addIngredient = true"
                                    class="w-20 h-20 bg-neutral-200 mr-2 mb-2 flex justify-center items-center cursor-pointer hover:bg-neutral-300"><i
                                        class="fa-solid fa-plus fa-2xl"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-2 px-4">Difficulty</td>
                        <td class="py-2 px-4">
                            <div class="flex flex-wrap py-4">
                                <input name="difficulty" :class="['accent-green-500', 'accent-amber-500', 'accent-red-500'][recipe_difficulty]" type="range" min="0" max="2" v-model="recipe_difficulty"><span class="ml-2">{{ ['Easy', 'Medium', 'Hard'][recipe_difficulty] }}</span>
                                <input type="hidden" :value="['easy', 'medium', 'hard'][recipe_difficulty]">
                            </div>
                        </td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-2 px-4">Duration (in Minutes)</td>
                        <td class="py-2 px-4">
                            <div class="flex flex-wrap py-4">
                                <input name="duration" class="p-2 border" type="number" min="0">
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
                <input type="text" placeholder="Search ..." v-model="search_query" class="w-full bg-neutral-100 border h-10 p-2 outline-none rounded">
            </div>
            <div class="overflow-y-auto">
                <div v-for="(elements, category) in Object.keys(ingredients).reduce((r,k) => {r[k]=ingredients[k].filter(i=>(i.toLowerCase().includes(search_query)));return r} , {})" :key="category" class="border-b py-3">
                    <h3 class="py-2 text-xl font-semibold">{{ titleCase(category) }}</h3>
                    <div class="flex flex-wrap">
                        <div v-for="(ingredient, index) in elements" :key="index"
                            :class="'w-20 h-20 p-2 rounded border mr-2 mb-2 flex justify-center text-center items-center cursor-pointer ' + (isSelected(ingredient) ? 'bg-emerald-100' : 'bg-neutral-200')"
                            @click="select(ingredient)">
                            {{ titleCase(ingredient) }}</div>
                    </div>
                </div>
            </div>
            <div class="pt-5 text-center">
                <button type="button" @click="search_query = '';addIngredient=false" class="py-2 px-5 bg-sky-600 rounded text-white hover:bg-sky-700">Done</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "AddRecipe",
    data() {
        return {
            recipe_ingredients: "Salt,Pepper,Olive oil,Garlic,Onions,Butter,Flour,Eggs,Sugar,Tomatoes,Chicken,Rice,Milk,Potatoes,Cheese",
            addIngredient: false,
            ingredients: {
                seasonings: ['Salt', 'Pepper', 'Garlic Powder', 'Onion Powder', 'Paprika', 'Cumin', 'Oregano'],
                oils: ['Olive Oil', 'Vegetable Oil', 'Canola Oil', 'Coconut Oil', 'Sesame Oil'],
                dairy: ['Milk', 'Butter', 'Cheese', 'Eggs', 'Yogurt', 'Heavy Cream'],
                proteins: ['Chicken', 'Beef', 'Pork', 'Fish', 'Tofu', 'Lamb', 'Shrimp'],
                vegetables: ['Tomatoes', 'Onions', 'Potatoes', 'Carrots', 'Broccoli', 'Bell Peppers', 'Spinach'],
                grains: ['Rice', 'Pasta', 'Flour', 'Bread', 'Quinoa', 'Oats', 'Couscous'],
                sweeteners: ['Sugar', 'Honey', 'Maple Syrup', 'Agave Nectar', 'Brown Sugar', 'Molasses'],
                herbs: ['Basil', 'Parsley', 'Cilantro', 'Thyme', 'Rosemary', 'Mint'],
                fruits: ['Apples', 'Bananas', 'Oranges', 'Strawberries', 'Lemons', 'Avocado'],
            },
            search_query: "",
            recipe_difficulty: 1
        }
    },
    methods: {
        fetchIngredients() {
            fetch("/api/ingredients")
                .then(res => res.json())
                .then(res => this.ingredients = res)
        },
        isSelected(ingredient) {
            return this.recipe_ingredients.split(',').includes(ingredient)
        },
        select(ingredient) {
            const ingredients = this.recipe_ingredients.split(',');
            if (ingredients.includes(ingredient))
                this.recipe_ingredients = ingredients.filter(i => i !== ingredient).join(',')
            else
                this.recipe_ingredients = [...ingredients, ingredient].join(',')
        }
    },
}
</script>