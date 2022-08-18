<template>
    <div>



      <Mybackendheader></Mybackendheader>
      <MyBackendsidebar></MyBackendsidebar>




  <section class="content" style="margin-left:250px;margin-top:20px;margin-bottom:130px;">
    <div class="container-fluid">
       <div class="row">
         <div class="col-12">







           <div class="invoice p-3 mb-3">
      <!-- title row -->

      <div class="allaol" style="">
      <div class="row">
        <div class="col-12" style="margin-bottom:30px;">
          <h4>
            <i class="fas fa-file-invoice"></i><span style="margin-left:10px;">Invoice</span>
            <small class="float-right">Order Date: {{orderinfo.order_date}}</small>
          </h4>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info" style="margin-bottom:60px;">

        <div class="col-sm-7 invoice-col" style="font-family:tahoma;margin-bottom:40px;">
          <p style="font-weight:bold;font-size:22px;">Customer Information</p>
          <span style="color:black;font-weight:bold;margin-left:10px;">Customer Id :</span><span style="margin-left:10px;">{{orderinfo.customer_id}}</span></br>
          <span style="color:black;font-weight:bold;margin-left:10px;">Customer Name :</span><span style="margin-left:10px;">{{orderinfo.customer_name}}</span></br>
          <span style="color:black;font-weight:bold;margin-left:10px;">Customer Email :</span><span style="margin-left:10px;">{{orderinfo.customer_email}}</span></br>
          <span style="color:black;font-weight:bold;margin-left:10px;"> Customer District :</span><span style="margin-left:10px;">{{orderinfo.customer_districk}}</span></br>
          <span style="color:black;font-weight:bold;margin-left:10px;"> Customer Address :</span><span style="margin-left:10px;">{{orderinfo.customer_address}}</span></br>
          <span style="color:black;font-weight:bold;margin-left:10px;"> Customer Mobile :</span><span style="margin-left:10px;">{{orderinfo.customer_mobile_number}}</span></br>
        </div>
        <!-- /.col -->
        <div class="col-sm-5 invoice-col" style="font-family:tahoma;margin-bottom:40px;">
          <p style="font-weight:bold;font-size:22px;">Shipping Information</p>
          <span style="color:black;font-weight:bold;margin-left:10px;">Shipping Id :</span><span style="margin-left:10px;">{{orderinfo.shipping_id}}</span></br>
          <span style="color:black;font-weight:bold;margin-left:10px;">Shipping Name :</span><span style="margin-left:10px;">{{orderinfo.shipping_name}}</span></br>
          <span style="color:black;font-weight:bold;margin-left:10px;">Shipping Email :</span><span style="margin-left:10px;">{{orderinfo.shipping_email}}</span></br>
          <span style="color:black;font-weight:bold;margin-left:10px;">Shipping District :</span><span style="margin-left:10px;">{{orderinfo.shipping_districk}}</span></br>
          <span style="color:black;font-weight:bold;margin-left:10px;">Shipping Address :</span><span style="margin-left:10px;">{{orderinfo.shipping_address}}</span></br>
          <span style="color:black;font-weight:bold;margin-left:10px;">Shipping Mobile :</span><span style="margin-left:10px;">{{orderinfo.shipping_mobile_number}}</span></br>
        </div>

      </div>
    </div>




     <div class="table-responsive" style="margin-bottom:50px;">

        <table class="table responsive" style="font-family:tahoma;margin-bottom:40px;">
        <thead>
          <tr>
            <th scope="col" style="text-align:center;">Sl</th>
            <th scope="col" style="text-align:center;">Product Id</th>
            <th scope="col" style="text-align:center;">Image</th>
            <th scope="col" style="text-align:center;">Product</th>
            <th scope="col" style="text-align:center;">Price</th>
            <th scope="col" style="text-align:center;">Color</th>

            <th scope="col" style="text-align:center;">Quantity</th>
            <th scope="col" style="text-align:center;">Size</th>
            <th scope="col" style="text-align:center;">Total</th>


          </tr>
        </thead>
        <tbody>

             <tr v-for="(cart_product,index) in orderproduct">

              <td><p style="margin-top:20px;color:black;font-size:16px;;font-family:tahoma;text-align:center;">{{index+1}}</p></td>
            <td><p style="margin-top:20px;color:black;font-size:16px;;font-family:tahoma;text-align:center;">{{cart_product.my_product_id}}</p></td>
            <td style="text-align:center;"><img :src="ourimage(cart_product.my_product_image)" alt="" style="height:70px;width:70px;"></td>

            <td style="text-align:center;"><p style="margin-top:20px;color:black;font-size:16px;;font-family:tahoma;">{{cart_product.my_product_name}}</p></td>

            <td style="text-align:center;"><p style="margin-top:20px;color:black;font-size:16px;;font-family:tahoma;">{{cart_product.my_product_price}} TK</p></td>

             <td style="text-align:center;"><p style="margin-top:20px;color:black;font-size:16px;;font-family:tahoma;">{{cart_product.my_product_color}}</p></td>

             <td style="text-align:center;"><p style="margin-top:20px;color:black;font-size:16px;;font-family:tahoma;">{{cart_product.my_product_quantity }}</p></td>
             <td style="text-align:center;"><p style="margin-top:20px;color:black;font-size:16px;;font-family:tahoma;">{{cart_product.my_product_size}}</p></td>



             <td style="text-align:center;"><p style="margin-top:20px;color:black;font-size:16px;;font-family:tahoma;">{{cart_product.my_product_price * cart_product.my_product_quantity }} TK</p></td>







           </tr>





        </tbody>
      </table>
    </div>



      <!-- /.row -->

      <div class="row">

      <div class="col-6">


<!--

        <span>
          <button style="margin-top:330px;"type="submit" class="btn btn-success"  @click.prevent = "mypendingordersuccess(orderinfo.order_id)">Take Order</button>
        </span>

-->

    

        <span v-if="orderinfo.order_status == 0">
          <button style="margin-top:330px;"type="submit" class="btn btn-success"  @click.prevent = "mypendingordersuccess(orderinfo.order_id)">Take Order</button>
        </span>

        <span v-else="orderinfo.order_status == 1">
      
          <p style="background:red;color:white;padding:5px 5px 5px 5px;width:300px;padding-left:33px;font-weight:bold;margin-top:100px;">This order Already Take By Admin</p>
        </span>









      </form>

        </div>



        <!-- /.col -->
        <div class="col-6 float-right">
          <p class="lead"></p>

          <div class="table-responsive " style="font-family:tahoma">





            <table class="table">
              <tr>
                <th style="width:50%;">Subtotal</th>
                <td style="">{{orderinfo.order_sub_total}}</td>
              </tr>
              <tr>
                <th>Discount</th>
                <td>{{orderinfo.order_discount}} TK</td>

              </tr>

              <tr>
                <th>Tax</th>
                <td>{{orderinfo.order_vat}} TK</td>
              </tr>
              <tr>
                <th>Total</th>
                <td>{{orderinfo.order_total}} TK</td>

              </tr>


            </table>

















            <button onclick="window.print()" type="button" class="btn btn-primary float-right" style="margin-right: 5px;margin-top:107px;">
              Generate PDF
            </button>





          </div>
        </div>
        <!-- /.col -->
      </div>


    </div>

















































                </div>

              </div>

            </div>

          </section>



          <!-- <Mybackendfooter></Mybackendfooter> -->



    </div>
</template>

<script>


  import Mybackendheader from "./Adminheader.vue"
  import MyBackendsidebar from "./Adminsidebar.vue"

    // import Mybackendfooter from "./Adminfooter.vue"

     export default {


         data() {
         return {

         orderinfo:{},
         orderproduct:{},


           // Create a new form instance
           form: new Form({

                  	id: '',
              	    category_name: '',
              	    category_type: '',
                    category_added_date:'',
                    category_url:'',
                    category_status:'',
                 //cat_status: '',


           })
         }
       },




       components: {
          MyBackendsidebar,
          Mybackendheader,
          // Mybackendfooter,
        },



     methods:{



      ourimage(img){

return "/images/"+img;

},

       VieworderDetails(){

       axios.get('/display_my_website_order_details/'+this.$route.params.order_id).then((res) => {

         this.orderinfo = res.data.orderinfo,
         this.orderproduct = res.data.orderproduct





       })


    },


//mypendingordersuccess


mypendingordersuccess(order_id){

  axios.get('/admin_pending_order_success/'+order_id)
  .then((response)=>{



      //console.log(response.data)


   this.$router.push('/show_all_order')

      Toast.fire({
     icon: 'success',
     title: 'Admin Take Order Successfully'
     })



   })

   },




  //unactive category on
    // unactivecategoryon(id){
    //
    //   axios.get('/unactive_category_active/'+id)
    //   .then((response)=>{
    //
    //     Toast.fire({
    //     icon: 'success',
    //     title: 'Category Active Successfully'
    //    })
    //
    //    this.allcategory();
    //
    //
    //
    //    })
    //
    //  },
    //









 },


 computed:{


 },




         mounted() {


           this.VieworderDetails();

        //    this.showallorder();
           // this.showallcategoryinform();
           // this.allcategory();



         }
     }
 </script>
