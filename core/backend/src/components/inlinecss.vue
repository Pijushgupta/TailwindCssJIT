<script setup>
const inlinecss = () =>{

}

</script>
<template>
    <div class="w-full bg-white p-4  flex flex-row justify-between items-center border-b my-1">
    <label for="inlinecss" class="w-full flex flex-row justify-between items-center">
        <div class="flex flex-row items-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z" />
</svg>


            <div class="flex flex-col justify-start ml-3">
                <span class="text-sm ">Inline generated css on the frontend</span>
                <span class="text-xs">Inlining css on frontend can improve the performance.</span>
            </div>
        </div>
        <div class="inline-flex items-center cursor-pointer relative">
            <input id="inlinecss" type="checkbox" name="scan-theme" class="sr-only peer" v-on:click="inlinecss">
            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
        </div>
    </label>
 

</div>
</template>