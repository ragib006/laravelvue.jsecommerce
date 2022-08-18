<template>
<span>



<Mywebiteheader></Mywebiteheader>


<Mywebsiteslider></Mywebsiteslider>







<div class="container">
  <div class="fetureproduct">
     <div class="featureheader" style="width:20%;margin:10px auto;margin-top:50px;margin-bottom:50px;">

       <h3 style="font-weight:bold;font-family:tahoma;font-size:25px;margin-left:18px;color:green">Latest Product</h3>

        <h3 style="font-weight:bold;font-family:tahoma;font-size:25px;border-bottom:2px solid green"></h3>

     </div>



<div class="myproduct">

     <div class="row">

        <div class="col-md-3" v-for="v_show in getallProduct">
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








<div class="container">
  <div class="row">
      <div class="col-lg-12">
          <div class="section-title">
              <!-- <h2>Featured Product</h2> -->



            <div class="featureheader" style="width:20%;margin:10px auto;margin-top:50px;margin-bottom:50px;">

                <h3 style="font-weight:bold;font-family:tahoma;font-size:25px;margin-left:30px;color:green;">Best Product</h3>

                 <h3 style="font-weight:bold;font-family:tahoma;font-size:25px;border-bottom:2px solid green"></h3>

              </div>





          </div>

      </div>
  </div>
  <div class="bb" style="margin-left:40px;">

<carousel :items="4" :autoplay="true" :loop="true" :nav="false" :dots="false" style="margin-left:20px;" v-if="shownewproduct.length">

<img class="backhover" style="" v-for="new_product in shownewproduct" :src="ourimage(new_product.product_image)" alt="" style="width:200px;height:200px;">






  </carousel>

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

           // letestproduct:{},



            shownewproduct:{},

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


      //show all product_id

      showwebsitefeatureproduct(){

      axios.get('/show_website_letest_product').then((res) =>{
          //  console.log(res.data)
      this.letestproduct = res.data.letestproduct


      })


   },

   //shownewproduct


   showwebitenewproduct(){

   axios.get('/show_website_new_product').then((res) => {
       //  console.log(res.data)
   this.shownewproduct = res.data.shownewproduct




   })

 }








},


computed:{


getallProduct(){


  return this.$store.getters.getProduct


}




},




  mounted(){


        //  this.showwebsitefeatureproduct();

         this.showwebitenewproduct();

         this.$store.dispatch("allProducts");



        }
    }
</script>
