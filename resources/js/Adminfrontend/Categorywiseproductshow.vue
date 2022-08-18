<template>
<span>



<Mywebiteheader></Mywebiteheader>




<div class="container" style="margin-bottom:50px;background:#333333;margin-top:20px;margin-bottom:80px;">

<!-- <div class="bb" style="height:150px;width:100px;margin:20px auto"> -->

<!-- <h2 style="color:white;font-family:tahoma;font-weight:bold;margin-left:400px;padding-top:56px;display:block;font-size:27px;">{{categoryinfo.category_name}}</h2>
 -->

<center>
  <div style="height:150px;width:500px;">
<h2 style="padding-top:55px;color:white;font-family:tahoma;font-weight:bold;">{{categoryinfo.category_name}}</h2>
</div>

</center>

<!-- </div> -->

</div>




<div class="container">
  <div class="fetureproduct">
     <!-- <div class="featureheader" style="width:20%;margin:10px auto;margin-top:50px;margin-bottom:50px;">

       <h3 style="font-weight:bold;font-family:tahoma;font-size:25px;margin-left:18px;color:green">Latest Product</h3>

        <h3 style="font-weight:bold;font-family:tahoma;font-size:25px;border-bottom:2px solid green"></h3>

     </div> -->



<div class="myproduct">

     <div class="row">


       <div class="col-md-3" v-for="v_show in categoryproduct">
         <div class="card" style="width: 16rem;height:350px;">
             <img :src="ourimage(v_show.product_image)" style="height:160px;" class="card-img-top" alt="">

              <!-- <td style="text-align:center"><img :src="ourimage(v_cat.product_image)" alt="" style="height:70px;width:70px;"></td> -->
           <div class="card-body">

           <h5 class="card-title" style="text-align:center;">{{v_show.product_name}}</h5>

           <span style="font-weight:bold;font-size:18px;margin-left:41px;">Price - </span><span style="font-weight:bold;font-size:18px;margin-left:10px;color:green;">{{v_show.product_price}} TK</span>

           <p class="card-text"></p>
           <router-link :to="`/view_webite_product_details/${v_show.product_id}`" class="btn btn-outline-success" style="margin-left:52px;position:fix;">View Product</router-link>
           </div>
         </div>
       </div>









    </div>

  </div>

  </div>
</div>
























  <Mybackendfooter></Mybackendfooter>



</span>
</template>

<script>

import carousel from 'vue-owl-carousel'

 import Mywebiteheader from "./Websiteheader.vue"
 import Mywebsiteslider from "./Websiteslider.vue"
  import Mybackendfooter from "./Websitefooter.vue"

    export default {


      data () {
        return {

        // categoryproduct:{},

         categoryinfo:{},
         categoryproduct:{},



        //    shownewproduct:{},

          // Create a new form instance
          form: new Form({



          })
        }
      },




      components: {
         carousel,
         Mywebiteheader,
         Mywebsiteslider,
         Mybackendfooter,

       },



    methods:{


      ourimage(img){

              return "/images/"+img;

          },




          categorywiseproductshow(){

         axios.get('/my_category_wise_product_show/'+this.$route.params.id).then((res) => {

          // console.log(res.data)
          this.categoryproduct = res.data.categoryproduct,
          this.categoryinfo = res.data.categoryinfo



         })

       },


      //show all product_id

   //    showwebsitefeatureproduct(){
   //
   //    axios.get('/show_website_letest_product').then((res) =>{
   //
   //    this.letestproduct = res.data.letestproduct
   //
   //
   //    })
   //
   //
   // },

   //shownewproduct

 //
 //   showwebitenewproduct(){
 //
 //   axios.get('/show_website_new_product').then((res) => {
 //
 //   this.shownewproduct = res.data.shownewproduct
 //
 //
 //
 //
 //   })
 //
 // }








},


computed:{


},




  mounted(){

           this.categorywiseproductshow();
           setInterval(() => this.categorywiseproductshow(),3000);
        //  this.showwebsitefeatureproduct();

        //  this.showwebitenewproduct();



        }
    }
</script>
