<template>
    <span>


      <Mybackendheader></Mybackendheader>
      <MyBackendsidebar></MyBackendsidebar>

 <div class="card card-primary" style="width:550px;margin-top:25px;margin-left:350px;margin-bottom:200px;">


<!-- {{this.$route.params.id}} -->
<div class="card-header">
  <h3 class="card-title">Edit Category</h3>

</div>

<form enctype="multipart/form-data" role="form" @submit.prevent = "updatecategory()">

<div class="card-body">



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





  <div class="form-group">
  <label>Category Added Date</label>
  <input v-model="form.category_added_date" type="text" name="category_added_date"
  class="form-control" :class="{ 'is-invalid': form.errors.has('category_added_date') }" placeholder="12-07-2021">
  <has-error :form="form" field="category_added_date"></has-error>
  </div>












      <button type="submit" class="btn btn-primary">Update</button>



</div>

</form>


</div>



  <!-- <Mybackendfooter></Mybackendfooter> -->



</span>


</template>

<script>

import Mybackendheader from "./Adminheader.vue"
import MyBackendsidebar from "./Adminsidebar.vue"
//
  // import Mybackendfooter from "./Adminfooter.vue"
    export default {


      data () {
        return {


            showcategoryinform:{},

          // Create a new form instance
          form: new Form({

             id:'',
            category_name: '',
            category_type: '',
            category_added_date:'',
            category_url:'',
            category_status:'',


          })
        }
      },


      components: {
         MyBackendsidebar,
         Mybackendheader,
         // Mybackendfooter,
       },


methods:{



  showallcategoryinform(){

  axios.get('/show_all_category_in_form').then(({data}) => (this.showcategoryinform = data));

  },

//   showalldepartmentincourse(){
//
// axios.get('/show_all_department_in_add_course_form').then(({data}) => (this.allmydepartment = data));
//
//   },


    //update category


    updatecategory(){


      this.form.post('/update_category/'+this.$route.params.id)
         .then((response)=>{
          this.$router.push('/add_category')

           Toast.fire({
           icon: 'success',
           title: 'Category Update Successfully'
           })

           })
           .catch(()=>{

             console.log('error');

           })

    }







},




        mounted() {


        this.showallcategoryinform();



        axios.get('/edit_categoryplaceholder_value/'+this.$route.params.id)
        .then((response)=>{

        this.form.fill(response.data)

        })



        },



    }
</script>
