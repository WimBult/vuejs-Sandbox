<template>

  <div class="PageComponentBox">
    <NewComponent/>
    <FormComponent/>
  </div>
    
  </template>

<script lang="ts">
import { Options, Vue } from 'vue-class-component';
import Home from './Home.vue';
import NewComponent from './NewComponent.vue'
import FormComponent from './FormComponent.vue'
@Options({
  components: {
 Home, NewComponent, FormComponent,
  },
})
export default class App extends Vue {}

</script>

<style scoped>
.PageComponentBox {
  display: flex;
  margin-top: 50px;
}
</style>