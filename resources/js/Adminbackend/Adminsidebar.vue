<template>

<span>

  <div class="sidebar bg-dark" style="float:left;width:300px;height:5000px;">

    <ul class="list-group" style="margin-left:-5px;">


  <li class="list-group-item bg-dark"></li>

  <li class="list-group-item bg-dark">
    <router-link style="text-decoration:none;font-size:17px;font-weight:bold;" to="/admin_dashboard">Dashboard</router-link>
  </li>

  <li class="list-group-item bg-dark">

    <router-link style="text-decoration:none;font-size:17px;" to="/add_category">Add Category</router-link>

  </li>

  <li class="list-group-item bg-dark"><router-link style="text-decoration:none;font-size:17px;" to="/add_product">Add Product</router-link></li>

  <li class="list-group-item bg-dark"><router-link style="text-decoration:none;font-size:17px;" to="/add_coupon_code">Add Couponcode</router-link></li>

  <li class="list-group-item bg-dark"><router-link style="text-decoration:none;font-size:17px;" to="/show_all_order">All Order</router-link></li>



  <!---

  <li class="list-group-item bg-dark"><a style="text-decoration:none;font-size:17px;"href="#">Today Order</a></li>

  <li class="list-group-item bg-dark"><a style="text-decoration:none;font-size:17px;"href="#">All Success Order</a></li>

  <li class="list-group-item bg-dark"><a style="text-decoration:none;font-size:17px;"href="#">All Pending Order</a></li>

  <li class="list-group-item bg-dark"><a style="text-decoration:none;font-size:17px;"href="#">Setting</a></li>



@click.prevent = "mycustomerlogout(customerid)









  ------>

  <li class="list-group-item bg-dark"><a style="text-decoration:none;font-size:17px;" @click.prevent = "adminlogout()">Logout</a></li>


  </ul>



  </div>

</span>
</template>



 <script>


  import Mybackendheader from "./Adminheader.vue"
  import MyBackendsidebar from "./Adminsidebar.vue"
  // import Mybackendfooter from "./Adminfooter.vue"

     export default {


       data () {
         return {

          category:{},
          products:{},
          pendingorder:{},
          successorder:{},


          totalsellproductquantity:{},
          totalsellproductmoney:{},
          totalselltodaymoney:{},
          quantistocksproduct:{},




           // Create a new form instance
           form: new Form({



           })
         }
       },




       components: {
          MyBackendsidebar,
          Mybackendheader,
          // Mybackendfooter,
        },



     methods:{



  



  adminlogout(){



          ///  this.form.post('/add_notice_formaction')

          axios.get('/admin_logout')

        .then((response)=>{

        // console.log(response.data)


      //   $('#exampleModal').modal('hide')

          //    this.form.reset();

               //   this.$store.dispatch("allStudent")


               //  this.showallnotice();



                if(response.data==1){



                 this.$router.push('/admin')

                   Toast.fire({
                   icon: 'success',
                      title: 'Logout Successfully'

                   })

                   }else{


                         Toast.fire({
                         icon: 'error',
                         title: 'Server Error'

                        })



                  }

        



           })
           .catch(()=>{
           console.log('fail');
           })





  }







 },


 computed:{


 },




         mounted() {

          // this.showallinfo();

         }
     }
 </script>

