<template>
    <div class="bg-white p-6 animate-push">
        <!-- Articles -->
        <h2 class="mb-4 text-2xl font-semibold">All Articles</h2>
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
                <tr class="border-b">
                    <td class="flex items-center justify-center py-3 w-9 text-center">
                        <input type="checkbox" name="1" checked class="cursor-pointer w-4 h-4 accent-amber-500">
                    </td>
                    <td class="px-3 py-2">Spaghetti Carbonara</td>
                    <td class="px-3 py-2 italic">
                        <a href="#" class="hover:underline">Pasta</a>
                    </td>
                    <td class="px-3 py-2">October 23, 2023</td>
                    <td class="px-3 py-2">341<i class="ml-1 fa-regular fa-eye"></i></td>
                    <td class="px-3 py-1">
                        <button class="bg-neutral-200 rounded py-1 px-2 hover:bg-neutral-300 text-neutral-700"><i
                                class="fa-solid fa-pen"></i></button>
                        <button class="bg-neutral-200 rounded py-1 px-2 hover:bg-neutral-300 text-neutral-700"><i
                                class="fa-solid fa-trash"></i></button>
                    </td>
                </tr>
                <tr class="border-b">
                    <td class="flex items-center justify-center py-3 w-9 text-center">
                        <input type="checkbox" name="1" class="cursor-pointer w-4 h-4 accent-amber-500">
                    </td>
                    <td class="px-3 py-2">Classic Omelette</td>
                    <td class="px-3 py-2 italic">
                        <a href="#" class="hover:underline">Breakfast</a>
                    </td>
                    <td class="px-3 py-2">15 10 2023</td>
                    <td class="px-3 py-2">341<i class="ml-1 fa-regular fa-eye"></i></td>
                    <td class="px-3 py-1">
                        <button class="bg-neutral-200 rounded py-1 px-2 hover:bg-neutral-300 text-neutral-700"><i
                                class="fa-solid fa-pen"></i></button>
                        <button class="bg-neutral-200 rounded py-1 px-2 hover:bg-neutral-300 text-neutral-700"><i
                                class="fa-solid fa-trash"></i></button>
                    </td>
                </tr>
                <tr class="border-b">
                    <td class="flex items-center justify-center py-3 w-9 text-center">
                        <input type="checkbox" name="1" checked class="cursor-pointer w-4 h-4 accent-amber-500">
                    </td>
                    <td class="px-3 py-2">Avocado Toast</td>
                    <td class="px-3 py-2 italic">
                        <a href="#" class="hover:underline">Breakfast</a>
                    </td>
                    <td class="px-3 py-2">28 09 2023</td>
                    <td class="px-3 py-2">341<i class="ml-1 fa-regular fa-eye"></i></td>
                    <td class="px-3 py-1">
                        <button class="bg-neutral-200 rounded py-1 px-2 hover:bg-neutral-300 text-neutral-700"><i
                                class="fa-solid fa-pen"></i></button>
                        <button class="bg-neutral-200 rounded py-1 px-2 hover:bg-neutral-300 text-neutral-700"><i
                                class="fa-solid fa-trash"></i></button>
                    </td>
                </tr>
                <tr class="border-b">
                    <td class="flex items-center justify-center py-3 w-9 text-center">
                        <input type="checkbox" name="1" class="cursor-pointer w-4 h-4 accent-amber-500">
                    </td>
                    <td class="px-3 py-2">Eggs Benedict</td>
                    <td class="px-3 py-2 italic">
                        <a href="#" class="hover:underline">Brunch</a>
                    </td>
                    <td class="px-3 py-2">20 08 2023</td>
                    <td class="px-3 py-2">341<i class="ml-1 fa-regular fa-eye"></i></td>
                    <td class="px-3 py-1">
                        <button class="bg-neutral-200 rounded py-1 px-2 hover:bg-neutral-300 text-neutral-700"><i
                                class="fa-solid fa-pen"></i></button>
                        <button class="bg-neutral-200 rounded py-1 px-2 hover:bg-neutral-300 text-neutral-700"><i
                                class="fa-solid fa-trash"></i></button>
                    </td>
                </tr>
                <tr class="border-b">
                    <td class="flex items-center justify-center py-3 w-9 text-center">
                        <input type="checkbox" name="1" class="cursor-pointer w-4 h-4 accent-amber-500">
                    </td>
                    <td class="px-3 py-2">Grilled Chicken Salad</td>
                    <td class="px-3 py-2 italic">
                        <a href="#" class="hover:underline">Lunch</a>
                    </td>
                    <td class="px-3 py-2">12 07 2023</td>
                    <td class="px-3 py-2">341<i class="ml-1 fa-regular fa-eye"></i></td>
                    <td class="px-3 py-1">
                        <button class="bg-neutral-200 rounded py-1 px-2 hover:bg-neutral-300 text-neutral-700"><i
                                class="fa-solid fa-pen"></i></button>
                        <button class="bg-neutral-200 rounded py-1 px-2 hover:bg-neutral-300 text-neutral-700"><i
                                class="fa-solid fa-trash"></i></button>
                    </td>
                </tr>
                <tr class="border-b">
                    <td class="flex items-center justify-center py-3 w-9 text-center">
                        <input type="checkbox" name="1" checked class="cursor-pointer w-4 h-4 accent-amber-500">
                    </td>
                    <td class="px-3 py-2">Pancakes with Maple Syrup</td>
                    <td class="px-3 py-2 italic">
                        <a href="#" class="hover:underline">Pancakes</a>
                    </td>
                    <td class="px-3 py-2">05 06 2023</td>
                    <td class="px-3 py-2">341<i class="ml-1 fa-regular fa-eye"></i></td>
                    <td class="px-3 py-1">
                        <button class="bg-neutral-200 rounded py-1 px-2 hover:bg-neutral-300 text-neutral-700"><i
                                class="fa-solid fa-pen"></i></button>
                        <button class="bg-neutral-200 rounded py-1 px-2 hover:bg-neutral-300 text-neutral-700"><i
                                class="fa-solid fa-trash"></i></button>
                    </td>
                </tr>
                <tr class="border-b">
                    <td class="flex items-center justify-center py-3 w-9 text-center">
                        <input type="checkbox" name="1" class="cursor-pointer w-4 h-4 accent-amber-500">
                    </td>
                    <td class="px-3 py-2">Club Sandwich</td>
                    <td class="px-3 py-2 italic">
                        <a href="#" class="hover:underline">Sandwiches</a>
                    </td>
                    <td class="px-3 py-2">19 05 2023</td>
                    <td class="px-3 py-2">341<i class="ml-1 fa-regular fa-eye"></i></td>
                    <td class="px-3 py-1">
                        <button class="bg-neutral-200 rounded py-1 px-2 hover:bg-neutral-300 text-neutral-700"><i
                                class="fa-solid fa-pen"></i></button>
                        <button class="bg-neutral-200 rounded py-1 px-2 hover:bg-neutral-300 text-neutral-700"><i
                                class="fa-solid fa-trash"></i></button>
                    </td>
                </tr>
                <tr class="border-b">
                    <td class="flex items-center justify-center py-3 w-9 text-center">
                        <input type="checkbox" name="1" class="cursor-pointer w-4 h-4 accent-amber-500">
                    </td>
                    <td class="px-3 py-2">Veggie Wrap</td>
                    <td class="px-3 py-2 italic">
                        <a href="#" class="hover:underline">Wraps and Rolls</a>
                    </td>
                    <td class="px-3 py-2">02 04 2023</td>
                    <td class="px-3 py-2">341<i class="ml-1 fa-regular fa-eye"></i></td>
                    <td class="px-3 py-1">
                        <button class="bg-neutral-200 rounded py-1 px-2 hover:bg-neutral-300 text-neutral-700"><i
                                class="fa-solid fa-pen"></i></button>
                        <button class="bg-neutral-200 rounded py-1 px-2 hover:bg-neutral-300 text-neutral-700"><i
                                class="fa-solid fa-trash"></i></button>
                    </td>
                </tr>
                <tr class="border-b">
                    <td class="flex items-center justify-center py-3 w-9 text-center">
                        <input type="checkbox" name="1" class="cursor-pointer w-4 h-4 accent-amber-500">
                    </td>
                    <td class="px-3 py-2">Spinach and Artichoke Dip</td>
                    <td class="px-3 py-2 italic">
                        <a href="#" class="hover:underline">Appetisers</a>
                    </td>
                    <td class="px-3 py-2">14 03 2023</td>
                    <td class="px-3 py-2">341<i class="ml-1 fa-regular fa-eye"></i></td>
                    <td class="px-3 py-1">
                        <button class="bg-neutral-200 rounded py-1 px-2 hover:bg-neutral-300 text-neutral-700"><i
                                class="fa-solid fa-pen"></i></button>
                        <button class="bg-neutral-200 rounded py-1 px-2 hover:bg-neutral-300 text-neutral-700"><i
                                class="fa-solid fa-trash"></i></button>
                    </td>
                </tr>
                <tr class="border-b">
                    <td class="flex items-center justify-center py-3 w-9 text-center">
                        <input type="checkbox" name="1" class="cursor-pointer w-4 h-4 accent-amber-500">
                    </td>
                    <td class="px-3 py-2">Tomato Basil Soup</td>
                    <td class="px-3 py-2 italic">
                        <a href="#" class="hover:underline">Soups</a>
                    </td>
                    <td class="px-3 py-2">08 02 2023</td>
                    <td class="px-3 py-2">341<i class="ml-1 fa-regular fa-eye"></i></td>
                    <td class="px-3 py-1">
                        <button class="bg-neutral-200 rounded py-1 px-2 hover:bg-neutral-300 text-neutral-700"><i
                                class="fa-solid fa-pen"></i></button>
                        <button class="bg-neutral-200 rounded py-1 px-2 hover:bg-neutral-300 text-neutral-700"><i
                                class="fa-solid fa-trash"></i></button>
                    </td>
                </tr>
                <tr class="border-b">
                    <td class="flex items-center justify-center py-3 w-9 text-center">
                        <input type="checkbox" name="1" class="cursor-pointer w-4 h-4 accent-amber-500">
                    </td>
                    <td class="px-3 py-2">Grilled Steak</td>
                    <td class="px-3 py-2 italic">
                        <a href="#" class="hover:underline">Dinner</a>
                    </td>
                    <td class="px-3 py-2">10 01 2023</td>
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
    name: "Articles"
}
</script>