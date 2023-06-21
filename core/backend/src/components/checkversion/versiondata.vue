<template>
    <div class="flex justify-start w-1/2">
        <div class="flex flex-col ml-9" :class="nodedata == '' ? 'hidden':''">
          <table>
            <tr><td class="pr-4 capitalize">Node</td><td>{{ nodedata.node }}</td></tr>
            <tr><td class="pr-4 capitalize">Npm</td><td>{{ nodedata.npm }}</td></tr>
            <tr v-if="packageJson != ''" v-for="(i,index) in packageJson" :key="index"><td class="pr-4 capitalize">{{ index }}</td><td>{{ i }}</td></tr>
          </table>
          

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