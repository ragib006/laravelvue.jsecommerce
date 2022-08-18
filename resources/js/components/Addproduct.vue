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
                      <h3 class="card-title">All Product</h3>
                      </div>
                      <div class="but">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" style="margin-left:670px;">
                            Add Product
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
                                  <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">


        <form enctype="multipart/form-data" role="form" @submit.prevent = "addproduct()">


             <div class="form-group">
               <label>Product Name</label>
               <input v-model="form.product_name" type="text" name="product_name"
                 class="form-control" :class="{ 'is-invalid': form.errors.has('product_name') }" placeholder="Enter product Name" required>
               <has-error :form="form" field="product_name"></has-error>
             </div>

             <div class="form-group">
                <label for="exampleFormControlSelect1">Seclect Category</label>
                  <select  v-model="form.category_id" class="form-control" id="exampleFormControlSelect1" name="category_id" :class="{ 'is-invalid': form.errors.has('category_id') }" style="width:500px;" required>
                    <option value="" disabled>Select</option>
                    <option v-for="category in showallcategoryinproductpage" :value="category.id">{{category.cat_name}}</option>
                      <!-- <tr v-for="showcategory in categorys" :key="showcategory.id"> -->

                  </select>
                  <has-error :form="form" field="category_id"></has-error>
             </div>








             <div class="form-group">
               <label>Product Url</label>
               <input v-model="form.product_url" type="text" name="product_url"
                 class="form-control" :class="{ 'is-invalid': form.errors.has('product_url') }" placeholder="Enter Product Url" required>
               <has-error :form="form" field="product_url"></has-error>
             </div>

             <div class="form-group">
               <label>Product Price</label>
               <input v-model="form.product_price" type="number" name="product_price"
                 class="form-control" :class="{ 'is-invalid': form.errors.has('product_price') }" required>
               <has-error :form="form" field="product_price"></has-error>
             </div>

             <div class="form-group">
               <label>Product Quantity</label>
               <input v-model="form.product_qty" type="number" name="product_qty"
                 class="form-control" :class="{ 'is-invalid': form.errors.has('product_qty') }" required>
               <has-error :form="form" field="product_qty"></has-error>
             </div>


             <div class="form-group">
             <label for="exampleInputFile">File input</label>
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
                <label for="exampleFormControlSelect1">Added By</label>
                  <select  v-model="form.product_addedby" class="form-control" id="exampleFormControlSelect1" name="product_addedby" :class="{ 'is-invalid': form.errors.has('product_addedby') }" style="width:500px;" required>
                    <option>Select</option>
                      <option value="Ragib">Ragib</option>
                      <option value="Ayon">Ayon</option>
                      <option value="Mumu">Mumu</option>
                      <option value="Akash">Akash</option>
                  </select>
                  <has-error :form="form" field="product_addedby"></has-error>
             </div>


             <div class="form-group">
               <label>Product Description</label>
               <textarea v-model="form.product_description" type="text" name="product_description"
                 class="form-control" :class="{ 'is-invalid': form.errors.has('product_description') }" placeholder="Enter Product Description" required></textarea>
               <has-error :form="form" field="product_description"></has-error>
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

          <tr v-for="showproduct in getallCategory">

            <td style="text-align:center;padding-top:30px;">{{showproduct.id}}</td>
            <td style="text-align:center;padding-top:30px;color:blue;">{{showproduct.product_name}}</td>
            <td style="text-align:center;padding-top:30px;">{{showproduct.category_name.cat_name}}</td>
            <td style="text-align:center;padding-top:30px;">{{showproduct.product_quantity}}</td>
            <td style="text-align:center;padding-top:30px;">{{showproduct.product_price}} TK</td>
            <td style="text-align:center"><img :src="ourimage(showproduct.product_image)" alt="" style="height:70px;width:70px;"></td>
            <td>
               <div v-if="showproduct.product_status == 1">
                 <p style="text-align:center;color:blue;padding-top:18px">Active</p>
               </div>
               <div v-else="showproduct.product_status == 0">
                 <p style="text-align:center;color:red;padding-top:18px">Unactive</p>
               </div>
            </td>

             <td>
                <div v-if="showproduct.product_status == 1">
                  <a class="btn btn-primary btn-sm" style="margin-top:17px;color:white;margin-left:42px;" @click.prevent = "activeproductoff(showproduct.id)" >OFF</a>
                </div>
                <div v-else="showproduct.product_status == 0">
                  <a class="btn btn-success btn-sm" style="margin-top:17px;color:white;margin-left:42px;" @click.prevent = "unactiveproducton(showproduct.id)" >ON</a>
                </div>
              </td>


           <td>
              <center>
               <router-link :to="`/view_product/${showproduct.id}`" class="btn btn-primary btn-sm" style="margin-top:17px;"><i class="fa fa-eye" aria-hidden="true"></i></router-link>
               <router-link :to="`/edit_product/${showproduct.id}`" class="btn btn-warning btn-sm" style="margin-top:17px;"><i class="fa fa-edit" aria-hidden="true"></i></router-link>
               <a class="btn btn-danger btn-sm" style="margin-top:17px;" @click.prevent = "deleteproduct(showproduct.id)"><i class="fa fa-trash" aria-hidden="true"></i></a>
              </center>
           </td>

         </tr>
       </tbody>



       <!-- <tbody>

         <tr v-for="showproduct in getallCategory">

           <td style="text-align:center;padding-top:30px;">{{showproduct.id}}</td>
           <td style="text-align:center;padding-top:30px;color:blue;">{{showproduct.id}}</td>
           <td style="text-align:center;padding-top:30px;">Shirt</td>
           <td style="text-align:center;padding-top:30px;">Ragib</td>
           <td style="text-align:center;padding-top:30px;">t-shirt</td>
           <td style="text-align:center"><img  alt="NOT FOUND" style="height:70px;width:70px;"></td>
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
          //  categorys: {},
        //  search:'',
        //  products: {},

          showallcategoryinproductpage:{},

          // Create a new form instance
          form: new Form({

              product_name: '',
             	category_id: '',
             	product_url: '',
              product_image: '',
              product_description:'',
              product_addedby:'',
              product_price:'',
              product_qty:'',
              product_status:'',

          })
        }
      },




    methods:{






//current image show when select image


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
        addproduct(){

           this.form.post('/addproduct_formaction')

             .then((response)=>{
             //data insert and modan hide
              $('#exampleModal').modal('hide')
             //data insert and go this path
              this.$router.push('/add_product')
             //the form reset
              this.form.reset();
             //then data insert we see the data at this moment
              //this.allproduct();
            //  this.allproduct();
              this.$store.dispatch("allCategory")

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

          this.$store.dispatch("allCategory")

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


  activeproductoff(id){
     axios.get('/active_product_unactive/'+id)
     .then((response)=>{

     this.$router.push('/add_product')

    // this.allproduct();
     this.$store.dispatch("allCategory")
     Toast.fire({
     icon: 'success',
     title: 'Product Unactive Successfully'
     })

     })

   .catch(()=>{

   console.log('fail');

     })

     },





 //unctive product on

unactiveproducton(id){

  axios.get('/unactive_product_active/'+id)
  .then((response)=>{
  this.$router.push('/add_product')

  //this.allproduct();
  this.$store.dispatch("allCategory")
  Toast.fire({
  icon: 'success',
  title: 'Product Active Successfully'
  })

  })

  .catch(()=>{
   console.log('fail');

  })

  },


get_all_category(){

axios.get('/allcategory').then(({data}) => (this.showallcategoryinproductpage = data));

},


},



computed:{

getallCategory(){

   return this.$store.getters.getCategory

}


},






        mounted() {


        //this.allproduct();

        this.get_all_category();

      this.$store.dispatch("allCategory")

        }
    }
</script>
