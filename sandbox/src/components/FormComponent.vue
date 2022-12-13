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
    <a class="formTitle">Stuur mij een email!</a>
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
    width: 50%;
    background-color: #34eb80;
    border: 1px solid black;
    border-radius: 15px;
    margin-left:5%;
    margin-right: 5%;
    padding-top: 10%;
    
}
.formTitle {
  font-size: 24px;
  margin-bottom: 5px;
  
}
.form-text {
    display: flex;
    align-content: center;
    width:100% ;
}
input { 
  border: 1px solid black;
  margin-bottom: 5px;
  border-radius: 5px;
}
textarea {
  border: 1px solid black;
  margin: auto;
  border-radius: 5px;
}
.VerzendButton {
  display: flex;
  padding:10%;
  margin: auto;
  margin-top: 10% !important;
  color: black;
  background-color: white;
  border-radius: 15px;
}
.VerzendButton:hover {
  background-color: #348ceb;
  
}
</style>