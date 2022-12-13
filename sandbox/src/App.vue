<template>
  <HeaderComponent />

  <Home msg="Sandbox Page"/>

  <PageBox />

  <FooterComponent />
</template>

<script lang="ts">
import { Options, Vue } from 'vue-class-component';
import HeaderComponent from './components/HeaderComponent.vue';
import Home from './components/Home.vue';
import NewComponent from './components/NewComponent.vue'
import FormComponent from './components/FormComponent.vue'
import PageBox from './components/PageBox.vue'
import FooterComponent from './components/FooterComponent.vue';
@Options({
  components: {
 HeaderComponent, Home, NewComponent, FormComponent, PageBox, FooterComponent,
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
