<template>
<form @submit.prevent="finalizar" >
    <label for="input1">Input 1:</label>
    <input type="text" id="input1" v-model="data.input1" required >
<div v-if="errors && errors.input1">
      <span class="error">{{ errors.input1[0] }}</span>
    </div>
    <label for="input2">Input 2:</label>
    <input type="text" id="input2" v-model="data.input2" required>
<div v-if="errors && errors.input2">
      <span class="error">{{ errors.input2[0] }}</span>
    </div>
    <label for="input3">Input 3:</label>
    <input type="text" id="input3" v-model="data.input3" required>
<div v-if="errors && errors.input3">
      <span class="error">{{ errors.input3[0] }}</span>
    </div>
    <button type="submit">Guardar</button>
</form>

<div v-if="errors">
    <ul>
        <li v-for="(error, key) in errors" :key="key">{{ error[0] }}</li>
    </ul>
</div>

</template>

<script lang="ts" setup>
import axios from 'axios';

import {onUpdated,onBeforeUpdate, onMounted,ref, reactive } from 'vue';

interface errors {
    input1: string[];
    input2: string[];
    input3: string[];
}

const errors = ref( <errors> {
    input1: [],
    input2: [],
    input3: [],
});

const props=defineProps({
    pruebaToEdit: {
        type: Object,
        //type: Object as () => null | { input1: string; input2: string; input3: string },
        default: null,
        required: false,
    },

});

interface data1 {
    input1: number;
    input2: string;
    input3: boolean;
}

const data: data1 = reactive <data1>({
    input1: props.pruebaToEdit ? props.pruebaToEdit.input1 : '',
    input2: props.pruebaToEdit ? props.pruebaToEdit.input2 : '',
    input3:     props.pruebaToEdit ? props.pruebaToEdit.input3 : '',
});



    const finalizar=()=>{
    axios.post('/prueba', data)
    .then(response => {
        console.log(response.data);
    })
    .catch(error => {
        errors.value = error.response.data.errors;
        console.log(error);
    });
}


</script>

<style scoped>
@import "daisyui/dist/full.css";
</style>


