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
             <h3 class="card-title">All Size</h3>
           </div>

  <div class="but">
         <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
          Add Size
         </button>
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="color:green">Add Size</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
  <div class="modal-body">

  <form enctype="multipart/form-data" role="form" @submit.prevent = "addproductsize()">


        <div class="form-group">
        <label>Size Name</label>
        <input v-model="form.size_name" type="text" name="size_name"
        class="form-control" :class="{ 'is-invalid': form.errors.has('size_name') }" placeholder="Enter Size Name">
        <has-error :form="form" field="size_name"></has-error>
        </div>

        <div class="form-group">
        <label>Product Weight</label>
        <input v-model="form.size_weight" type="text" name="size_weight"
        class="form-control" :class="{ 'is-invalid': form.errors.has('size_weight') }" placeholder="Enter Product Weight">
        <has-error :form="form" field="size_weight"></has-error>
        </div>

        <div class="form-group">
        <label>Product Stock</label>
        <input v-model="form.size_stock" type="text" name="size_stock"
        class="form-control" :class="{ 'is-invalid': form.errors.has('size_stock') }" placeholder="Enter Product Stocks">
        <has-error :form="form" field="size_stock"></has-error>
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
    <th style="text-align:center;">Size Id</th>
    <th style="text-align:center;width:200px">Product Name</th>
    <th style="text-align:center;">Size</th>
    <th style="text-align:center;">Product Weight</th>
      <th style="text-align:center;">Product Stock</th>

    <th style="text-align:center;">Size Added Date</th>
    <th style="text-align:center;">Size Status</th>

    <th style="text-align:center;">ON/OFF</th>
    <th style="text-align:center;">Action</th>
</tr>




</thead>

<tbody>

 <tr v-for="(v_cat,index) in myallsize">


   <td style="text-align:center;padding-top:30px">{{index+1}}</td>
   <td style="text-align:center;padding-top:30px;color:blue;">{{v_cat.size_id}}</td>
    <td style="text-align:center;padding-top:30px;color:blue;">{{v_cat.product_name}}</td>
    <td style="text-align:center;padding-top:30px;color:blue;">{{v_cat.size_name}}</td>
   <td style="text-align:center;padding-top:30px;">{{v_cat.size_weight}}</td>



   <td style="text-align:center;padding-top:30px;color:blue;">{{v_cat.size_stock}}</td>
   <td style="text-align:center;padding-top:30px;">{{v_cat.size_added_date}}</td>


    <td>

    <div v-if="v_cat.size_status == 1">
     <p style="text-align:center;color:blue;padding-top:17px">Active</p>
    </div>
    <div v-else="v_cat.size_status == 0">
     <p style="text-align:center;color:red;padding-top:17px">Unactive</p>
    </div>




    </td>

    <td>
   <center>
    <div v-if="v_cat.size_status == 1">
    <a class="btn btn-primary btn-sm" style="margin-top:15px;color:white;" @click.prevent = "activesizeoff(v_cat.size_id)" >OFF</a>
    </div>

    <div v-else="v_cat.size_status == 0">
    <a class="btn btn-success btn-sm" style="margin-top:15px;color:white;" @click.prevent = "unactivesizeon(v_cat.size_id)" >ON</a>
    </div>


  </center>


  </td>

  <td>

     <center>

<a class="btn btn-danger btn-sm" style="margin-top:17px;" @click.prevent = "deletecategory(v_cat.size_id)"><i class="fa fa-trash" aria-hidden="true" style="color:white;"></i></a>
<router-link :to="`/edit_product_size/${v_cat.size_id}`" class="btn btn-success btn-sm" style="margin-top:17px;" ><i class="fa fa-edit" aria-hidden="true"></i></router-link>




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
           myallsize:{},


           // Create a new form instance
           form: new Form({

                  	size_id: '',
              	    size_product_id: '',
              	    size_name: '',
                    size_weight:'',
                    size_stock:'',
                    size_added_date:'',
                    size_status:'',
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



      Showallsize(){

      axios.get('/show_all_product_size/'+this.$route.params.product_id).then((res) => {

      this.myallsize = res.data.myallsize

      })

    },



       addproductsize(){


         this.form.post('/add_productsize_formaction/'+this.$route.params.product_id)

        .then((response)=>{


        $('#exampleModal').modal('hide')

        this.form.reset();
        this.Showallsize();

         if(response.data==0){

           Toast.fire({
           icon: 'error',
           title: 'This Product Size Already Exist'
           })


         }else if(response.data==1){


           Toast.fire({
           icon: 'success',
           title: 'Product Size Added Successfully'
           })



         }else{

             console.log('error')


         }





          })

             .catch(()=>{

            console.log('fail');

            })

            },


  activesizeoff(size_id){

    axios.get('/active_size_unactive/'+size_id)
    .then((response)=>{
      Toast.fire({
      icon: 'success',
      title: 'Product Size Unactive Successfully'
     })

             this.Showallsize();


     })

     },

  //unactive category on
    unactivesizeon(size_id){

      axios.get('/unactive_size_active/'+size_id)
      .then((response)=>{

        Toast.fire({
        icon: 'success',
        title: 'Product Size Active Successfully'
       })

         this.Showallsize();

    //   this.allcategory();



       })

     },



     deletecategory(size_id){

       axios.get('/size_delete/'+size_id)
       .then((response)=>{

         Toast.fire({
         icon: 'success',
         title: 'Product Delete Successfully'
        })

          this.Showallsize();

    //    this.allcategory();



        })

      },







 },


 computed:{


 },




         mounted() {

              this.Showallsize();
           // this.showallcategoryinform();
           // this.allcategory();



         }
     }
 </script>
