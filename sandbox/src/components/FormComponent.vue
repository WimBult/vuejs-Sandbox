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
    <label class="form-text">Name: </label>
      <input class="FormName"  v-model="name">
    <label class="form-text">Email:</label>
     <input class="FormEmail" v-model="email">
    <label class="form-text"> Text: </label>
    <textarea rows="10" class="FormTextbox"></textarea>
    <button class="VerzendButton"> Verzenden</button>
  </form>
</div>
</template>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
#form {
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 100%;
}
.form-text {
    display: flex;
    align-content: center;
    width:100% ;
}
input { 
  border: 1px solid black;
  margin-bottom: 5px;
}
textarea {
  border: 1px solid black;
  margin: auto;
}
.VerzendButton {
  display: flex;
}
</style>