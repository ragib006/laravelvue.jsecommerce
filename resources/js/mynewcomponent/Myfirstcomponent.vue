
<template>
  <span>

    <Myheader></Myheader>

   <div style="height:900px;margin-top:50px">

     <div class="container">

       <table class="table">
     <thead>
       <tr>
         <th scope="col">Sl</th>
         <th scope="col">Package Id</th>
         <th scope="col">Package Name</th>
         <th scope="col">Package Price</th>
       </tr>
     </thead>
     <tbody>



       <tr v-for="(v_cat,index) in myallpackagestore">
            <th>{{index+1}}</th>
            <td>{{v_cat.package_id}}</td>
         <td>{{v_cat.package_name}}</td>

         <td>{{v_cat.package_price}} TK</td>
       </tr>

     </tbody>
   </table>

     </div>
  </div>

     <Myfooter></Myfooter>

  </span>
</template>




<script>


 import Myheader from "./Myheader.vue"
 import Myfooter from "./Myfooter.vue"

    export default {




      data() {
      return {

        myallpackagestore:{},

      }
    },


      components: {

         Myheader,
         Myfooter

       },



       methods:{

            allpackage(){

        axios.get('/my_all_package_get').then(({data}) => (this.myallpackagestore = data));

      //    console.log('hi ragib');

         }


       },

        mounted(){

          this.allpackage()

        //  console.log('abauhdsbhfsdfbhsdhvfd')
        }

    }

</script>
