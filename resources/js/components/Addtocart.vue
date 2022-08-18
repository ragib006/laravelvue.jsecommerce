<template>
    <div>
          <!-- Main content -->
          <section class="content" style="margin-top:20px;">
            <div class="container-fluid">
              <div class="row">
                <div class="col-12">



                  <div class="card">
                    <div class="card-header">

                      <div class="main">
                        <div class="title" style="width:300px;float:left">
                      <h3 class="card-title">Cart Prouct</h3>
                      </div>

                       </div>



                    </div>



                    <!-- /.card-header -->
                    <div class="card-body" >

                      <table id="section" class="table table-bordered table-striped">


                        <thead>
                        <tr>

                           <th style="text-align:center;"> ID</th>
                           <th style="text-align:center;">Product Name</th>
                            <th style="text-align:center;">Product Price</th>
                              <th style="text-align:center;">Total</th>

                          <th style="text-align:center;">Quantity</th>



                          <th style="text-align:center;">Action</th>


                        </tr>
                        </thead>

        <tbody>

          <tr v-for="item in showalladdtocartproduct">

            <td style="text-align:center;padding-top:30px;">{{item.id}}</td>
            <td style="text-align:center;padding-top:30px;color:black;">{{item.name}}</td>
            <td style="text-align:center;padding-top:30px;color:black;">{{item.price}} TK</td>
              <!-- <td style="text-align:center;padding-top:30px;color:blue;">{{item.qty}}</td> -->
              <!-- <td style="text-align:center;padding-top:30px;color:black;"><input style="width:60px;" type="number" v-model="item.qty"></td> -->
              <td style="text-align:center;padding-top:30px;color:blue;">{{item.price *item.qty}} TK</td>

  <td style="text-align:center;padding-top:30px;color:black;">
   <form enctype="multipart/form-data" role="form" @submit.prevent = "quantityupdate(item)">

     <input type="number" style="width:60px;" name="qty" v-model="item.qty">



      <!-- <input type="number" style="width:60px;" name="qty" :value="item.qty"> -->

      <!-- <input :value="item.qty" type="text" name="qty"
        class="form-control" :class="{ 'is-invalid': form.errors.has('qty') }">
      <has-error :form="form" field="qty"></has-error> -->


      <!-- <input type="number" style="width:60px;" name="qty" :value="item.qty"> -->
      <!-- <input v-show="false" name="rowId" :value="item.rowId"> -->
        <!-- <input type="number" style="width:60px;" name="qty" :value="initValue"> -->
      <input v-show="false" name="rowId" v-model="item.rowId">

      <!-- <input type="text" style="width:60px;" name="tutle" v-model="title"> -->
      <input type="submit" value="update" class="btn btn-primary btn-sm">
   </form>
  </td>







              <!-- <td style="text-align:center;padding-top:30px;color:blue;"><input style="width:60px" type="number" class="input-number" name="" v-model="item.quantity"></td>
            <td style="text-align:center;padding-top:30px;">{{item.product_price * item.quantity}}</td>

            <td style="text-align:center"><img src="" alt="NOT FOUND" style="height:70px;width:70px;"></td> -->



           <td>
              <center>
               <!-- <router-link :to="`/view_product/${mylogo.id}`" class="btn btn-primary btn-sm" style="margin-top:17px;"><i class="fa fa-eye" aria-hidden="true"></i></router-link>
               <router-link :to="`/edit_product/${mylogo.id}`" class="btn btn-warning btn-sm" style="margin-top:17px;"><i class="fa fa-edit" aria-hidden="true"></i></router-link>
                -->
               <a class="btn btn-success btn-sm" style="margin-top:17px;" @click.prevent = "deleteproductaddtocart(item.rowId)"><i class="fa fa-trash" aria-hidden="true"></i></a>
              </center>
           </td>

         </tr>
       </tbody>


        </table>


         <form ref="anyName" enctype="multipart/form-data" role="form" @submit.prevent = "applycoupon()">

        <!-- <span><input type="text" placeholder="Enter Coupon code"><button type="submit" class="btn btn-primary">Apply</button></span> -->
          <span style="padding-top:20px;display:block;">
           <input  style="width:200px;float:left;margin-right:10px;" type="text" name="coupon_code" v-model="coupon_code" class="form-control" id="exampleInputPassword1" placeholder="Enter Coupon Amount">
           <button type="submit" class="btn btn-primary">Apply</button>
          </span>

         </form>

         <!-- <div v-if="showproduct.product_status == 1">
           <a class="btn btn-primary btn-sm" style="margin-top:17px;color:white;margin-left:42px;" @click.prevent = "activeproductoff(showproduct.id)" >OFF</a>
         </div>
         <div v-else="showproduct.product_status == 0">
           <a class="btn btn-success btn-sm" style="margin-top:17px;color:white;margin-left:42px;" @click.prevent = "unactiveproducton(showproduct.id)" >ON</a>
         </div> -->



        <div class="ra" style="margin-top:20px;margin-botton:20px;">

          <div class="ww" v-if="showdiscountamount">

            <span style="">Sub total :   {{showsubtotal}} Tk</span></br>

              <span style="">Discount :   {{showtotal-showdiscountamount}} Tk</span></br>

            <span style="">Tax :   {{showtax}} TK</span></br>
            <span style="">Total :   {{showdiscountamount}} Tk</span></br>

            <!-- <span style="">Sub total :   {{showsubtotal}} Tk</span></br>

            <span style="">Tax :   {{showtax}} TK</span></br>
            <span style="">Total :   {{showtotal}} TK</span></br> -->

          </div>

          <div class="ee" v-else="!showdiscountamount">

            <span style="">Sub total :   {{showsubtotal}} Tk</span></br>
            <span style="">Discount : 0 Tk</span></br>

            <span style="">Tax :   {{showtax}} TK</span></br>
            <span style="">Total :   {{showtotal}} TK</span></br>

               <!-- <span style="">Sub total :   {{showdiscountamount}} Tk</span></br> -->
             <!-- <span style="">Sub total :   {{showsubtotal}} Tk</span></br> -->

            <!-- <span style="">Tax :   {{showtax}} TK</span></br>
            <span style="">Total :   {{showtotal}} TK</span></br> -->

          </div>

        <router-link to="/shepping" class="btn btn-success" style="margin-top:20px;" v-if="ragibcustomerid && !ragibshippingid">Checkout</router-link>

      <router-link to="/order" class="btn btn-success" style="margin-top:20px;" v-else-if="ragibcustomerid && ragibshippingid">Checkout</router-link>

      <router-link to="/login_and_register" class="btn btn-success" style="margin-top:20px;" v-else="!ragibcustomerid && !ragibshippingid">Checkout</router-link>



        <!-- <li class="nav-item d-none d-sm-inline-block" v-if="ragibcustomerid && !ragibshippingid">
          <router-link to="/shepping" class="nav-link">Checkout</router-link>
        </li>


        <li class="nav-item d-none d-sm-inline-block" v-else-if="ragibcustomerid && ragibshippingid">
          <router-link to="/order" class="nav-link">Checkout</router-link>
        </li>


        <li class="nav-item d-none d-sm-inline-block" v-else="!ragibcustomerid && !ragibshippingid">
          <router-link to="/login_and_register" class="nav-link">Checkout</router-link>
        </li> -->







        </div>


                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
          </section>
          <!-- /.content -->


          <!-- <button type="button" name="button" @click="hakau()">Triger hakau function</button> -->


    </div>


</template>

<script>

import axios from 'axios';

    export default {


//   props:{
//
// initValue:{},
//
//   }


      data () {
        return {
          //  logos:{},
        //   cart:[],
           //my:2,
           // qty:this.qty,

           //title:'',
           showalladdtocartproduct:{},
           showsubtotal:{},
           showtax:{},
           showtotal:{},
           showdiscountamount:{},
           ragibcustomerid:{},
           ragibshippingid:{},
           coupon_code:'',
           // msg: 'My message',
           // articleId: null,

          //showallcategoryinproductpage:{},
          // Create a new form instance
          form: new Form({
                //qty:'',
              // logo_name: '',
             	// website_title: '',
              // logo_image: '',
              // logo_status:'',

          })
        }
      },




    methods:{




getcouponediscountamount(){


 axios.get('/discount_amount').then(({data}) => (this.showdiscountamount = data));

},






applycoupon(){

  axios.post('/applycoupon_formaction',{coupon_code:this.coupon_code})



  .then((response)=>{
    //clear input field
    this.coupon_code = "";
    console.log('coupon apply successfully');

   })
   .catch(()=>{

    this.coupon_code = "";
    console.log('fail');

   })

   },

deleteproductaddtocart(rowId){

    axios.get('/delate-addtocart_product/'+rowId)

  //this.$router.push('/add_product')
    .then((response)=>{

      Toast.fire({
      icon: 'success',
      title: 'Product Remove Add to Cart Successfully'
       })
          //  this.$store.dispatch("allCategory")
        this.getalladdtocartproduct();
        this.mysubtotal();
        this.mytax();
        this.mytotal();

        this.quantityupdate();


          console.log('success product delate add to cart')
        })

   .catch(()=>{

  console.log('fail');

  })



},

      quantityupdate(item){


        var product_id = item.id;
        var product_qty = item.qty;
        var product_rowid = item.rowId;


        const data = { id: product_id , qty: product_qty ,rowId: product_rowid};
      axios.post("/quantityupdate_formaction", data)
        .then(response => {
            this.deleteproductaddtocart();
          this.mysubtotal();
          this.mytax();
          this.mytotal();

            console.log(response.data);
        });


      },







// quantityupdate(item){
//
//
//
//   var product_id = item.id;
//   var product_qty = item.qty;
//
//
//   const data = { id: product_id , qty: product_qty };
// axios.post("/quantityupdate_formaction", data)
//   .then(response => {
//       console.log(response.data);
//   });
//
//
// },




             ourimage(img){

                 return "images/"+img;

             },


             getalladdtocartproduct(){
             // this.deleteproductaddtocart();
             axios.get('/all_addtocart_product').then(({data}) => (this.showalladdtocartproduct = data));

             },

             mysubtotal(){

           axios.get('/subtotal').then(({data}) => (this.showsubtotal = data));
           // this.quantityupdate();


         },
         mytax(){

           axios.get('/tax').then(({data}) => (this.showtax = data));

         },

         mytotal(){
           axios.get('/total').then(({data}) => (this.showtotal = data));
         },

         //customer_id ans shipping_id

         myragibcustomerid(){

        axios.get('/get_ragib_customer_id').then(({data}) => (this.ragibcustomerid = data));


         },

        myragibshippingid(){

        axios.get('/get_ragib_shipping_id').then(({data}) => (this.ragibshippingid = data));

        },






},

mounted(){


        this.getalladdtocartproduct();
        this.mysubtotal();
        this.mytax();
        this.mytotal();

        this.myragibcustomerid();
         setInterval(() => this.myragibcustomerid(),1000);

         this.myragibshippingid();
         setInterval(() => this.myragibshippingid(),1000);


        this.getcouponediscountamount();

        setInterval(() => this.getcouponediscountamount(),3000);

        this.quantityupdate();





},


    }
</script>
