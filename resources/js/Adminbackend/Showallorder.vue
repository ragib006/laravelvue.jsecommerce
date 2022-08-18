<template>
    <div>



      <Mybackendheader></Mybackendheader>
      <MyBackendsidebar></MyBackendsidebar>

  <section class="content" style="margin-left:250px;margin-top:20px;margin-bottom:130px;">
    <div class="container-fluid">
       <div class="row">
         <div class="col-12">


  <div class="card" style="padding-bottom:0px;">
  <div class="card-header">
  <div class="main">
           <div class="title" style="width:1000px;float:left">
             <h3 class="card-title">All Order</h3>
           </div>


 </div>
 </div>



 <div class="card-body">



 <table id="section" class="table table-bordered table-striped">




 <thead>

 <tr>
    <th style="text-align:center;">Sl </th>
    <th style="text-align:center;">Customer Name</th>
    <th style="text-align:center;">Order Date</th>
    <th style="text-align:center;">Total Product</th>
    <th style="text-align:center;">Total Amount</th>
    <th style="text-align:center;">Discount</th>
    <th style="text-align:center;">Payment Method</th>
    <th style="text-align:center;">Trx Id</th>

    <!-- <th style="text-align:center;">Category Added Date</th>
    <th style="text-align:center;">Category Status</th> -->

    <th style="text-align:center;">Payment Status</th>

      <th style="text-align:center;">Payment ON/OFF</th>

      <th style="text-align:center;">Order Status</th>
    <th style="text-align:center;width:100px;">Action</th>
</tr>




</thead>

<tbody>

 <tr v-for="(v_order,index) in allorder">




   <td style="text-align:center;padding-top:30px">{{index+1}}</td>
    <td style="text-align:center;padding-top:30px;color:blue;">{{v_order.customer_name}}</td>
    <td style="text-align:center;padding-top:30px;color:blue;">{{v_order.order_date}}</td>
   <td style="text-align:center;padding-top:30px;">{{v_order.order_total_products}}</td>
   <td style="text-align:center;padding-top:30px;">{{v_order.order_total}} TK</td>
      <td style="text-align:center;padding-top:30px;">{{v_order.order_discount}} TK</td>


   <td style="text-align:center;padding-top:30px;color:blue;">{{v_order.payment_method}}</td>
   <td style="text-align:center;padding-top:30px;">{{v_order.payment_trx_id}}</td>



   <td style="text-align:center;">

                    <div v-if="v_order.payment_status == 0">
                 <p style="text-align:center;color:blue;padding-top:17px">Unsuccessfull</p>
                    </div>

                    <div v-else="v_order.payment_status == 1">


                        <p style="text-align:center;color:blue;padding-top:17px">Successfull</p>
                    </div>

      </td>








   <td style="text-align:center;">

                    <div v-if="v_order.payment_status == 0">
                     <a class="btn btn-danger btn-sm" style="margin-top:15px;color:white;" @click.prevent = "pendingpaymentsuccess(v_order.order_id)" >Pending</a>
                    </div>

                    <div v-else="v_order.payment_status == 1">

                       <a class="btn btn-success btn-sm" style="margin-top:15px;color:white;" @click.prevent = "successpaymentpending(v_order.order_id)" >Success</a>
                    </div>

      </td>





      <td style="text-align:center;">

<div v-if="v_order.order_status == 0">
 <p class="btn btn-danger btn-sm" style="margin-top:15px;color:white;" >Pending</p>
</div>

<div v-else="v_order.order_status == 1">

   <p class="btn btn-success btn-sm" style="margin-top:15px;color:white;">Success</p>
</div>

</td>


    <!-- <td>

    <div v-if="v_cat.category_status == 1">
     <p style="text-align:center;color:blue;padding-top:17px">Active</p>
    </div>
    <div v-else="v_cat.category_status == 0">
     <p style="text-align:center;color:red;padding-top:17px">Unactive</p>
    </div>




    </td> -->

    <!-- <td>
   <center>
    <div v-if="v_cat.category_status == 1">
    <a class="btn btn-primary btn-sm" style="margin-top:15px;color:white;" @click.prevent = "activecategoryoff(v_cat.id)" >OFF</a>
    </div>

    <div v-else="v_cat.category_status == 0">
    <a class="btn btn-success btn-sm" style="margin-top:15px;color:white;" @click.prevent = "unactivecategoryon(v_cat.id)" >ON</a>
    </div>


  </center>


  </td> -->

  <td>

     <center>


    <!-- <router-link :to="`/edit_category_route/${v_cat.id}`" class="btn btn-success btn-sm" style="margin-top:17px;" ><i class="fa fa-edit" aria-hidden="true"></i></router-link>
    <a class="btn btn-warning btn-sm" style="margin-top:17px;" @click.prevent = "deletecategory(v_cat.id)"><i class="fa fa-trash" aria-hidden="true"></i></a>
    <router-link :to="`/view_category/${v_cat.id}`" class="btn btn-primary btn-sm" style="margin-top:17px;"><i class="fa fa-eye" aria-hidden="true"></i></router-link> -->

    <!-- <a class="btn btn-warning btn-sm" style="margin-top:17px;"><i class="fa fa-trash" aria-hidden="true"></i></a> -->

    <router-link :to="`/view_order_details/${v_order.order_id}`" class="btn btn-success btn-sm" style="margin-top:17px;" ><i class="fa fa-eye" aria-hidden="true"></i></router-link>
    <a class="btn btn-warning btn-sm" style="margin-top:17px;" @click.prevent = "deleteorder(v_order.order_id)"><i class="fa fa-trash" aria-hidden="true"></i></a>

     </center>

     </td>
     </tr>

 </tbody>





 </table>
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

           //showcategoryinform:{},
          // myallcategory:{},

          allorder:{},


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

       showallorder(){

       axios.get('/show_my_all_order').then((res) => {
            //console.log(res.data)
         this.allorder = res.data.allorder


       })


    },





    pendingpaymentsuccess(order_id){

    axios.get('/pending_payment_success/'+order_id)
    .then((response)=>{
      Toast.fire({
      icon: 'success',
      title: 'Payment Successfully'
     })

           this.showallorder();


     })

     },

  //unactive category on
  successpaymentpending(order_id){

      axios.get('/success_payment_pending/'+order_id)
      .then((response)=>{

        Toast.fire({
        icon: 'error',
        title: 'Payment Unsuccessfully'
       })

       this.showallorder();



       })

     },



     deleteorder(order_id){

       axios.get('/order_delete/'+order_id)
       .then((response)=>{

         Toast.fire({
         icon: 'success',
         title: 'Order Delete Successfully'
        })

      //  this.allcategory();
         this.showallorder();



        })

      },







 },


 computed:{


 },




         mounted() {

            this.showallorder();
           // this.showallcategoryinform();
           // this.allcategory();



         }
     }
 </script>
