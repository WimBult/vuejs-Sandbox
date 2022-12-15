<script lang="ts">
import { Options, Vue } from 'vue-class-component';

@Options({
  props: {
    msg: String
  }
})
export default class FooterComponent extends Vue {
  msg!: string
}

</script>

<template>
  <footer>
    <div class="footerBox"> 
      <a> Copyright Wim van de Bult </a>
    </div>
  </footer>

</template>


<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

.footerBox {
    width: 100%;
    margin-top: 100px;
    border-top: 1px solid black;
    background-color: #34eb80;
    max-height: 100px; 
    min-height: 100px;
    bottom: 0px;
    position: fixed;
    display:flex; 
    flex-direction:column; 
    justify-content:space-between;
}
a {
  margin: auto;
}
</style>