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
           <div class="title" style="width:950px;float:left">
             <h3 class="card-title">All Coupon Code</h3>
           </div>

  <div class="but">
         <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
          Add Coupon Code
         </button>
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="color:green">Add Coupon Code</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
  <div class="modal-body">

      <form enctype="multipart/form-data" role="form" @submit.prevent = "addcouponcode()">



       <div class="form-group">
        <label>Coupon Code</label>
        <input v-model="form.coupon_code" type="text" name="coupon_code"
        class="form-control" :class="{ 'is-invalid': form.errors.has('coupon_code') }" placeholder="Enater Coupon Code">
        <has-error :form="form" field="coupon_code"></has-error>
        </div>



        <div class="form-group">
             <label for="exampleFormControlSelect1">Amount Type</label>
               <select  v-model="form.amount_type" class="form-control" id="exampleFormControlSelect1" name="amount_type" :class="{ 'is-invalid': form.errors.has('amount_type') }"  required>
                 <option value="" disabled>Select</option>
                   <option value="Fixed" style="font-weight:bold">Fixed</option>
                   <option value="Percentage" style="font-weight:bold">Percentage</option>

               </select>
               <has-error :form="form" field="amount_type"></has-error>
          </div>


        <div class="form-group">
        <label>Coupon Amount</label>
        <input v-model="form.coupon_amount" type="text" name="coupon_amount"
        class="form-control" :class="{ 'is-invalid': form.errors.has('coupon_amount') }" placeholder="Enater Coupon Amount ">
        <has-error :form="form" field="coupon_amount"></has-error>
        </div>




        <div class="form-group">
        <label>Expired Date</label>
        <input v-model="form.coupon_expire_date" type="text" name="coupon_expire_date"
        class="form-control" :class="{ 'is-invalid': form.errors.has('coupon_expire_date') }" placeholder=" Expired Date Format 07-01-2021">
        <has-error :form="form" field="coupon_expire_date"></has-error>
        </div>



          <button type="submit" class="btn btn-primary">Submit</button>

     </form>

 </div>
 </div>
 </div>
 </div>
 </div>
 </div>
 </div>



 <div class="card-body">



 <table id="section" class="table table-bordered table-striped">




 <thead>

 <tr>
    <th style="text-align:center;">Sl</th>
    <th style="text-align:center;">Coupon Id</th>
    <th style="text-align:center;">Coupon Code</th>
    <th style="text-align:center;">Coupon Type</th>

      <th style="text-align:center;">Coupon Amount</th>

    <th style="text-align:center;">Coupon Added Date</th>
      <th style="text-align:center;">Coupon Expire Date</th>
    <th style="text-align:center;">Size Status</th>

    <th style="text-align:center;">ON/OFF</th>
    <th style="text-align:center;">Action</th>
</tr>




</thead>


 <tbody>

 <tr v-for="(v_cat,index) in myallcouponcode">


    <td style="text-align:center;padding-top:30px">{{index+1}}</td>
    <td style="text-align:center;padding-top:30px;color:blue;">{{v_cat.coupon_id}}</td>
    <td style="text-align:center;padding-top:30px;color:blue;">{{v_cat.coupon_code}}</td>
    <td style="text-align:center;padding-top:30px;color:blue;">{{v_cat.amount_type}}</td>
    <td style="text-align:center;padding-top:30px;color:blue;">


          <div v-if="v_cat.amount_type == 'Fixed'">
           <p style="text-align:center;color:blue;">{{v_cat.coupon_amount}} TK</p>
          </div>
          <div v-else>
           <p style="text-align:center;color:red;">{{v_cat.coupon_amount}} %</p>
          </div>





    </td>

   <td style="text-align:center;padding-top:30px;">{{v_cat.coupon_added_date}}</td>



   <td style="text-align:center;padding-top:30px;color:blue;">{{v_cat.coupon_expire_date}}</td>



    <td>

    <div v-if="v_cat.coupon_status == 1">
     <p style="text-align:center;color:blue;padding-top:17px">Active</p>
    </div>
    <div v-else="v_cat.coupon_status == 0">
     <p style="text-align:center;color:red;padding-top:17px">Unactive</p>
    </div>




    </td>

    <td>
   <center>
    <div v-if="v_cat.coupon_status == 1">
    <a class="btn btn-primary btn-sm" style="margin-top:15px;color:white;" @click.prevent = "activecouponoff(v_cat.coupon_id)" >OFF</a>
    </div>

    <div v-else="v_cat.coupon_status == 0">
    <a class="btn btn-success btn-sm" style="margin-top:15px;color:white;" @click.prevent = "unactivecouponon(v_cat.coupon_id)" >ON</a>
    </div>


  </center>


  </td>

  <td>

     <center>

<a class="btn btn-danger btn-sm" style="margin-top:17px;" @click.prevent = "deletecoupon(v_cat.coupon_id)"><i class="fa fa-trash" aria-hidden="true" style="color:white;"></i></a>

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






    </div>
</template>

<script>


  import Mybackendheader from "./Adminheader.vue"
  import MyBackendsidebar from "./Adminsidebar.vue"

    // import Mybackendfooter from "./Adminfooter.vue"

     export default {


         data() {
         return {

           myallcouponcode:{},


           // Create a new form instance
           form: new Form({

                  	coupon_id: '',
              	    coupon_code: '',
              	    coupon_amount : '',
                    amount_type:'',
                    coupon_amount:'',
                    coupon_added_date:'',
                    coupon_expire_date:'',
                    coupon_status :'',
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

       //show all category



      Showallcouponcode(){

      axios.get('/show_all_coupon_code').then((res) => {

      this.myallcouponcode = res.data.myallcouponcode

      })

    },



       addcouponcode(){


         this.form.post('/add_coupon_code_formaction')

        .then((response)=>{


        $('#exampleModal').modal('hide')

        this.form.reset();
        this.Showallcouponcode();

         if(response.data==0){

           Toast.fire({
           icon: 'error',
           title: 'This Coupon Code Already Exist'
           })


         }else if(response.data==1){


           Toast.fire({
           icon: 'success',
           title: 'Coupon Code Added Successfully'
           })



         }else{

             console.log('error')


         }





          })

             .catch(()=>{

            console.log('fail');

            })

            },


  activecouponoff(coupon_id){

    axios.get('/active_coupon_unactive/'+coupon_id)
    .then((response)=>{
      Toast.fire({
      icon: 'success',
      title: 'Product Size Unactive Successfully'
     })

             this.Showallcouponcode();


     })

     },

  //unactive category on
    unactivecouponon(coupon_id){

      axios.get('/unactive_coupon_active/'+coupon_id)
      .then((response)=>{

        Toast.fire({
        icon: 'success',
        title: 'Product Size Active Successfully'
       })

         this.Showallcouponcode();

    //   this.allcategory();



       })

     },



     deletecoupon(coupon_id){

       axios.get('/coupon_delete/'+coupon_id)
       .then((response)=>{

         Toast.fire({
         icon: 'success',
         title: 'Product Delete Successfully'
        })

          this.Showallcouponcode();

    //    this.allcategory();



        })

      },







 },


 computed:{


 },




         mounted() {


           this.Showallcouponcode();

            //  this.Showallsize();
           // this.showallcategoryinform();
           // this.allcategory();



         }
     }
 </script>
