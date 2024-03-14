<template>
    <div>
        <div class="bg-blue-500 flex items-center justify-center">
            <h3>Formulario para agregar más a la tabla</h3>
            <FormularioView />
        </div>

        <div class="flex justify-center items-center">
            <div
                class="container bckgnd m-7 d-flex align-items-center justify-content-center"
            >

                <div class="overflow-x-auto">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>
                                    <label>
                                        <input
                                            type="checkbox"
                                            class="checkbox"
                                        />
                                    </label>
                                </th>
                                <th>Id prueba</th>
                                <th>Input1</th>
                                <th>Input2</th>
                                <th>Input3</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(elm,index) in prueba.data" :key="index">

                                <td>
                                    <label>
                                        <input
                                            type="checkbox"
                                            class="checkbox"
                                        />
                                    </label>
                                </td>
                                <td>{{ elm.id_prueba }}</td>
                                <td>{{ elm.input1 }}</td>
                                <td>{{ elm.input2 }}</td>
                                <td>{{ elm.input3 }}</td>
                                <td>
                                    <button
                                        class="btn btn-ghost btn-xs"
                                        @click="updatePrueba(elm)"
                                    >
                                        Editar
                                    </button>
                                    <button
                                        class="btn btn-ghost btn-xs"
                                        @click="deletePrueba(elm)"
                                    >
                                        Eliminar
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th></th>
                                <th>Id prueba</th>
                                <th>Input1</th>
                                <th>Input2</th>
                                <th>Input3</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
          </div>

        <!-- Paginación -->
        <div class="flex justify-center items-center">
            <!-- Pagination -->
            <div class="join">
                <input
                    v-for="(pagina, index) in paginas"
                    class="join-item btn btn-square"
                    type="radio"
                    name="options"
                    :aria-label="(index + 1).toString()"
                    v-bind:checked="currentPage === index + 1"
                    href="#"
                    :value="index + 1"
                    @change="updateCurrentPage"
                />
                <!--<pre>{{currentPage}}</pre>-->
            </div>
            <!-- <Pagination :paginas="paginas" :currentPage="current_page" @updatePage="actualizarPagina" class="flex justify-center items-center" /> -->
        </div>
    </div>
    <div>
        <Modal :showModal="showModal" @close="showModal = false">
            <FormularioView />
        </Modal>
    </div>
</template>

<script setup lang="ts">
import FormularioView from "@/Pages/FormularioView.vue";
import axios from "axios";
import Pagination from "../Layouts/Pagination.vue";
import Modal from "../Layouts/Modal.vue";
import { ref, onMounted } from "vue";

import { usePruebaStore } from "../stores/prueba.store";

const {deletePrueba,updatePrueba, prueba, fetchPruebas } = usePruebaStore();

// interface Prueba {
//   id_prueba: number;
//   input1: string;
//   input2: string;
//   input3: string;
// }

// const pruebas = ref<Prueba[]>([]);
const paginas = ref(0);
const currentPage = ref(1);
const showModal = ref(false);


// const PruebaToEdit = ref<Prueba>({
//   id_prueba: 0,
//   input1: "",
//   input2: "",
//   input3: "",
// });

// Función para abrir el modal de edición
// const editarPrueba = (prueba: Prueba) => {

//   PruebaToEdit.value = prueba;

//   showModal.value = true;
//   //console.log("Imprimo el valor de PruebaTo Edit");
//   //console.log(PruebaToEdit.value);
// };

// const fetchData=(async() => {
//   try {
//     const response = await axios.get('/prueba/getData?page=' + currentPage.value);
//     paginas.value = response.data.last_page;
//     pruebas.value = response.data.data;
//   } catch (error) {
//     console.error('Error fetching data:', error);
//   }
// });

// const editar =  async (prueba: Prueba) => {
//   try {
//     const response = await axios.get('/prueba/editar/' + prueba.id_prueba);
//     console.log(response);
//     showModal.value = false;

//   } catch (error) {
//     console.error('Error fetching data:', error);
//   }
// };

// const eliminar = async (prueba: Prueba) => {
//     console.log(prueba);

//     axios.post('/prueba_eliminar', prueba)
//     .then(response => {
//         fetchData();
//     })
//     .catch(error => {
//         console.log(error);
//     });
// };

const updateCurrentPage = (event: any) => {
    currentPage.value = parseInt(event.target.value);
    //const data2=fetchPruebas();
    //console.log("Vista", data2);
};

onMounted(async () => {
    try {
        const data = await fetchPruebas();
        console.log('Data mounted:', data);



    } catch (error) {
        console.error('Error fetching data:', error);
    }
});

</script>

<style scoped>
.pagination {
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: green;
}
</style>
