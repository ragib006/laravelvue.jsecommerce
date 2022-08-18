<template>
<span>
  <div class="container">

    <div class="row" style="margin-top:20px;">
      <div class="col-md-3" v-for="showproduct in shopeproduct">

      <div class="card" >
       <!-- <img src="" class="card-img-top" alt="not found"> -->
       <img :src="ourimage(showproduct.product_image)" alt="" style="max-width:60%;margin-left:50px;" class="card-img-top">
       <div class="card-body">
       <h5 class="" style="text-align:center">{{showproduct.product_name}}</h5>
        <p class="" style="text-align:center">{{showproduct.product_price}} TK</p>
        <center>
       <router-link :to="`/view_product_addtocart/${showproduct.id}`" class="btn btn-primary" style="margin-left:">Add to Cart</router-link>
        <!-- <a class="btn btn-primary btn-sm" style="margin-top:17px;" @click.prevent = "addToCart(shopeproduct)"><i class="fa fa-trash" aria-hidden="true"></i></a> -->
      </center>
      </div>
     </div>

   </div>




    </div>




  </div>
</span>
</template>

<script>

    export default {


      data () {
        return {

          shopeproduct:{},

          // Create a new form instance
          form: new Form({
            //
            // cat_name: '',
            // cat_url: '',
            // cat_addedby: '',
            //
            // cat_status : '',

          })
        }
      },





    methods:{
      //show all category
              allshopeproduct(){
               axios.get('/allproduct').then(({data}) => (this.shopeproduct = data));
             },


             ourimage(img){

                 return "images/"+img;

             },

             addToCart(shopeproduct){

                console.log(shopeproduct);

             }



          

},


      mounted() {

          this.allshopeproduct()

        }
    }
</script>
