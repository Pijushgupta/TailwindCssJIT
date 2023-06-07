<template>
<div class="w-full bg-white p-4  flex flex-row justify-between items-center border-b my-1">
    <label for="sti" class="w-full flex flex-row justify-between items-center">
        <div class="flex flex-row items-center">

        
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"> <path stroke-linecap="round" stroke-linejoin="round" d="M7.864 4.243A7.5 7.5 0 0119.5 10.5c0 2.92-.556 5.709-1.568 8.268M5.742 6.364A7.465 7.465 0 004.5 10.5a7.464 7.464 0 01-1.15 3.993m1.989 3.559A11.209 11.209 0 008.25 10.5a3.75 3.75 0 117.5 0c0 .527-.021 1.049-.064 1.565M12 10.5a14.94 14.94 0 01-3.6 9.75m6.633-4.596a18.666 18.666 0 01-2.485 5.33" /> </svg>

            <div class="flex flex-col justify-start ml-3">
                <span class="text-sm  ">Monitor the current theme.</span>
                <span class="text-xs">Monitor current theme's templates to generate Tailwind css during each page/post save/update event.(recomended)</span>
            </div>
        </div>
        <div class="inline-flex items-center cursor-pointer relative">
            <input id="sti" type="checkbox" name="scan-theme" class="sr-only peer">
            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
        </div>
    </label>
 

</div>

</template>
<script setup>

</script>