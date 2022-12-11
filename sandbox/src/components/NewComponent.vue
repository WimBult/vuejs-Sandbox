<script lang="ts">
import { Options, Vue } from 'vue-class-component';

@Options({
  props: {
    msg: String
  }
})
export default class NewComponent extends Vue {
  msg!: string
}


</script>

<template>
<div class="Listing-Box">
    <div class="component-listing">
        <img class='component-logo' alt="Vue logo" src="../assets/logo.png">
        <h1 class="component-title">A New Component</h1>
   </div>
   <div class="component-listing">
        <img class='component-logo' alt="Vue logo" src="../assets/logo.png">
        <h1 class="component-title">A New Component</h1>
   </div>
   <div class="component-listing">
        <img class='component-logo' alt="Vue logo" src="../assets/logo.png">
        <h1 class="component-title">A New Component</h1>
   </div>
  </div>
</template>

  <!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
.Listing-Box {
  width: 100%;
}
.component-listing {
    width: 100%;
    border: 1px solid black;
    display: flex;
    margin-left: 0px;
    margin-bottom: 10px;
    border-radius: 15px;
}
.component-title {  
    width: 100%;
}
.component-logo {
    max-width: 250px;
    max-height: 250px;
    display: flex;
    width: 50%;
    margin-left:15px;
}

.component-text {
    display: flex;
    width: 100%;
    top: 50px;
}

</style>



