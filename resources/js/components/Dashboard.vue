<template>
    <div class="bg-white p-6 animate-push">
        <!-- Dashboard -->
        <div class="flex flex-wrap">
            <div class="p-3 w-48 max-w-full rounded mr-2 mb-2 bg-white border shadow">
                <div class="py-1 font-bold text-neutral-700">Posts Count</div>
                <div class="text-2xl py-1 text-amber-400">215</div>
            </div>
            <div class="p-3 w-48 max-w-full rounded mr-2 mb-2 bg-white border shadow">
                <div class="py-1 font-bold text-neutral-700">Recipes Count</div>
                <div class="text-2xl py-1 text-blue-400">101</div>
            </div>
            <div class="p-3 w-48 max-w-full rounded bg-white border shadow">
                <div class="py-1 font-bold text-neutral-700">Articles Count</div>
                <div class="text-2xl py-1 text-green-400">114</div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: "Dashboard"
}
</script>