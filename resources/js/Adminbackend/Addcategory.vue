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
             <h3 class="card-title">All Category</h3>
           </div>

  <div class="but">
         <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
          Add Category
         </button>
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="color:green">Add Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
  <div class="modal-body">

  <form enctype="multipart/form-data" role="form" @submit.prevent = "addcategory()">


        <div class="form-group">
        <label>Category Name</label>
        <input v-model="form.category_name" type="text" name="category_name"
        class="form-control" :class="{ 'is-invalid': form.errors.has('category_name') }" placeholder="Enater Category Name">
        <has-error :form="form" field="category_name"></has-error>
        </div>

        <div class="form-group">
             <label for="exampleFormControlSelect1">Select Category</label>
               <select  v-model="form.category_type" class="form-control" id="exampleFormControlSelect1" name="category_type" :class="{ 'is-invalid': form.errors.has('category_type') }" style="" required>
                 <option value="" disabled>Select</option>
                 <option style="color:blue;font-weight:bold;" value="0">Main Category</option>





<option style="color:green;font-weight:bold;" v-for="v_category in showcategoryinform" :value="v_category.id">{{v_category.category_name}}</option>

                 <!-- <option style="color:green;font-weight:bold;" value="Female">Female</option> -->

               </select>
               <has-error :form="form" field="category_type"></has-error>
        </div>

        <div class="form-group">
        <label>Category Url</label>
        <input v-model="form.category_url" type="text" name="category_url"
        class="form-control" :class="{ 'is-invalid': form.errors.has('category_url') }" placeholder="Enater Category Url">
        <has-error :form="form" field="category_url"></has-error>
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
    <th style="text-align:center;">Category Id</th>
      <th style="text-align:center;">Parent Id</th>
    <th style="text-align:center;">Category Name</th>
    <th style="text-align:center;">Category Type</th>
      <th style="text-align:center;">Category Url</th>

    <th style="text-align:center;">Category Added Date</th>
    <th style="text-align:center;">Category Status</th>

    <th style="text-align:center;">ON/OFF</th>
    <th style="text-align:center;width:150px;">Action</th>
</tr>




</thead>

<tbody>

 <tr v-for="(v_cat,index) in myallcategory">


   <td style="text-align:center;padding-top:30px">{{index+1}}</td>
    <td style="text-align:center;padding-top:30px;color:blue;">{{v_cat.id}}</td>
    <td style="text-align:center;padding-top:30px;color:blue;">{{v_cat.category_type}}</td>
   <td style="text-align:center;padding-top:30px;">{{v_cat.category_name}}</td>
   <td style="text-align:center;padding-top:30px;color:blue;">

     <div v-if="v_cat.category_type == 0">
      <p style="text-align:center;color:blue;">Main Category</p>
     </div>
     <div v-else>
      <p style="text-align:center;color:red;">Sub Category</p>
     </div>


   </td>


   <td style="text-align:center;padding-top:30px;color:blue;">{{v_cat.category_url}}</td>
   <td style="text-align:center;padding-top:30px;">{{v_cat.category_added_date}}</td>


    <td>

    <div v-if="v_cat.category_status == 1">
     <p style="text-align:center;color:blue;padding-top:17px">Active</p>
    </div>
    <div v-else="v_cat.category_status == 0">
     <p style="text-align:center;color:red;padding-top:17px">Unactive</p>
    </div>




    </td>

    <td>
   <center>
    <div v-if="v_cat.category_status == 1">
    <a class="btn btn-primary btn-sm" style="margin-top:15px;color:white;" @click.prevent = "activecategoryoff(v_cat.id)" >OFF</a>
    </div>

    <div v-else="v_cat.category_status == 0">
    <a class="btn btn-success btn-sm" style="margin-top:15px;color:white;" @click.prevent = "unactivecategoryon(v_cat.id)" >ON</a>
    </div>


  </center>


  </td>

  <td>

     <center>


    <router-link :to="`/edit_category_route/${v_cat.id}`" class="btn btn-success btn-sm" style="margin-top:17px;" ><i class="fa fa-edit" aria-hidden="true"></i></router-link>
    <a class="btn btn-warning btn-sm" style="margin-top:17px;" @click.prevent = "deletecategory(v_cat.id)"><i class="fa fa-trash" aria-hidden="true"></i></a>
    <router-link :to="`/view_category/${v_cat.id}`" class="btn btn-primary btn-sm" style="margin-top:17px;"><i class="fa fa-eye" aria-hidden="true"></i></router-link>

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

           showcategoryinform:{},
           myallcategory:{},


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

       //show all category
      showallcategoryinform(){

      axios.get('/show_all_category_in_form').then(({data}) => (this.showcategoryinform = data));

      },


     allcategory(){

     axios.get('/show_all_category').then(({data}) => (this.myallcategory = data));


    },


 //    allcategory(){
 //
 //   axios.get('/show_all_category').then((res) => {
 //
 //   this.myallcategory = res.data.myallcategory
 //
 //
 //   })
 //
 //
 // },


       addcategory(){


         this.form.post('/addcategory_formaction')

        .then((response)=>{

         $('#exampleModal').modal('hide')

         this.form.reset();

         this.allcategory();

            Toast.fire({
            icon: 'success',
            title: 'Category Added Successfully'
            })

          })

             .catch(()=>{

            console.log('fail');

            })

            },


  activecategoryoff(id){

    axios.get('/active_category_unactive/'+id)
    .then((response)=>{
      Toast.fire({
      icon: 'success',
      title: 'Category Unactive Successfully'
     })

           this.allcategory();


     })

     },

  //unactive category on
    unactivecategoryon(id){

      axios.get('/unactive_category_active/'+id)
      .then((response)=>{

        Toast.fire({
        icon: 'success',
        title: 'Category Active Successfully'
       })

       this.allcategory();



       })

     },



     deletecategory(id){

       axios.get('/category_delete/'+id)
       .then((response)=>{

         Toast.fire({
         icon: 'success',
         title: 'Category Delete Successfully'
        })

        this.allcategory();



        })

      },







 },


 computed:{


 },




         mounted() {


           this.showallcategoryinform();
           this.allcategory();



         }
     }
 </script>
