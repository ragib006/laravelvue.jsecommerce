<template>
    <div>


      <Mybackendheader></Mybackendheader>
      <MyBackendsidebar></MyBackendsidebar>

 <div class="card card-primary" style="width:550px;margin-top:25px;margin-left:400px;margin-bottom:300px;">


<div class="card-header">
  <h3 class="card-title">Edit Product</h3>

</div>

<form enctype="multipart/form-data" role="form" @submit.prevent = "updateproduct()">

<div class="card-body">






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
                 
                      <img :src="updateimage()" alt="" style="height:70px;width:70px;">
                      </div>

                      <div class="input-group">
                      <div class="custom-file">
                      <input @change="changephoto($event)" type="file" class="custom-file-input" id="exampleInputFile" name="product_image" :class="{ 'is-invalid': form.errors.has('product_image') }">
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


                        <div class="form-group">
                        <label>Product Added Date</label>
                        <input v-model="form.product_added_date" type="text" name="product_added_date"
                        class="form-control" :class="{ 'is-invalid': form.errors.has('product_added_date') }" placeholder="Format 07-03-2021">
                        <has-error :form="form" field="product_added_date"></has-error>
                        </div>







      <button type="submit" class="btn btn-primary">Update</button>




</div>

  </form>



    </div>
    </div>
</template>

<script>

import Mybackendheader from "./Adminheader.vue"
import MyBackendsidebar from "./Adminsidebar.vue"

    export default {


      data () {
        return {

         showsubcategoryinform:{},

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



          })
        }
      },


      components: {

        MyBackendsidebar,
        Mybackendheader,


       },



methods:{





  showallsubcategoryinform(){

  axios.get('/show_all_sub_category_in_form').then(({data}) => (this.showsubcategoryinform = data));

  },






  changephoto(event){

       let file = event.target.files[0];
       let reader = new FileReader();
       reader.onload = event => {
       this.form.product_image  = event.target.result
       console.log(event.target.result)
       };
       reader.readAsDataURL(file);

       },


       updateimage(){

        let img = this.form.product_image;
        if(img.length>100){

           return  this.form.product_image

        }else {


           return "/images/"+this.form.product_image

        }

     },







    //update category
     updateproduct(){

     this.form.post('/update_product/'+this.$route.params.product_id)
        .then((response)=>{
         this.$router.push('/add_product')

          Toast.fire({
          icon: 'success',
          title: 'Product Update Successfully'
          })

          })
          .catch(()=>{

            console.log('error');

          })



    },







},




        mounted(){

          this.showallsubcategoryinform();


         axios.get('/edit_libary_book_placeholder_value/'+this.$route.params.product_id)
          .then((response)=>{

        this.form.fill(response.data)

          })



        },



    }
</script>
