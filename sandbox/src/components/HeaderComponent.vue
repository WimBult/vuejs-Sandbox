<script lang="ts">
import { Options, Vue } from 'vue-class-component';

@Options({
  props: {
    msg: String
  }
})
export default class HeaderComponent extends Vue {
  msg!: string
}

</script>

<template>

    <div class="headerBox">
        <img class='headerLogo' alt="Vue logo" src="../assets/logo_black.png" />
        <div class="headerNavBar">
        <a href="https://www.horizoncollege.nl/">School</a>
        <a href="http://126086.ao-alkmaar.nl/">Opdrachten</a>
        <a Href="tel:=0611459255">Telefoon</a>
        </div>
    </div>
    

</template>


<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

.headerBox{
    background-color: white;
    border-bottom: 1px solid black;
    width: 110%;
    display: flex;
    max-height: 20%;
    background-color: #34eb80;
    position: fixed;
    top: 0;
    margin-bottom: 200px;

}
.headerLogo {
    display: flex;
    margin-left: 4%;
    margin-bottom: 10px;
    margin-top: 10px;
    max-width: 75px;
}
.headerNavBar {
    display:flex;
    flex-direction: row;
    margin:auto;
    margin-right: 5% !important;
}
a {
    font-size: 28px;
    margin-left: 10px;
    margin-right: 10px;
    font:helvetica;
    font-family: Avenir, Helvetica, Arial, sans-serif;
    border-bottom: 0px;
    text-decoration:none;
    color: black;
}
a:hover {
    color:#34eb80;
}


</style>