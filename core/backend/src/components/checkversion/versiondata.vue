<template>
    <div class="flex justify-start w-1/2">
        <div class="flex flex-col" :class="nodedata == '' ? 'hidden':''">
          <span v-if="nodedata.node != false"> Node: {{ nodedata.node }}</span>
          <span v-if="nodedata.npm != false"> Npm: {{ nodedata.npm }}</span>
        </div>

    </div>
    
</template>
<script  setup>
import {ref} from 'vue';
const nodedata = ref('');
async function getNodeInfo(){
    const data = new FormData();
    data.append('toolkit_nonce',toolkit_nonce);
    data.append('action','getNodeInfo');
    
    fetch(toolkit_ajax_path,{method:'POST',body:data})
    .then(res => res.json())
    .then(res => {
      if(res  !== false){
        nodedata.value = res
        console.log(nodedata);
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