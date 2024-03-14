<template>
    <dialog class="modal modal-bottom sm:modal-middle" :open="showModal" @close="closeModal">
      <div class="modal-box">
        <div class="content">
          <slot></slot>
        </div>
        <div class="modal-action">
          <form method="dialog">
            <!-- Botón para cerrar el modal -->
            <button class="btn" @click="closeModal">Cerrar</button>
          </form>
        </div>
      </div>
    </dialog>
  </template>

  <script setup lang="ts">
  import { defineProps, ref } from 'vue';

  const props = defineProps({
    showModal: {
      type: Boolean,
      default: false // Inicialmente, el modal está cerrado
    }
  });


  const closeModal = () => {
    // Cambia el valor de la prop showModal a falso para cerrar el modal
//    emit('close');
  };
  </script>

  <style scoped>
  /* Estilos CSS omitidos */
  </style>
