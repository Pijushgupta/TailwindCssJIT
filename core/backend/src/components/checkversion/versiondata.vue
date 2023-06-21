<template>
    <div class="flex justify-start w-1/2">
        <div class="flex flex-col" :class="nodedata == '' ? 'hidden':''">
          <span v-if="nodedata.node != false"> Node: {{ nodedata.node }}</span>
          <span v-if="nodedata.npm != false"> Npm: {{ nodedata.npm }}</span>
        </div>
        <div class="flex flex-col" v-if="packageJson != ''">
          <span v-for="(i,index) in packageJson" :key="index">{{ index }} : {{ i }}</span>
        </div>

    </div>
    
</template>
<script  setup>
import {ref} from 'vue';
const nodedata = ref('');
const packageJson = ref('');
function getNodeInfo(){
    const data = new FormData();
    data.append('toolkit_nonce',toolkit_nonce);
    data.append('action','getNodeInfo');
    
    fetch(toolkit_ajax_path,{method:'POST',body:data})
    .then(res => res.json())
    .then(res => {
      if(res  !== false){
        nodedata.value = res
        if(nodedata.value.json.hasOwnProperty('devDependencies')){
          packageJson.value = nodedata.value.json.devDependencies
        }
        //console.log(nodedata.value.json.devDependencies);
        return;
      }

      /**
       * Incase of node error
       */
      if(res === false){
        data.node = 'Node Js error';
        data.npm = '';
        nodedata.value = data;
      }

    } )
    .catch(err => console.log(err));
}

getNodeInfo();
</script>