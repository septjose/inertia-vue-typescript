import { PruebaService } from "./../services/prueba.services";
import { defineStore } from "pinia";
import { reactive } from "vue";
import { Prueba } from "./../interfaces/Iprueba";
import { ref } from "vue";

interface Pruebas {
    data: Prueba[]
  }


export const usePruebaStore = defineStore("prueba", () => {



    const prueba: Pruebas  = reactive<Pruebas>(
        {
            data: [],
        }
        //llamar el servicio y poner los valores en el objeto
    );

    // Define los estados
    const pruebas = ref([]);
    const currentPage = ref(1);
    const totalPages = ref(0);

    // Define las acciones (métodos) para interactuar con el servicio
    const fetchPruebas = async () => {
        const  data  = await PruebaService.getAllPruebas(
            currentPage,
            totalPages,
            pruebas
        );
            prueba.data = data;
    return prueba;

    };

    const createPrueba = async (data: Prueba) => {
        await PruebaService.createPrueba(data);
        // Luego de crear la prueba, vuelves a cargar las pruebas para reflejar el cambio
        await fetchPruebas();
    };

    const updatePrueba = async ( data: Prueba) => {
        await PruebaService.updatePrueba(data);
        // Luego de actualizar la prueba, vuelves a cargar las pruebas para reflejar el cambio
        await fetchPruebas();
    };

    const deletePrueba = async (data: Prueba) => {
        await PruebaService.deletePrueba(data);
        // Luego de eliminar la prueba, vuelves a cargar las pruebas para reflejar el cambio
        await fetchPruebas();
    };

    return { prueba, fetchPruebas, createPrueba, updatePrueba, deletePrueba };
});
