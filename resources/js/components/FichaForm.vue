<template>
    <div>
      <h2>{{ esEdicion ? "Editar" : "Crear" }} Ficha</h2>
      <form @submit.prevent="guardarFicha">
        <input v-model="ficha.nombre" placeholder="Nombre de la ficha" required />
        <textarea v-model="ficha.contenido" placeholder="Contenido"></textarea>
        <button type="submit">{{ esEdicion ? "Actualizar" : "Guardar" }}</button>
      </form>
    </div>
  </template>
  
  <script>
  import axios from "axios";
  
  export default {
    data() {
      return {
        ficha: {
          nombre: "",
          contenido: "",
        },
        esEdicion: false,
      };
    },
    async mounted() {
      if (this.$route.params.id) {
        this.esEdicion = true;
        const response = await axios.get(`/api/fichas/${this.$route.params.id}`);
        this.ficha = response.data;
      }
    },
    methods: {
      async guardarFicha() {
        if (this.esEdicion) {
          await axios.put(`/api/fichas/${this.$route.params.id}`, this.ficha);
        } else {
          await axios.post("/api/fichas", this.ficha);
        }
        this.$router.push("/mis-fichas");
      },
    },
  };
  </script>
  