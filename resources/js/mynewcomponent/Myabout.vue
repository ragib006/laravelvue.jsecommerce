
<template>
  <span>

    <Myheader></Myheader>

   <div style="height:900px">
    <h2>This Is About Page</h2>
  </div>

     <Myfooter></Myfooter>

  </span>
</template>




<script>


 import Myheader from "./Myheader.vue"
 import Myfooter from "./Myfooter.vue"

    export default {

      components: {

         Myheader,
         Myfooter

       },

        mounted() {
            console.log('Hellow My First Component')
        }

    }

</script>
