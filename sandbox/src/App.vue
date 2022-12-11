<template>

  <Home msg="Welkom bij mijn sandbox page"/>

  <PageBox />

</template>

<script lang="ts">
import { Options, Vue } from 'vue-class-component';
import Home from './components/Home.vue';
import NewComponent from './components/NewComponent.vue'
import FormComponent from './components/FormComponent.vue'
import PageBox from './components/PageBox.vue'
@Options({
  components: {
 Home, NewComponent, FormComponent, PageBox,
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
