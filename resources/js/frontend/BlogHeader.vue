<template>
  <span>

    <header style="height:80px;">
      <div class="container ">

        <!-- <div id="header-hidden-link">
          <a href="#" class="toggle-link" title="Click me you'll get a surprise" data-target=".hidden-top"><i></i>Open</a>
        </div> -->

        <div class="row nomargin">
          <div class="span12">
            <div class="headnav">
              <!-- <ul>
                <li><a href="#mySignup" data-toggle="modal"><i class="icon-user"></i> Sign up</a></li>
                <li><a href="#mySignin" data-toggle="modal">Sign in</a></li>
              </ul> -->
            </div>


          </div>
        </div>
        <div class="row">
          <div class="span4">
            <div  style="margin-top:-20px;" class="logo" v-for="showmylogo in mylogoshow">
        <a href="index.html"><img img :src="ourimage(showmylogo.logo_image)" alt="NOT FOUND" style="height:70px;width:100px;margin-top:-10px;"></a>



            </div>
          </div>
          <div class="span7" style="float:left;">
            <div class="navbar navbar-static-top">
              <div class="navigation">
                <nav style="margin-top:-20px;">
                  <ul class="nav topnav">
                    <li class="dropdown active">
                      <router-link to="/">Home</router-link>

                    </li>
                    <li class="dropdown">
                      <router-link to="/extra">Features</router-link>

                    </li>
                    <li class="dropdown">
                      <a href="#">Pages</a>

                    </li>
                    <li class="dropdown">
                      <a href="#">Portfolio</a>

                    </li>
                    <li class="dropdown">
                      <router-link to="/blog_page">Blog </router-link>

                    </li>
                    <li>
                      <a href="contact.html">Contact </a>
                    </li>





                  </ul>



                </nav>



              </div>

            </div>
          </div>



          <!-- <form class="form-search">
            <input placeholder="Type something"@keyup="RealSearch" v-model="keyword" type="text" class="input-medium search-query">
            <button type="submit" @click.prevent="RealSearch"><i class="fas fa-search"></i></button>
          </form> -->


          <!-- <form class="form-search" style="margin-top:7px;margin-left:50px;display:block;">
            <input placeholder="Type something"@keyup="RealSearch" v-model="keyword" type="text" class="input-medium search-query">
            <button type="submit" @click.prevent="RealSearch" class="btn btn-square btn-theme">Search</button>
          </form> -->






        </div>
      </div>
    </header>

















  </span>
</template>


<script>
    export default {


      data () {
        return {
          //  categorys: {},
        //  search:'',
        //  products: {},
           mylogoshow:{},
        //  showallcategoryinproductpage:{},

          // Create a new form instance
          // form: new Form({
          //
          //     product_name: '',
          //    	category_id: '',
          //    	product_url: '',
          //     product_image: '',
          //     product_description:'',
          //     product_addedby:'',
          //     product_status:'',
          //
          // })
        }
      },




    methods:{




              //image display in table




             ourimage(img){

                 return "images/"+img;

             },









showlogo(){

axios.get('/show_logo').then(({data}) => (this.mylogoshow = data));

},


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

        this.showlogo();

    //  this.$store.dispatch("allCategory")

        }
    }
</script>
