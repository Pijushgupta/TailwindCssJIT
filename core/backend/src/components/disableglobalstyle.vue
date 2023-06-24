<script setup>
const globalstylede = () =>{

}

</script>
<template>
    <div class="w-full bg-white p-4  flex flex-row justify-between items-center border-b my-1">
    <label for="globalstyle" class="w-full flex flex-row justify-between items-center">
        <div class="flex flex-row items-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M4.098 19.902a3.75 3.75 0 005.304 0l6.401-6.402M6.75 21A3.75 3.75 0 013 17.25V4.125C3 3.504 3.504 3 4.125 3h5.25c.621 0 1.125.504 1.125 1.125v4.072M6.75 21a3.75 3.75 0 003.75-3.75V8.197M6.75 21h13.125c.621 0 1.125-.504 1.125-1.125v-5.25c0-.621-.504-1.125-1.125-1.125h-4.072M10.5 8.197l2.88-2.88c.438-.439 1.15-.439 1.59 0l3.712 3.713c.44.44.44 1.152 0 1.59l-2.879 2.88M6.75 17.25h.008v.008H6.75v-.008z" />
</svg>



            <div class="flex flex-col justify-start ml-3">
                <span class="text-sm ">Disable WordPress global style</span>
                <span class="text-xs">Disable the WordPress global style in case it is overwriting your custom style.</span>
            </div>
        </div>
        <div class="inline-flex items-center cursor-pointer relative">
            <input id="globalstyle" type="checkbox" name="scan-theme" class="sr-only peer" v-on:click="globalstylede">
            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
        </div>
    </label>
 

</div>
</template>