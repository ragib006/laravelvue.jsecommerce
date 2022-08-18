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
             <h3 class="card-title">All Product</h3>
           </div>

  <div class="but">
         <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
          Add Product
         </button>
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="color:green">Add Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
  <div class="modal-body">

  <form enctype="multipart/form-data" role="form" @submit.prevent = "addproduct()">


        <div class="form-group">
        <label>Product Name</label>
        <input v-model="form.product_name" type="text" name="product_name"
        class="form-control" :class="{ 'is-invalid': form.errors.has('product_name') }" placeholder="Enter Product Name">
        <has-error :form="form" field="product_name"></has-error>
        </div>

        <div class="form-group">
             <label for="exampleFormControlSelect1">Select Category</label>
               <select  v-model="form.product_cat_id" class="form-control" id="exampleFormControlSelect1" name="product_cat_id" :class="{ 'is-invalid': form.errors.has('product_cat_id') }" style="" required>
                 <option value="" disabled>Select</option>

<option style="color:green;font-weight:bold;" v-for="v_category in showsubcategoryinform" :value="v_category.id">{{v_category.category_name}}</option>



               </select>
               <has-error :form="form" field="product_cat_id"></has-error>
        </div>



        <div class="form-group">
        <label>Product Price</label>
        <input v-model="form.product_price" type="text" name="product_price"
        class="form-control" :class="{ 'is-invalid': form.errors.has('product_price') }" placeholder="Enter Product Price">
        <has-error :form="form" field="product_price"></has-error>
        </div>




        <div class="form-group">
      <label for="exampleInputFile">Product Image</label>
      <div class="ass" style="margin-bottom:10px;">
      <img :src="form.product_image" alt="" style="height:70px;width:70px;">
      </div>

      <div class="input-group">
      <div class="custom-file">
      <input @change="changephoto($event)" type="file" class="custom-file-input" id="exampleInputFile" name="product_image" :class="{ 'is-invalid': form.errors.has('product_image') }" required>
      <label class="custom-file-label" for="exampleInputFile">Choose file</label>
      <has-error :form="form" field="product_image"></has-error>
      </div>
      </div>
      </div>





        <div class="form-group">
        <label>Product Code</label>
        <input v-model="form.product_code" type="text" name="product_code"
        class="form-control" :class="{ 'is-invalid': form.errors.has('product_code') }" placeholder="Enter Product Code">
        <has-error :form="form" field="product_code"></has-error>
        </div>


        <div class="form-group">
        <label>Product Url</label>
        <input v-model="form.product_url" type="text" name="product_url"
        class="form-control" :class="{ 'is-invalid': form.errors.has('product_url') }" placeholder="Enter Product Price">
        <has-error :form="form" field="product_url"></has-error>
        </div>


        <div class="form-group">
                  <label>Product Description</label>
                  <textarea v-model="form.product_description" type="text" name="product_description"
                    class="form-control" :class="{ 'is-invalid': form.errors.has('product_description') }" placeholder="Enter Product Description" required></textarea>
                  <has-error :form="form" field="product_description"></has-error>
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
    <th style="text-align:center;">Product Sl</th>
    <th style="text-align:center;">Product Id</th>
    <th style="text-align:center;width:220px;">Product Name</th>
    <th style="text-align:center;">Category Name</th>
    <th style="text-align:center;">Product Price</th>
    <th style="text-align:center;">Product Image</th>
    <th style="text-align:center;">Product Code</th>
    <!-- <th style="text-align:center;">Product Added Date</th> -->
    <th style="text-align:center;">Product Status</th>
    <th style="text-align:center;">ON/OFF</th>
    <th style="text-align:center;width:200px;">Action</th>
</tr>




</thead>

<tbody>

 <tr v-for="(v_cat,index) in allproduct">


    <td style="text-align:center;padding-top:35px">{{index+1}}</td>
    <td style="text-align:center;padding-top:35px;color:blue;">{{v_cat.product_id}}</td>
    <td style="text-align:center;padding-top:35px;color:blue;">{{v_cat.product_name}}</td>
    <td style="text-align:center;padding-top:35px;">{{v_cat.category_name}}</td>
    <td style="text-align:center;padding-top:35px;">{{v_cat.product_price}} TK</td>


       <td style="text-align:center"><img :src="ourimage(v_cat.product_image)" alt="" style="height:70px;width:70px;"></td>


    <td style="text-align:center;padding-top:35px;">{{v_cat.product_code}}</td>

   <!-- <td style="text-align:center;padding-top:35px;">{{v_cat.product_added_date}}</td> -->


    <td>

    <div v-if="v_cat.product_status == 1">
     <p style="text-align:center;color:blue;padding-top:22px">Active</p>
    </div>
    <div v-else="v_cat.product_status == 0">
     <p style="text-align:center;color:red;padding-top:22px">Unactive</p>
    </div>




    </td>

    <td>
   <center>
    <div v-if="v_cat.product_status == 1" style="padding-top:5px;">
    <a class="btn btn-primary btn-sm" style="margin-top:15px;color:white;" @click.prevent = "activecategoryoff(v_cat.product_id)" >OFF</a>
    </div>

    <div v-else="v_cat.product_status == 0" style="padding-top:5px">
    <a class="btn btn-success btn-sm" style="margin-top:15px;color:white;" @click.prevent = "unactivecategoryon(v_cat.product_id)" >ON</a>
    </div>


  </center>


  </td>

  <td>

     <center>


<router-link :to="`/view_product/${v_cat.product_id}`" class="btn btn-primary btn-sm" style="margin-top:17px;"><i class="fa fa-eye" aria-hidden="true" style="color:white;"></i></router-link>
<router-link :to="`/edit_product/${v_cat.product_id}`" class="btn btn-success btn-sm" style="margin-top:17px;" ><i class="fa fa-edit" aria-hidden="true" style="color:white;"></i></router-link>
<router-link :to="`/add_product_size/${v_cat.product_id}`" class="btn btn-primary btn-sm" style="margin-top:17px;"><i class="fa fa-plus" aria-hidden="true" style="color:white"></i></router-link>
<router-link :to="`/add_product_color/${v_cat.product_id}`" class="btn btn-secondary btn-sm" style="margin-top:17px;"><i class="fas fa-fill-drip" aria-hidden="true" style="color:white"></i></router-link>
<!-- <router-link :to="`/view_category/${v_cat.category_id}`" class="btn btn-primary btn-sm" style="margin-top:17px;"><i class="fa fa-eye" aria-hidden="true"></i></router-link> -->
    <!-- <router-link :to="`/edit_category_route/${v_cat.category_id}`" class="btn btn-success btn-sm" style="margin-top:17px;" ><i class="fa fa-edit" aria-hidden="true"></i></router-link>
    <a class="btn btn-warning btn-sm" style="margin-top:17px;" @click.prevent = "deletecategory(v_cat.category_id)"><i class="fa fa-trash" aria-hidden="true"></i></a>
    <router-link :to="`/view_category/${v_cat.category_id}`" class="btn btn-primary btn-sm" style="margin-top:17px;"><i class="fa fa-eye" aria-hidden="true"></i></router-link> -->

    <!-- <a class="btn btn-warning btn-sm" style="margin-top:17px;" @click.prevent = "deleteproduct(v_cat.product_id)"><i class="fa fa-trash" aria-hidden="true"></i></a> -->
    <!-- <a class="btn btn-warning btn-sm" style="margin-top:17px;" @click.prevent = "deleteproduct(v_cat.product_id)"><i class="fa fa-trash" aria-hidden="true"></i></a> -->

    <!-- <a class="btn btn-danger btn-sm" style="margin-top:17px;" @click.prevent = "deleteproduct(v_cat.product_id)"><i class="fa fa-trash" aria-hidden="true" style="color:white;"></i></a> -->
    <a class="btn btn-danger btn-sm" style="margin-top:17px;" @click.prevent = "deleteproduct(v_cat.product_id)"><i class="fa fa-trash" aria-hidden="true" style="color:white;"></i></a>


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

           showsubcategoryinform:{},
           allproduct:{},


           // Create a new form instance
           form: new Form({

                  	product_id: '',
              	    product_name: '',
              	    product_cat_id: '',
                    product_price:'',
                    product_image:'',
                    product_description:'',
                    product_url:'',
                    product_code:'',
                    product_added_date:'',
                    product_status:'',
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
      showallsubcategoryinform(){

      axios.get('/show_all_sub_category_in_form').then(({data}) => (this.showsubcategoryinform = data));

      },

      //show all product_id

      showallproduct(){

      axios.get('/show_all_product').then((res) => {
            //console.log(res.data)
         this.allproduct = res.data.allproduct


      })


   },




    //how image
          ourimage(img){

                  return "/images/"+img;

              },

    //change photo
          changephoto(event){

               let file = event.target.files[0];
               let reader = new FileReader();
               reader.onload = event => {
               this.form.product_image  = event.target.result
               console.log(event.target.result)
               };
               reader.readAsDataURL(file);

               },





       addproduct(){


         this.form.post('/add_product_formaction')

        .then((response)=>{


        //  console.log(response.data);
         $('#exampleModal').modal('hide')

         this.form.reset();
         this.showallproduct();



            if(response.data==0){

              Toast.fire({
              icon: 'error',
              title: 'This Product Already Exit'
              })


            }else if(response.data==1){

              Toast.fire({
              icon: 'error',
              title: 'This Product Code Alreay Exist'
              })

            }else{



              Toast.fire({
              icon: 'success',
              title: 'Product Added Successfully'
              })






             }



          })

             .catch(()=>{

            console.log('fail');

            })

            },


  activecategoryoff(product_id){

    axios.get('/active_product_unactive/'+product_id)
    .then((response)=>{
      Toast.fire({
      icon: 'success',
      title: 'Product Unactive Successfully'
     })

           //this.allcategory();
           this.showallproduct();


     })

     },

  //unactive category on
    unactivecategoryon(product_id){

      axios.get('/unactive_product_active/'+product_id)
      .then((response)=>{

        Toast.fire({
        icon: 'success',
        title: 'Product Active Successfully'
       })

      // this.allcategory();
         this.showallproduct();



       })

     },



     deleteproduct(product_id){

       axios.get('/product_delete/'+product_id)
       .then((response)=>{

         Toast.fire({
         icon: 'success',
         title: 'Product Delete Successfully'
        })

      //  this.allcategory();
          this.showallproduct();



        })

      },







 },


 computed:{


 },




         mounted() {


              this.showallsubcategoryinform();
              this.showallproduct();

          // this.showallcategoryinform();
          // this.allcategory();



         }
     }
 </script>
