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

    <div class="footerBox"> </div>

</template>


<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

.footerBox {
    width: 100%;
    margin-top: 100px;
    min-height: 100px;
    border-top: 1px solid black;
   /* background-color:#34eb80 ; */
}

</style>