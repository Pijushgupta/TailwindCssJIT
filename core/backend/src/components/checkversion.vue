<template>
    <div class="w-full bg-white p-4  flex flex-col   my-1">
        <label for="checkversion" class="w-full flex flex-row justify-between items-center">
            <div class="flex flex-row items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"> <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" /> </svg>
                <div class="flex flex-col justify-start ml-3">
                    <span class="text-sm ">About</span>
                    <span class="text-xs ">Node version, Npm version and other information</span>
                    
                </div>
            </div>  
          <button id="checkversion" class=" rounded-full p-1" v-on:click="status = !status">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 stroke-gray-500" v-bind:class="status == true ? 'rotate-90':''"> <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" /> </svg>
         </button>
        </label>
        <div v-if="status == true" class="mt-4">
            <Suspense>
                <template #default>
                    <versiondata/>
                </template>
                <template #fallback>
                    hello...
                </template>
            </Suspense>
            
        </div>
    </div>
    
    </template>
    <script setup>
    import {ref} from 'vue';
    import versiondata from './checkversion/versiondata.vue';
    const status = ref(false);
    </script>