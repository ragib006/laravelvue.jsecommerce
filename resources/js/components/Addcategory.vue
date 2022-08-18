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
                      <h3 class="card-title">All Category</h3>
                      </div>
                      <div class="but">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" style="margin-left:670px;">
                            Add Category
                          </button>
                        </div>

                       </div>


                          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content" style="width:550px;">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">


        <form enctype="multipart/form-data" role="form" @submit.prevent = "addcategory()">


             <div class="form-group">
               <label>Category Name</label>
               <input v-model="form.cat_name" type="text" name="cat_name"
                 class="form-control" :class="{ 'is-invalid': form.errors.has('cat_name') }">
               <has-error :form="form" field="cat_name"></has-error>
             </div>

             <div class="form-group">
               <label>Category Url</label>
               <input v-model="form.cat_url" type="text" name="cat_url"
                 class="form-control" :class="{ 'is-invalid': form.errors.has('cat_url') }">
               <has-error :form="form" field="cat_url"></has-error>
             </div>

             <div class="form-group">
                <label for="exampleFormControlSelect1">Added By</label>
                  <select  v-model="form.cat_addedby" class="form-control" id="exampleFormControlSelect1" name="cat_addedby" :class="{ 'is-invalid': form.errors.has('cat_addedby') }" style="width:500px;" required>
                    <option value="" disabled>Select</option>
                      <option value="Ragib">Ragib</option>
                      <option value="Ayon">Ayon</option>
                      <option value="Mumu">Mumu</option>
                      <option value="Akash">Akash</option>
                  </select>
                  <has-error :form="form" field="cat_addedby"></has-error>
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

                           <th style="text-align:center;">Category ID</th>
                           <th style="text-align:center;">Category Name</th>

                           <th style="text-align:center;">Category Url</th>





                          <th style="text-align:center;">Added By</th>
                          <th style="text-align:center;">Date</th>
                          <th style="text-align:center;">Status</th>
                          <th style="text-align:center;">ON/OFF</th>

                          <th style="text-align:center;">Action</th>


                        </tr>
                        </thead>


                        <tbody>



                        <tr v-for="showcategory in categorys" :key="showcategory.id">


                          <td style="text-align:center;padding-top:30px;">{{showcategory.id}}</td>
                          <td style="text-align:center;padding-top:30px;color:blue;">{{showcategory.cat_name}}</td>

                          <td style="text-align:center;padding-top:30px;">{{showcategory.cat_url}}</td>

                          <td style="text-align:center;padding-top:30px;">{{showcategory.cat_addedby }}</td>
                            <td style="text-align:center;padding-top:30px;">{{showcategory.created_at | timeformat }}</td>


                          <td>
                             <div v-if="showcategory.cat_status == 1">
                              <p style="text-align:center;color:blue;padding-top:18px">Active</p>
                             </div>

                             <div v-else="showcategory.cat_status == 0">
                                <p style="text-align:center;color:red;padding-top:18px">Unactive</p>
                             </div>
                         </td>





                          <td>
                             <div v-if="showcategory.cat_status == 1">
                              <a class="btn btn-primary btn-sm" style="margin-top:17px;color:white;margin-left:42px;" @click.prevent = "activecategoryoff(showcategory.id)" >OFF</a>
                             </div>

                             <div v-else="showcategory.cat_status == 0">

                                <a class="btn btn-success btn-sm" style="margin-top:17px;color:white;margin-left:42px;" @click.prevent = "unactivecategoryon(showcategory.id)" >ON</a>
                             </div>
                         </td>









        <td>
      <center>
        <a class="btn btn-primary btn-sm" style="margin-top:17px;"  href=""><i class="fa fa-eye" aria-hidden="true"></i></i></a>
        <router-link :to="`/edit_category/${showcategory.id}`" class="btn btn-success btn-sm" style="margin-top:17px;" ><i class="fa fa-edit" aria-hidden="true"></i></router-link>
        <a class="btn btn-warning btn-sm" style="margin-top:17px;" @click.prevent = "deletecategory(showcategory.id)"><i class="fa fa-trash" aria-hidden="true"></i></a>
      </center>
        </td>
















                        </tr>


                        </tbody>



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

          categorys: {},

          // Create a new form instance
          form: new Form({

            cat_name: '',
            cat_url: '',
            cat_addedby: '',

            cat_status : '',

          })
        }
      },





    methods:{




      //show all category
              allcategory(){

               axios.get('/allcategory').then(({data}) => (this.categorys = data));


             },





     //add category
        addcategory(){

          this.form.post('/addcategory_formaction')

          .then((response)=>{
             //data insert and modan hide
             $('#exampleModal').modal('hide')
             //data insert and go this path
             this.$router.push('/add_category')
             //the form reset
             this.form.reset();
             //then data insert we see the data at this moment
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




//delate dategory


deletecategory(id){







  axios.get('/delate-category/'+id)

  .then((response)=>{


     this.allcategory();

        Toast.fire({
        icon: 'success',
        title: 'Category delate Successfully'
         })
      })

 .catch(()=>{

console.log('fail');

})
















  // Swal.fire({
  //         title: 'Are you sure?',
  //         text: "You won't be able to revert this!",
  //         icon: 'warning',
  //         showCancelButton: true,
  //         confirmButtonColor: '#3085d6',
  //         cancelButtonColor: '#d33',
  //         confirmButtonText: 'Yes, delete it!'
  //         }).then((result) => {
  //         //
  //        axios.get('/delate-category/'+id).then(()=>{
  //
  //          if (result.isConfirmed) {
  //          Swal.fire(
  //          'Deleted!',
  //          'Your file has been deleted.',
  //          'success'
  //          )
  //
  //          this.allcategory();
  //        }
  //
  //        })
  //       .catch(()=>{
  //
  //       })
  //
  //       })

  //
  // Swal.fire({
  //   title: 'Are you sure?',
  //   text: "You won't be able to revert this!",
  //   icon: 'warning',
  //   showCancelButton: true,
  //   confirmButtonColor: '#3085d6',
  //   cancelButtonColor: '#d33',
  //   confirmButtonText: 'Yes, delete it!'
  //   }).then((result) => {
  //   //
  //  axios.get('/delate-category/'+id).then(()=>{
  //
  //
  //
  //    if (result.value) {
  //
  //    Swal.fire(
  //    'Deleted!',
  //    'Your file has been deleted.',
  //    'success'
  //    )
  //
  //     this.allcategory();
  //      //this.showcustomers();
  //
  //    }
  //
  //
  //  })
  //
  //
  //  .catch(()=>{
  //
  //
  //
  //
  //  })
  //
  //
  // //  })



  // something else for "Cancel".






//
//   Swal.fire({
//     title: 'Are you sure?',
//     text: "You won't be able to revert this!",
//     icon: 'warning',
//     showCancelButton: true,
//     confirmButtonColor: '#3085d6',
//     cancelButtonColor: '#d33',
//     confirmButtonText: 'Yes, delete it!'
//   }).then((result) => {
//
//
// axios.get('/delate-category/'+id).then(()=>{
//
//
//
//   if (result.isConfirmed) {
//     Swal.fire(
//       'Deleted!',
//       'Your file has been deleted.',
//       'success'
//     )
//     this.allcategory();
//   }
//
//
// })
//
//  })




// const swalWithBootstrapButtons = Swal.mixin({
//   customClass: {
//     confirmButton: 'btn btn-success',
//     cancelButton: 'btn btn-danger'
//   },
//   buttonsStyling: false
// })
//
// swalWithBootstrapButtons.fire({
//   title: 'Are you sure?',
//   text: "You won't be able to revert this!",
//   icon: 'warning',
//   showCancelButton: false,
//   confirmButtonText: 'Yes, delete it!',
//   cancelButtonText: 'No, cancel!',
//   reverseButtons: false
// }).then((result) => {
//
//
//
//
// axios.get('/delate-category/'+id).then(()=>{
//
//
//   if (result.isConfirmed) {
//     swalWithBootstrapButtons.fire(
//       'Deleted!',
//       'Your file has been deleted.',
//       'success'
//     )
//   }
//
//
//
//
//
//
//  this.allcategory();
//
//
//
// })
//
//
//
//
//
//
//
//
// })




        },


        //active category OFF

  activecategoryoff(id){
     axios.get('/active_category_unactive/'+id)
     .then((response)=>{
   //data insert and go this path
     this.$router.push('/add_category')

     this.allcategory();
     Toast.fire({
     icon: 'success',
     title: 'Category Unactive Successfully'
     })

     })

   .catch(()=>{

   console.log('fail');

     })

     },


//unctive ctegory on


unactivecategoryon(id){

  axios.get('/unactive_category_active/'+id)
  .then((response)=>{
//data insert and go this path
  this.$router.push('/add_category')

  this.allcategory();
  Toast.fire({
  icon: 'success',
  title: 'Category Active Successfully'
  })

  })

  .catch(()=>{
   console.log('fail');

  })

  },











},







        mounted() {
          //all category load this mounted
          this.allcategory();

        }
    }
</script>
