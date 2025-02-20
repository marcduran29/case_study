<template>
    <div class="container mx-auto">
      <h1 class="text-2xl font-bold">Bienvenido, Profesor</h1>
      <p>Aquí puedes crear nuevas fichas.</p>
  
      <form @submit.prevent="crearFicha">
        <input v-model="nombre" placeholder="Nombre de la ficha" required />
        <textarea v-model="contenido" placeholder="Contenido"></textarea>
        <button type="submit">Crear Ficha</button>
      </form>
  
      <ul v-if="fichas.length">
        <li v-for="ficha in fichas" :key="ficha.id">
          <strong>{{ ficha.nombre }}</strong>: {{ ficha.contenido }}
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
        nombre: "",
        contenido: "",
      };
    },
    mounted() {
      axios.get("/fichas").then((response) => {
        this.fichas = response.data;
      });
    },
    methods: {
      crearFicha() {
        axios
          .post("/fichas", {
            nombre: this.nombre,
            contenido: this.contenido.split("\n"),
          })
          .then(() => {
            this.nombre = "";
            this.contenido = "";
            this.mounted();
          });
      },
    },
  };
  </script>
  