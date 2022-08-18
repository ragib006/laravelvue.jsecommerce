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
                      <h3 class="card-title">All Logo</h3>
                      </div>
                      <div class="but">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" style="margin-left:670px;">
                            Add Logo
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
                                  <h5 class="modal-title" id="exampleModalLabel">Add Logo</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">


        <form enctype="multipart/form-data" role="form" @submit.prevent = "addlogo()">


             <div class="form-group">
               <label>Logo Name</label>
               <input v-model="form.logo_name" type="text" name="logo_name"
                 class="form-control" :class="{ 'is-invalid': form.errors.has('logo_name') }" placeholder="Enter Logo Name" required>
               <has-error :form="form" field="logo_name"></has-error>
             </div>

             <!-- <div class="form-group">
                <label for="exampleFormControlSelect1">Seclect Category</label>
                  <select  v-model="form.category_id" class="form-control" id="exampleFormControlSelect1" name="category_id" :class="{ 'is-invalid': form.errors.has('category_id') }" style="width:500px;" required>
                    <option value="" disabled>Select</option>
                    <option v-for="category in showallcategoryinproductpage" :value="category.id">{{category.cat_name}}</option>


                  </select>
                  <has-error :form="form" field="category_id"></has-error>
             </div> -->








             <div class="form-group">
               <label>Website Title</label>
               <input v-model="form.website_title" type="text" name="website_title"
                 class="form-control" :class="{ 'is-invalid': form.errors.has('website_title') }" placeholder="Enter Product Url" required>
               <has-error :form="form" field="website_title"></has-error>
             </div>

             <div class="form-group">
             <label for="exampleInputFile">File input</label>
             <div class="ass" style="margin-bottom:10px;">
              <img :src="form.logo_image" alt="" style="height:70px;width:70px;">
             </div>

             <div class="input-group">
               <div class="custom-file">
                 <input @change="changephoto($event)" type="file" class="custom-file-input" id="exampleInputFile" name="logo_image" :class="{ 'is-invalid': form.errors.has('logo_image') }" required>
                 <label class="custom-file-label" for="exampleInputFile">Choose file</label>


                 <has-error :form="form" field="logo_image"></has-error>
               </div>

             </div>
           </div>













             <!-- <div class="form-group">
                <label for="exampleFormControlSelect1">Added By</label>
                  <select  v-model="form.product_addedby" class="form-control" id="exampleFormControlSelect1" name="product_addedby" :class="{ 'is-invalid': form.errors.has('product_addedby') }" style="width:500px;" required>
                    <option value="" disabled>Select</option>
                      <option value="Ragib">Ragib</option>
                      <option value="Ayon">Ayon</option>
                      <option value="Mumu">Mumu</option>
                      <option value="Akash">Akash</option>
                  </select>
                  <has-error :form="form" field="product_addedby"></has-error>
             </div> -->


             <!-- <div class="form-group">
               <label>Product Description</label>
               <textarea v-model="form.product_description" type="text" name="product_description"
                 class="form-control" :class="{ 'is-invalid': form.errors.has('product_description') }" placeholder="Enter Product Description" required></textarea>
               <has-error :form="form" field="product_description"></has-error>
             </div> -->










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

                           <th style="text-align:center;">Logo ID</th>
                           <th style="text-align:center;">Logo Name</th>
                            <th style="text-align:center;">Website Name</th>

                          <th style="text-align:center;">Image</th>
                          <th style="text-align:center;">Status</th>
                          <th style="text-align:center;">ON/OFF</th>

                          <th style="text-align:center;">Action</th>


                        </tr>
                        </thead>

        <tbody>

          <tr v-for="mylogo in logos">

            <td style="text-align:center;padding-top:30px;">{{mylogo.id}}</td>
            <td style="text-align:center;padding-top:30px;color:blue;">{{mylogo.logo_name}}</td>
            <td style="text-align:center;padding-top:30px;">{{mylogo.website_title}}</td>

            <td style="text-align:center"><img img :src="ourimage(mylogo.logo_image)" alt="NOT FOUND" style="height:70px;width:70px;"></td>
            <td>
               <div v-if="mylogo.logo_status == 1">
                 <p style="text-align:center;color:blue;padding-top:18px">Active</p>
               </div>
               <div v-else="mylogo.logo_status == 0">
                 <p style="text-align:center;color:red;padding-top:18px">Unactive</p>
               </div>
            </td>

             <td>
                <div v-if="mylogo.logo_status == 1">
                  <a class="btn btn-primary btn-sm" style="margin-top:17px;color:white;margin-left:42px;" @click.prevent = "activelogooff(mylogo.id)" >OFF</a>
                </div>
                <div v-else="mylogo.logo_status == 0">
                  <a class="btn btn-success btn-sm" style="margin-top:17px;color:white;margin-left:42px;" @click.prevent = "unactivelogoon(mylogo.id)" >ON</a>
                </div>
              </td>


           <td>
              <center>
               <!-- <router-link :to="`/view_product/${mylogo.id}`" class="btn btn-primary btn-sm" style="margin-top:17px;"><i class="fa fa-eye" aria-hidden="true"></i></router-link>
               <router-link :to="`/edit_product/${mylogo.id}`" class="btn btn-warning btn-sm" style="margin-top:17px;"><i class="fa fa-edit" aria-hidden="true"></i></router-link>
                -->
               <a class="btn btn-danger btn-sm" style="margin-top:17px;" @click.prevent = "deleteproduct(mylogo.id)"><i class="fa fa-trash" aria-hidden="true"></i></a>
              </center>
           </td>

         </tr>
       </tbody>


<!--
       <tbody>

         <tr v-for="mylogo in logos">

           <td style="text-align:center;padding-top:30px;">{{mylogo.id}}</td>
           <td style="text-align:center;padding-top:30px;color:blue;">{{mylogo.logo_name}}</td>
           <td style="text-align:center;padding-top:30px;">{{mylogo.website_title}}</td>

           <td style="text-align:center"><img img :src="ourimage(mylogo.logo_image)" alt="NOT FOUND" style="height:70px;width:70px;"></td>
           <td>
              <div>
                <p style="text-align:center;color:blue;padding-top:18px">Active</p>
              </div>

           </td>

            <td>

               <div>
                 <a class="btn btn-success btn-sm" style="margin-top:17px;color:white;margin-left:42px;">ON</a>
               </div>
             </td>


          <td>
             <center>
              <a href="#" class="btn btn-primary btn-sm" style="margin-top:17px;"><i class="fa fa-eye" aria-hidden="true"></i></a>
              <a href="#" class="btn btn-warning btn-sm" style="margin-top:17px;"><i class="fa fa-edit" aria-hidden="true"></i></a>
              <a href="#" class="btn btn-danger btn-sm" style="margin-top:17px;"><i class="fa fa-trash" aria-hidden="true"></i></a>
             </center>
          </td>

        </tr>
      </tbody> -->

























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
    export default {


      data () {
        return {
            logos:{},
          //  categorys: {},
        //  search:'',
        //  products: {},

          showallcategoryinproductpage:{},

          // Create a new form instance
          form: new Form({

              logo_name: '',
             	website_title: '',
              logo_image: '',
              logo_status:'',

          })
        }
      },




    methods:{






//current image show when select image


      changephoto(event){

             let file = event.target.files[0];
             let reader = new FileReader();
             reader.onload = event => {
             this.form.logo_image  = event.target.result
             console.log(event.target.result)
             };
             reader.readAsDataURL(file);

             },


              //image display in table




             ourimage(img){

                 return "images/"+img;

             },









         //show all logo


              alllogo(){

               axios.get('/alllogo').then(({data}) => (this.logos = data));


             },





     //add category
        addlogo(){

           this.form.post('/addlogo_formaction')

             .then((response)=>{
             //data insert and modan hide
              $('#exampleModal').modal('hide')
             //data insert and go this path
              this.$router.push('/add_logo')
             //the form reset
              this.form.reset();
             //then data insert we see the data at this moment
              //this.allproduct();
              this.alllogo();
            //  this.allproduct();
              ///this.$store.dispatch("allCategory")

                Toast.fire({
                icon: 'success',
                title: 'Product Added Successfully'
                 })
                         // console.log('hi ragib');
            })

              .catch(()=>{

               console.log('fail');

              })

          },




//delate dategory


deleteproduct(id){

  axios.get('/delate-product/'+id)

//this.$router.push('/add_product')
  .then((response)=>{

        //  this.$store.dispatch("allCategory")
          this.alllogo();

        Toast.fire({
        icon: 'success',
        title: 'Product delate Successfully'
         })
      })

 .catch(()=>{

console.log('fail');

})

},




  //active product OFF



  activelogooff(id){
     axios.get('/active_logo_unactive/'+id)
     .then((response)=>{

    // this.$router.push('/add_product')
this.$router.push('/add_logo')
    // this.allproduct();
     //this.$store.dispatch("allCategory")
       this.alllogo();
     Toast.fire({
     icon: 'success',
     title: 'Logo Unactive Successfully'
     })

     })

   .catch(()=>{

   console.log('fail');

     })

     },





 //unctive product on

unactivelogoon(id){

  axios.get('/unactive_logo_active/'+id)
  .then((response)=>{
  //this.$router.push('/add_product')
  this.$router.push('/add_logo')

  //this.allproduct();
  //this.$store.dispatch("allCategory")
    this.alllogo();
  Toast.fire({
  icon: 'success',
  title: 'Logo Active Successfully'
  })

  })

  .catch(()=>{
   console.log('fail');

  })

  },


// get_all_category(){
//
// axios.get('/allcategory').then(({data}) => (this.showallcategoryinproductpage = data));
//
// },


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
        this.alllogo();
      //  this.get_all_category();

     //  this.$store.dispatch("allCategory")

        }
    }
</script>
