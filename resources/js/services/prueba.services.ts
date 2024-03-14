import axios from 'axios';
import { Prueba } from './../interfaces/Iprueba';

export class PruebaService {

public static async  getAllPruebas(currentPage: { value: number }, paginas: { value: number }, pruebas: { value: Prueba[] }): Promise<Prueba[] | any> {
    try {
      const response = await axios.get('/prueba/getData?page=' + currentPage.value);
      paginas.value = response.data.last_page;
      pruebas.value = response.data.data;

    return response.data.data;
    } catch (error) {
      //console.error('Error fetching data:', error);
      return {'Error fetching data': error};
    }
}

public static async  createPrueba(prueba: Prueba) {
    try {
      const response = await axios.post('/prueba/create', prueba);
      return response.data;
    } catch (error) {
      return {'Error fetching data': error};
    }
}


public static async  updatePrueba(prueba: Prueba) {
    try {
      const response = await axios.put('/prueba/update/' + prueba.id_prueba, prueba);
      return response.data;
    } catch (error) {
      return {'Error fetching data': error};
    }
}

public static async deletePrueba(prueba: Prueba) {
    try {
      const response = await axios.post('/prueba_eliminar',prueba);
      return response.data;
    } catch (error) {
      return {'Error fetching data': error};

    }
}
};
