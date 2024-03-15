import axios from 'axios';
import { Prueba } from './../interfaces/Iprueba';

export class PruebaService {

public static async  getAllPruebas(currentPage: number): Promise<Prueba[] | any> {
    try {
      const response = await axios.get('/prueba/getData?page=' + currentPage);

      console.log('service .data', response.data);
    return response.data;
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

      const response = await axios.post('/prueba_editar', prueba);
      return response.data;
    } catch (error) {
      return {'Error fetching data': error};
    }
}

public static async deletePrueba(prueba: Prueba) {
    try {
      console.log('Imprimo prueba en el servicio',prueba);
      const response = await axios.post('/prueba_eliminar',prueba);
      return response.data;
    } catch (error) {
      return {'Error fetching data': error};

    }
}
};
