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
             <h3 class="card-title">All Color</h3>
           </div>

  <div class="but">
         <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
          Add Color
         </button>
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="color:green">Add Color</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
  <div class="modal-body">

  <form enctype="multipart/form-data" role="form" @submit.prevent = "addproductcolor()">


        <div class="form-group">
        <label>Color Name</label>
        <input v-model="form.color_name" type="text" name="color_name"
        class="form-control" :class="{ 'is-invalid': form.errors.has('color_name') }" placeholder="Enter Color Name">
        <has-error :form="form" field="color_name"></has-error>
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
    <th style="text-align:center;">Sl </th>
    <th style="text-align:center;">Color Id</th>
    <th style="text-align:center;width:200px">Product Name</th>
    <th style="text-align:center;">Product Color</th>


    <th style="text-align:center;">Color Added Date</th>
    <th style="text-align:center;">Color Status</th>

    <th style="text-align:center;">ON/OFF</th>
    <th style="text-align:center;">Action</th>
</tr>




</thead>

<tbody>

 <tr v-for="(v_cat,index) in myallcolor">


   <td style="text-align:center;padding-top:30px">{{index+1}}</td>
   <td style="text-align:center;padding-top:30px;color:blue;">{{v_cat.color_id}}</td>
   <td style="text-align:center;padding-top:30px;color:blue;">{{v_cat.product_name}}</td>
   <td style="text-align:center;padding-top:30px;color:blue;">{{v_cat.color_name}}</td>





   <td style="text-align:center;padding-top:30px;">{{v_cat.color_added_date}}</td>


    <td>

    <div v-if="v_cat.color_status == 1">
     <p style="text-align:center;color:blue;padding-top:17px">Active</p>
    </div>
    <div v-else="v_cat.color_status == 0">
     <p style="text-align:center;color:red;padding-top:17px">Unactive</p>
    </div>




    </td>

    <td>
   <center>
    <div v-if="v_cat.color_status == 1">
    <a class="btn btn-primary btn-sm" style="margin-top:15px;color:white;" @click.prevent = "activecoloroff(v_cat.color_id)" >OFF</a>
    </div>

    <div v-else="v_cat.color_status == 0">
    <a class="btn btn-success btn-sm" style="margin-top:15px;color:white;" @click.prevent = "unactivecoloron(v_cat.color_id)" >ON</a>
    </div>


  </center>


  </td>

  <td>

     <center>

<a class="btn btn-danger btn-sm" style="margin-top:17px;" @click.prevent = "deletecolor(v_cat.color_id)"><i class="fa fa-trash" aria-hidden="true" style="color:white;"></i></a>
    <!-- <router-link :to="`/edit_category_route/${v_cat.category_id}`" class="btn btn-success btn-sm" style="margin-top:17px;" ><i class="fa fa-edit" aria-hidden="true"></i></router-link>
    <a class="btn btn-warning btn-sm" style="margin-top:17px;" @click.prevent = "deletecategory(v_cat.category_id)"><i class="fa fa-trash" aria-hidden="true"></i></a>
    <router-link :to="`/view_category/${v_cat.category_id}`" class="btn btn-primary btn-sm" style="margin-top:17px;"><i class="fa fa-eye" aria-hidden="true"></i></router-link> -->

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

          // showcategoryinform:{},
           myallcolor:{},


           // Create a new form instance
           form: new Form({

                  	color_id: '',
              	    color_product_id: '',
              	    color_name: '',
                    color_added_date:'',
                    color_status:'',
                    // size_added_date:'',
                    // size_status:'',
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



      Showallcolor(){

      axios.get('/show_all_product_color/'+this.$route.params.product_id).then((res) => {

      this.myallcolor = res.data.myallcolor




      })

    },



       addproductcolor(){


         this.form.post('/add_productcolor_formaction/'+this.$route.params.product_id)

        .then((response)=>{


        //  console.log(response.data)

        $('#exampleModal').modal('hide')

        this.form.reset();
        this.Showallcolor();

         if(response.data==0){

           Toast.fire({
           icon: 'error',
           title: 'This Product Color Already Exist'
           })


         }else if(response.data==1){


           Toast.fire({
           icon: 'success',
           title: 'Product Color Added Successfully'
           })



         }else{

             console.log('error')


         }


          })

             .catch(()=>{

            console.log('fail');

            })

            },


  activecoloroff(color_id){

    axios.get('/active_color_unactive/'+color_id)
    .then((response)=>{
      Toast.fire({
      icon: 'success',
      title: 'Product Color Unactive Successfully'
     })


             this.Showallcolor();


     })

     },

  //unactive category on
    unactivecoloron(color_id){

      axios.get('/unactive_color_active/'+color_id)
      .then((response)=>{

        Toast.fire({
        icon: 'success',
        title: 'Product Color Active Successfully'
       })

         this.Showallcolor();

       })

     },



     deletecolor(color_id){

       axios.get('/color_delete/'+color_id)
       .then((response)=>{

         Toast.fire({
         icon: 'success',
         title: 'Product Color Delete Successfully'
        })

          this.Showallcolor();

        })

      },



 },


 computed:{


 },




         mounted() {

              this.Showallcolor();

         }
     }
 </script>
