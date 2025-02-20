<template>
    <div>
      <h2>Mis Fichas</h2>
      <button @click="crearFicha">Crear Ficha</button>
      <ul>
        <li v-for="ficha in fichas" :key="ficha.id">
          <strong>{{ ficha.nombre }}</strong>
          <button @click="editarFicha(ficha)">Editar</button>
          <button @click="eliminarFicha(ficha.id)">Eliminar</button>
        </li>
      </ul>
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
    methods: {
      async obtenerFichas() {
        const response = await axios.get("/api/fichas");
        this.fichas = response.data;
      },
      crearFicha() {
        this.$router.push("/crear-ficha");
      },
      editarFicha(ficha) {
        this.$router.push(`/editar-ficha/${ficha.id}`);
      },
      async eliminarFicha(id) {
        await axios.delete(`/api/fichas/${id}`);
        this.obtenerFichas();
      },
    },
    mounted() {
      this.obtenerFichas();
    },
  };
  </script>
  