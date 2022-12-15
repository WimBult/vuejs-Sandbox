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

  <a class="block-link" href="https://161537.ao-alkmaar.nl/nederlands/index.html" target=_blank>
    <div class="component-listing">
        <img class='component-logo' alt="Vue logo" src="../assets/logo.jpeg">
        <h1 class="component-title">Videogesprek Nederlands Versie 1.0</h1>
   </div>
  </a>

    <!-- Linked naar een Word document in een onedrive folder via een koppeling link -->
  <a class="block-link" href="https://1drv.ms/w/s!AhGgwjoEDp34lFzkGME4nCVWJM7A?e=5nYibv" target=_blank>
   <div class="component-listing">
        <img class='component-logo' alt="Vue logo" src="../assets/logo_siw.jpg">
        <h1 class="component-title">Stage Specialist in websites</h1>
   </div>
  </a>
  <a class="block-link" href="https://www.facebook.com/wim.v.bult" target=_blank>
   <div class="component-listing">
        <img class='component-logo' alt="Vue logo" src="../assets/logo_facebook.png">
        <h1 class="component-title">Meer over mij weten?</h1>
   </div>
  </a>
  </div>
</template>

  <!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
.Listing-Box {
  width: 50%;
  margin-right:5%;
  display: flex;
  flex-direction: column;
}
.component-listing {
    width: 100%;
    border: 1px solid black;
    display: flex;
    margin-left: 10%;
    border-radius: 15px;    
    background-color: #34eb80;
    margin-bottom: 10px;
}

.component-title {  
    width: 100%;
    margin: auto;
}
.component-logo {
    max-width: 200px;
    max-height: 200px;
    display: flex;
    width: 50%;
    margin-left:0;
    border-radius: 15px;
    min-height: 200px;
}

.component-text {
    display: flex;
    width: 100%;
    top: 50px;
}
.block-link {
    display: block;
    text-decoration: none;
    color: black;
}

</style>



