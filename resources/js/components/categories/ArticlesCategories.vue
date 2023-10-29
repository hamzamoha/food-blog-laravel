<template>
    <table class="text-left w-full bg-white border text-sm rounded overflow-hidden shadow-md">
        <thead class="bg-gray-800 text-white">
            <tr>
                <th class="py-2 px-3 whitespace-nowrap">ID</th>
                <th class="py-2 px-3 whitespace-nowrap">Category</th>
                <th class="py-2 px-3 whitespace-nowrap">Description</th>
                <th class="py-2 px-3 whitespace-nowrap">Articles</th>
                <th class="py-2 px-3 whitespace-nowrap">Featured Image</th>
                <th class="py-2 px-3 whitespace-nowrap">Popular Tags</th>
                <th class="py-2 px-3 whitespace-nowrap">Related Links</th>
            </tr>
        </thead>
        <tbody>
            <tr class="border-b border-gray-200">
                <td class="py-2 px-3">4</td>
                <td class="py-2 px-3">Meal Planning</td>
                <td class="py-2 px-3">Plan your meals efficiently for a healthier lifestyle.</td>
                <td class="py-2 px-3">65</td>
                <td class="py-2 px-3"><img src="#" alt="Meal Planning Image"></td>
                <td class="py-2 px-3">Weekly Meal Plans</td>
                <td class="py-2 px-3">
                    <a href="#" class="inline-block py-1 px-2 bg-neutral-200 rounded hover:bg-neutral-100">Learn
                        More</a>
                </td>
            </tr>
            <tr class="border-b border-gray-200">
                <td class="py-2 px-3">5</td>
                <td class="py-2 px-3">Special Occasions</td>
                <td class="py-2 px-3">Recipes for memorable special occasions and celebrations.</td>
                <td class="py-2 px-3">75</td>
                <td class="py-2 px-3"><img src="#" alt="Special Occasions Image"></td>
                <td class="py-2 px-3">Holidays, Parties, Romantic Dinners</td>
                <td class="py-2 px-3">
                    <a href="#" class="inline-block py-1 px-2 bg-neutral-200 rounded hover:bg-neutral-100">Learn
                        More</a>
                </td>
            </tr>
            <tr class="border-b border-gray-200">
                <td class="py-2 px-3">6</td>
                <td class="py-2 px-3">Culinary Tips</td>
                <td class="py-2 px-3">Discover useful tips and tricks for culinary success.</td>
                <td class="py-2 px-3">45</td>
                <td class="py-2 px-3"><img src="#" alt="Culinary Tips Image"></td>
                <td class="py-2 px-3">Kitchen Hacks, Food Safety</td>
                <td class="py-2 px-3">
                    <a href="#" class="inline-block py-1 px-2 bg-neutral-200 rounded hover:bg-neutral-100">Learn
                        More</a>
                </td>
            </tr>
            <!-- Add more rows for each category with corresponding data -->
        </tbody>
    </table>
</template>

<script>
export default {
    name: "ArticlesCategories"
}
</script>