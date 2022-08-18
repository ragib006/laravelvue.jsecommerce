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
                      <!-- <div class="but">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" style="margin-left:670px;">
                            Add Category
                          </button>
                        </div> -->

                       </div>






                    </div>
















                    <!-- /.card-header -->
                    <div class="card-body" >

                      <table id="section" class="table table-bordered table-striped">



                        <thead>
                        <tr>

                           <th style="text-align:center;">Orer Id</th>
                           <th style="text-align:center;">Customer Name</th>

                           <th style="text-align:center;">Date</th>

                          <th style="text-align:center;">Total Product</th>
                          <th style="text-align:center;">Order Status</th>
                          <th style="text-align:center;">Payment Method</th>
                          <th style="text-align:center;">Payment Status</th>
                          <th style="text-align:center;">Total</th>

                          <th style="text-align:center;">Action</th>


                        </tr>
                        </thead>


                        <tbody>



                        <tr v-for="showorder in showallorder">


                          <td style="text-align:center;padding-top:30px;">{{showorder.id}}</td>
                          <td style="text-align:center;padding-top:30px;color:blue;">{{showorder.customer_name}}</td>

                          <td style="text-align:center;padding-top:30px;">{{showorder.order_date}}</td>

                          <td style="text-align:center;padding-top:30px;">{{showorder.total_products}}</td>
                            <td>

                              <!-- {{showorder.order_status}} -->

                              <div v-if="showorder.order_status == 'pending'">
                               <a class="btn btn-danger btn-sm" style="margin-top:17px;color:white;margin-left:42px;" >Pending</a>
                              </div>

                              <div v-else="showorder.order_status == 'success'">

                                 <a class="btn btn-success btn-sm" style="margin-top:17px;color:white;margin-left:42px;" >Success</a>
                              </div>




                            </td>

                          <td style="text-align:center;padding-top:30px;">{{showorder.payment_method}}</td>
                          <td style="text-align:center;padding-top:30px;">{{showorder.payment_status}}</td>
                            <td style="text-align:center;padding-top:30px;">{{showorder.total}} TK</td>
                          <!-- <td>


                            <!-- <div>
                             <p style="text-align:center;color:blue;padding-top:18px">Active</p>
                            </div> -->

                             <!-- <div v-if="showcategory.cat_status == 1">
                              <p style="text-align:center;color:blue;padding-top:18px">Active</p>
                             </div>

                             <div v-else="showcategory.cat_status == 0">
                                <p style="text-align:center;color:red;padding-top:18px">Unactive</p>
                             </div> -->
                      <!--   </td> -->





                          <!-- <td>
                             <!-- <div v-if="showcategory.cat_status == 1">
                              <a class="btn btn-primary btn-sm" style="margin-top:17px;color:white;margin-left:42px;" @click.prevent = "activecategoryoff(showcategory.id)" >OFF</a>
                             </div>

                             <div v-else="showcategory.cat_status == 0">

                                <a class="btn btn-success btn-sm" style="margin-top:17px;color:white;margin-left:42px;" @click.prevent = "unactivecategoryon(showcategory.id)" >ON</a>
                             </div> -->

                        <!--     <div>
                              <a class="btn btn-primary btn-sm" style="margin-top:17px;color:white;margin-left:42px;">OFF</a>
                             </div>


                         </td> -->









        <td>
      <!-- <center>
      <router-link :to="`/view_product/${showproduct.id}`" class="btn btn-primary btn-sm" style="margin-top:17px;"><i class="fa fa-eye" aria-hidden="true"></i></router-link>
        <a class="btn btn-primary btn-sm" style="margin-top:17px;"  href=""><i class="fa fa-eye" aria-hidden="true"></i></i></a>
        <router-link :to="`/edit_category/${showcategory.id}`" class="btn btn-success btn-sm" style="margin-top:17px;" ><i class="fa fa-edit" aria-hidden="true"></i></router-link>
        <a class="btn btn-warning btn-sm" style="margin-top:17px;" @click.prevent = "deletecategory(showcategory.id)"><i class="fa fa-trash" aria-hidden="true"></i></a>
      </center> -->


      <center>
          <router-link :to="`/view_order/${showorder.id}`" class="btn btn-primary btn-sm" style="margin-top:17px;"><i class="fa fa-eye" aria-hidden="true"></i></router-link>
        <!-- <a class="btn btn-primary btn-sm" style="margin-top:17px;"  href=""><i class="fa fa-eye" aria-hidden="true"></i></i></a> -->
        <!-- <a class="btn btn-danger btn-sm" style="margin-top:17px;"  href=""><i class="fa fa-trash" aria-hidden="true"></i></a> -->
        <a class="btn btn-danger btn-sm" style="margin-top:17px;" @click.prevent = "deleteorder(showorder.id)"><i class="fa fa-trash" aria-hidden="true"></i></a>
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

          showallorder: {},

          // Create a new form instance
          // form: new Form({
          //
          //   cat_name: '',
          //   cat_url: '',
          //   cat_addedby: '',
          //
          //   cat_status : '',
          //
          // })
        }
      },





    methods:{




      //show all category
              allorder(){

               axios.get('/show_allorder').then(({data}) => (this.showallorder = data));


             },


             deleteorder(id){

               axios.get('/delete_order/'+id)

             //this.$router.push('/add_product')
               .then((response)=>{

                       //this.$store.dispatch("allCategory")
                    this.$router.push('/allorder')
                     this.allorder();
                     Toast.fire({
                     icon: 'success',
                     title: 'Order delate Successfully'
                      })
                   })

              .catch(()=>{

             console.log('fail');

             })

             },



},




        mounted() {
          //all category load this mounted
        //  this.allcategory();
        this.allorder();

        }
    }
</script>
