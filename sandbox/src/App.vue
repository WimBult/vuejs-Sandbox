<template>

  <Home msg="Welkom bij mijn sandbox page"/>
  <NewComponent />
</template>

<script lang="ts">
import { Options, Vue } from 'vue-class-component';
import Home from './components/Home.vue';
import NewComponent from './components/NewComponent.vue'
@Options({
  components: {
 Home, NewComponent, 
  },
})
export default class App extends Vue {}






</script>



<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
