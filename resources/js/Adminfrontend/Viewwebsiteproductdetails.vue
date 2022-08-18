<template>
<span>



<Mywebiteheader></Mywebiteheader>




<div class="container" style="margin-bottom:50px;background:#333333;margin-top:20px;">

  <div class="bb" style="height:150px;width:100%;background:">

  <h2 style="color:white;font-family:tahoma;font-weight:bold;margin-left:430px;padding-top:53px;"> Product Details</h2>

  </div>

</div>



<div class="container">

   <div class="row">

      <div class="col-md-4">

          <div class="myproductimage">

        <!-- <img src="/images/1618901191.png" style="height:450px;width:450px;" class="card-img-top" alt=""> -->

          <img :src="ourimage(webiteproductdetails.product_image)" style="height:450px;width:450px;" class="card-img-top" alt="">

          </div>

      </div>


      <div class="col-md-8">

          <div class="productdescription" style="margin-left:100px;margin-top:50px;">

              <span style="font-weight:bold;color:black;font-size:20px;font-family:sans-serif;">Product Name : </span><span style="font-weight:bold;color:green;font-size:20px;font-family:tahoma">{{webiteproductdetails.product_name}}</span></br>
              <span style="font-weight:bold;color:black;font-size:20px;font-family:sans-serif;">Product Price : </span><span style="font-weight:bold;color:green;font-size:20px;font-family:tahoma">{{webiteproductdetails.product_price}} TK</span></br>
              <span style="font-weight:bold;color:black;font-size:20px;font-family:sans-serif;">Product Code : </span><span style="font-weight:bold;color:green;font-size:20px;font-family:tahoma">{{webiteproductdetails.product_code}}</span></br>
              <span style="font-weight:bold;color:black;font-size:20px;font-family:sans-serif;">Category Name : </span><span style="font-weight:bold;color:green;font-size:20px;font-family:tahoma">{{webiteproductdetails.category_name}}</span></br>



              <div v-if="mystock == 1">
                 <span style="font-weight:bold;color:black;font-size:20px;font-family:sans-serif;">Stock : </span>
                  <span style="color:white;font-size:16px;font-family:tahoma;background:green;padding:4px 7px;border-radius:2px;">In stock</span></br>


                <form enctype="multipart/form-data" role="form" @submit.prevent = "addtocartproduct(webiteproductdetails)">

                  <span style="margin-top:0px;display:block;float:left;margin-right:20px;">

                         <select  v-model="size_id" class="form-control" id="exampleFormControlSelect1" name="size_id"  style="width:110px;" required>
                                 <option value="" disabled>Size</option>

                                 <option style="color:green;font-weight:bold;" v-for="selectsize in allsize" :value="selectsize.size_id">{{selectsize.size_name}}</option>

                           </select>

                 </span>



                 <span style="margin-top:20px;display:block">

                        <select  v-model="color_id" class="form-control" id="exampleFormControlSelect1" name="color_id"  style="width:110px;" required>
                                <option value="" disabled>Color</option>

                                <option style="color:green;font-weight:bold;" v-for="selectcolor in allcolor" :value="selectcolor.color_id">{{selectcolor.color_name}}</option>


                          </select>


                </span></br>


              <div class="mb-3">

                <span><input name="my_product_quantity" v-model="my_product_quantity" type="number" min="1" style="background:#F3F6FB;border:none;width:80px;height:40px;padding-left:30px;"></span>

                <span style="margin-left:15px;"><button type="submit" class="btn btn-success" style="margin-top:-4px;">Add To Cart</button></span>

                </div>


                </form>







              </div>





              <div v-else>
                 <span style="font-weight:bold;color:black;font-size:20px;font-family:sans-serif;">Stock : </span>
                  <span style="color:white;font-size:16px;font-family:tahoma;background:red;padding:4px 7px;border-radius:2px;">Out stock</span>

              </div>














          </div>






      </div>

   </div>




   <div class="container" style="margin-top:40px;">


     <span style="margin-bottom:30px;display:block;">

          <h3 style="font-weight:bold;color:black;font-family:sans-serif;">Product Description</h3>

     </span>


     <div class="des" style="width:100%;">

       <p style="text-align:justify;font-family:tahoma;font-size:17px;">{{webiteproductdetails.product_description}}</p>

     </div>



   </div>





</div>

















  <Mybackendfooter></Mybackendfooter>



</span>
</template>

<script>


 import Mywebiteheader from "./Websiteheader.vue"

  import Mybackendfooter from "./Websitefooter.vue"

    export default {


      data () {
        return {


          size_id:'',
          color_id:'',
          my_product_quantity:1,

            //letestproduct:{},
            //shownewproduct:{},
            webiteproductdetails:{},
            mystock:{},
            allsize:{},
            allcolor:{},
            productid:{},

          // Create a new form instance
          form: new Form({



          })
        }
      },




      components: {
        //carousel,
         Mywebiteheader,

         Mybackendfooter,

       },



    methods:{



      addtocartproduct(webiteproductdetails){

      axios.post('/add_to_cart_product_form_action',{my_product_quantity:this.my_product_quantity,productid:
      webiteproductdetails.product_id,size_id:this.size_id,color_id:this.color_id})

         .then((response)=>{




        //  console.log(response.data)



          if(response.data==0){

            Toast.fire({
            icon: 'error',
            title: 'Sorry Product Stock Is So Low'

             })



              }


        else if(response.data==1){

          Toast.fire({
          icon: 'success',
          title: 'Product Add To Cart Successfully'

           })

        this.$router.push('/diplay_addtocart_producart')

        }else{


                 console.log(response.data)

                 }

           })
           .catch(()=>{

             console.log('error');

           })



      },













      ourimage(img){

              return "/images/"+img;

          },


      //show all product_id

      productdetails(){

      axios.get('/website_product_details_information/'+this.$route.params.product_id).then((res) => {
        //  console.log(res.data)
       this.webiteproductdetails = res.data.webiteproductdetails

       this.mystock = res.data.mystock

      })


   },

   showallproductsize(){

   axios.get('/show_allproductsize_inwebsite/'+this.$route.params.product_id).then((res) => {
       // console.log(res.data)
     this.allsize = res.data.allsize

   })


   },


   showallproductcolor(){

   axios.get('/show_allproductcolor_inwebsite/'+this.$route.params.product_id).then((res) => {
       // console.log(res.data)
     this.allcolor = res.data.allcolor

   })


   },












},


computed:{


},




        mounted(){

            this.productdetails();
            this.showallproductsize();
            this.showallproductcolor();



        }
    }
</script>
