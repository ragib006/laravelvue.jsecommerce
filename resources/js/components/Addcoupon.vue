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
                      <h3 class="card-title">All Coupon</h3>
                      </div>
                      <div class="but">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" style="margin-left:670px;">
                            Add Coupon
                          </button>
                        </div>

                       </div>


                       <!-- <form class="form-search">
                         <input placeholder="Type something" @keyup.enter="searchit" v-model="search" type="text" class="input-medium search-query">
                         <button @click="searchit" class="btn btn-square btn-theme">Search</button>
                       </form> -->



                          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content" style="width:550px;">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Add Coupon</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">


        <form enctype="multipart/form-data" role="form" @submit.prevent = "addcoupon()">



          <div class="form-group">
            <label for="exampleInputPassword1">Coupon Code</label>
            <input type="text" class="form-control" v-model="coupon_code" name="coupon_code" id="exampleInputPassword1" placeholder="Enter Coupon Code">
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Coupon Amount</label>
            <input type="text" v-model="amount" name="amount" class="form-control" id="exampleInputPassword1" placeholder="Enter Coupon Amount">
          </div>

          <div class="form-group">
           <label for="exampleFormControlSelect1">Amount Type</label>
           <select class="form-control" name="amount_type" v-model="amount_type"  id="exampleFormControlSelect1" required>
             <option>Select</option>
             <option value="Percentge">Percentge</option>
             <option value="Fixed">Fixed</option>

        </select>
      </div>

    <!-- <div class="form-group">
  <label for="exampleInputPassword1">Expire Date</label>
  <datepicker v-model="expiry_date" name="expiry_date"  id="exampleInputPassword1" format="dd-MM-yyyy"></datepicker>
 </div> -->

 <!-- <div class="form-group">
   <label for="exampleInputPassword1">Date Formate </label>
   <input type="date" v-model="expiry_date" name="expiry_date" class="form-control" id="exampleInputPassword1" placeholder="01-9-2020">
 </div> -->

 <div class="form-group">
   <label for="exampleInputPassword1">Date Formate </label>
   <input type="text" v-model="expiry_date" name="expiry_date" class="form-control" id="exampleInputPassword1" placeholder="01-9-2020">
 </div>


          <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Done</button>
          </div>
       </form>

                              </div>
                            </div>
                          </div>

                         </div>




                    </div>


                    <!-- /.card-header -->
                    <div class="card-body" >

                      <table id="section" class="table table-bordered table-striped">



                        <thead>
                        <tr>

                           <th style="text-align:center;">Product ID</th>
                           <th style="text-align:center;">Product Name</th>

                           <th style="text-align:center;">Category Name</th>




                           <th style="text-align:center;">Quntity</th>
                           <th style="text-align:center;">price</th>
                          <th style="text-align:center;">Image</th>
                          <th style="text-align:center;">Status</th>
                          <th style="text-align:center;">ON/OFF</th>

                          <th style="text-align:center;">Action</th>


                        </tr>
                        </thead>


        <tbody>

          <tr v-for="asvarible in showallcoupon">

            <td style="text-align:center;padding-top:30px;">{{asvarible.id}}</td>
            <td style="text-align:center;padding-top:30px;color:blue;">{{asvarible.coupon_code}}</td>
            <td style="text-align:center;padding-top:30px;">{{asvarible.amount}}</td>
            <td style="text-align:center;padding-top:30px;">{{asvarible.amount_type}}</td>
            <td style="text-align:center;padding-top:30px;">{{asvarible.expiry_date}}</td>
            <!-- <td style="text-align:center"><img :src="ourimage(showproduct.product_image)" alt="" style="height:70px;width:70px;"></td> -->
            <td style="text-align:center;padding-top:30px;">dfvdfv TK</td>
            <td>
               <!-- <div v-if="showproduct.product_status == 1">
                 <p style="text-align:center;color:blue;padding-top:18px">Active</p>
               </div>
               <div v-else="showproduct.product_status == 0">
                 <p style="text-align:center;color:red;padding-top:18px">Unactive</p>
               </div> -->

               <div>
                 <p style="text-align:center;color:red;padding-top:18px">Unactive</p>
               </div>
            </td>

             <td>
                <!-- <div v-if="showproduct.product_status == 1">
                  <a class="btn btn-primary btn-sm" style="margin-top:17px;color:white;margin-left:42px;" @click.prevent = "activeproductoff(showproduct.id)" >OFF</a>
                </div>
                <div v-else="showproduct.product_status == 0">
                  <a class="btn btn-success btn-sm" style="margin-top:17px;color:white;margin-left:42px;" @click.prevent = "unactiveproducton(showproduct.id)" >ON</a>
                </div> -->

                <div>
                  <a class="btn btn-success btn-sm" style="margin-top:17px;color:white;margin-left:42px;" >ON</a>
                </div>
              </td>


           <td>
              <center>
               <!-- <router-link :to="`/view_product/${showproduct.id}`" class="btn btn-primary btn-sm" style="margin-top:17px;"><i class="fa fa-eye" aria-hidden="true"></i></router-link>
               <router-link :to="`/edit_product/${showproduct.id}`" class="btn btn-warning btn-sm" style="margin-top:17px;"><i class="fa fa-edit" aria-hidden="true"></i></router-link>
               <a class="btn btn-danger btn-sm" style="margin-top:17px;" @click.prevent = "deleteproduct(showproduct.id)"><i class="fa fa-trash" aria-hidden="true"></i></a> -->

                     <a class="btn btn-danger btn-sm" style="margin-top:17px;"><i class="fa fa-trash" aria-hidden="true"></i></a>
              </center>
           </td>

         </tr>
       </tbody>


                      </table>
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


















    </div>
</template>

<script>

import Datepicker from 'vuejs-datepicker';

    export default {
 // Datepicker

      data () {
        return {
          //  categorys: {},
        //  search:'',
        //  products: {},

          showallcoupon:{},

          coupon_code: '',
          amount: '',
          amount_type: '',
          expiry_date: '',
          coupon_status:'',
          // date:'',
          // amounttype:'sdfcsdfcs',

          // Create a new form instance
          // form: new Form({
          //
          //     // coupon_code: '',
          //    	// amount: '',
          //    	// amount_type: '',
          //     // expiry_date: '',
          //     // coupon_status:'',
          //     // date:'',
          //
          //
          // })
        }
      },

      components: {
        Datepicker
      },


    methods:{

//current image show when select image

// var state = {
//   date: new Date(2016, 9,  16)
// }





      changephoto(event){

             let file = event.target.files[0];
             let reader = new FileReader();
             reader.onload = event => {
             this.form.product_image  = event.target.result
             console.log(event.target.result)
             };
             reader.readAsDataURL(file);

             },


              //image display in table




             ourimage(img){

                 return "images/"+img;

             },









         //show all category


             //  allproduct(){
             //
             //   axios.get('/allproduct').then(({data}) => (this.products = data));
             //
             //
             // },





     //add category
        addcoupon(){

             axios.post('/addcoupon_formaction',{coupon_code:this.coupon_code,amount:this.amount,amount_type:this.amount_type,expiry_date:this.expiry_date })

             .then((response)=>{
             //data insert and modan hide
             Toast.fire({
             icon: 'success',
             title: 'Product Added Successfully'
              })

                $('#exampleModal').modal('hide')
                this.get_all_coupon();
                   this.$router.push('/add_coupon')

              this.form.reset();






             //$('#exampleModal').modal('hide')
               // this.$router.push('/add_coupon')
               //  this.form.reset();
               //  this.get_all_coupon();



            //  this.form.reset();
             // //data insert and go this path
            // this.$router.push('/add_coupon')

             // //the form reset

             //then data insert we see the data at this moment
              //this.allproduct();

            //  this.allproduct();
            //  this.$store.dispatch("allCategory")


            console.log('coupon add successfully');
            })

              .catch(()=>{

               console.log('fail');

              })

          },




//delate dategory

//
// deleteproduct(id){
//
//   axios.get('/delate-product/'+id)
//
// //this.$router.push('/add_product')
//   .then((response)=>{
//
//           this.$store.dispatch("allCategory")
//
//         Toast.fire({
//         icon: 'success',
//         title: 'Product delate Successfully'
//          })
//       })
//
//  .catch(()=>{
//
// console.log('fail');
//
// })
//
// },




  //active product OFF

  //
  // activeproductoff(id){
  //    axios.get('/active_product_unactive/'+id)
  //    .then((response)=>{
  //
  //    this.$router.push('/add_product')
  //
  //   // this.allproduct();
  //    this.$store.dispatch("allCategory")
  //    Toast.fire({
  //    icon: 'success',
  //    title: 'Product Unactive Successfully'
  //    })
  //
  //    })
  //
  //  .catch(()=>{
  //
  //  console.log('fail');
  //
  //    })
  //
  //    },





 //unctive product on

// unactiveproducton(id){
//
//   axios.get('/unactive_product_active/'+id)
//   .then((response)=>{
//   this.$router.push('/add_product')
//
//   //this.allproduct();
//   this.$store.dispatch("allCategory")
//   Toast.fire({
//   icon: 'success',
//   title: 'Product Active Successfully'
//   })
//
//   })
//
//   .catch(()=>{
//    console.log('fail');
//
//   })
//
//   },


get_all_coupon(){

axios.get('/allcoupon').then(({data}) => (this.showallcoupon = data));

},


},



computed:{

// getallCategory(){
//
//    return this.$store.getters.getCategory
//
// }


},






        mounted() {


        //this.allproduct();

        this.get_all_coupon();

    //  this.$store.dispatch("allCategory")

        }
    }
</script>
