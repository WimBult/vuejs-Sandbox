<script lang="ts">
import { Options, Vue } from 'vue-class-component';

@Options({
  props: {
    msg: String
  }
})

export default class FormComponent extends Vue {
  msg!: string
  name!: string
  email!: string
  text!: string
}

</script>

<template>
    <div id="form">
  <form>
    hallo
    <label class="form-text">Name: <input v-model="name"></label>
    <label class="form-text">Email: <input v-model="email"></label>
    <label class="form-text"> Text: <textarea rows="10" class="form-text"></textarea></label>
  </form>
</div>
</template>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
#form {
    display: flex;
    flex-direction: column;
    align-items: flex-end;
    width: 100%;
}
.form-text {
    display: flex;
    align-content: center;
    width:100% ;
}
</style>