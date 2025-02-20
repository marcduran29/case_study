<template>
    <div class="container mx-auto">
      <h1 class="text-2xl font-bold">Bienvenido, Estudiante</h1>
      <p>Aquí puedes ver las fichas asignadas a ti.</p>
  
      <ul v-if="fichas.length">
        <li v-for="ficha in fichas" :key="ficha.id">
          <strong>{{ ficha.nombre }}</strong>: {{ ficha.contenido }}
        </li>
      </ul>
      <p v-else>No hay fichas asignadas.</p>
    </div>
  </template>
  
  <script>
  import axios from "axios";
  
  export default {
    data() {
      return {
        fichas: [],
      };
    },
    mounted() {
      axios.get("/fichas").then((response) => {
        this.fichas = response.data;
      });
    },
  };
  </script>
  