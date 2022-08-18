

<template>
    <span>





          <!-- end header -->
          <section id="inner-headline">
            <div class="container">
              <div class="row">
                <div class="span4">
                  <div class="inner-heading">
                    <h2>Blog left sidebar </h2>
                  </div>
                </div>
                <div class="span8">
                  <ul class="breadcrumb">
                    <li><a href="#"><i class="icon-home"></i></a><i class="icon-angle-right"></i></li>
                    <li><a href="#">Blog</a><i class="icon-angle-right"></i></li>
                    <li class="active">Blog with left sidebar</li>
                  </ul>
                </div>
              </div>
            </div>
          </section>



          <section id="content">
            <div class="container">
              <div class="row">
                <div class="span8">




                <article v-for="displaycategorywisepost in categorywisepost" :key="displaycategorywisepost.id">
                    <div class="row">
                      <div class="span8">
                        <div class="post-image">
                          <div class="post-heading">
                            <h3><a href="#">{{displaycategorywisepost.product_name}}</a></h3>
                          </div>
                          <!-- <img src="img/dummies/blog/img1.jpg" alt="" /> -->
                      <img :src="postimage(displaycategorywisepost.product_image)" alt="" style="height:200px;width:200px;"></td>
                        </div>
                        <p style="text-align:justify;">{{displaycategorywisepost.product_description | shortlength(300,"  ... ")}}</p>
                        <div class="bottom-article">
                          <ul class="meta-post">
                            <li><i class="icon-calendar"></i><a href="#" style="text-decoration:none">{{displaycategorywisepost.created_at | timeformat }}</a></li>
                            <li><i class="icon-user"></i><a href="#" style="text-decoration:none">{{displaycategorywisepost.product_addedby}}</a></li>
                            <li><i class="icon-folder-open"></i><a style="text-decoration:none">{{displaycategorywisepost.category_name.cat_name}}</a></li>


                          </ul>
                          <!-- <router-link :to="`/single_post/${showpost.id}`" class="pull-right">Continue reading <i class="icon-angle-right"></i></router-link> -->


                          <router-link :to="`/single_post/${displaycategorywisepost.id}`" class="pull-right" style="text-decoration:none">Continue reading <i class="icon-angle-right"></i></router-link>
                        </div>
                      </div>
                    </div>
                  </article>



<!--
                  <div id="pagination">
                    <span class="all">Page 1 of 3</span>
                    <span class="current">1</span>
                    <a href="#" class="inactive">2</a>
                    <a href="#" class="inactive">3</a>
                  </div>--->
                </div>






   <BlogSidebar/>





              </div>
            </div>
          </section>

















    </span>
</template>

<script>


import BlogSidebar from "./BlogSidebar.vue"

    export default {

      name:"Categorywiseblog",

      data () {
        return {

        categorywisepost :{},
        //  allpostdata : {},



        }
      },

         components:{

            BlogSidebar


         },



        methods:{



          Categorywisepostshow(){

            axios.get('/categorywise_post_display/'  + this.$route.params.id).then(({data}) => (this.categorywisepost = data));


          },



          // Showallpost(){
          //
          // axios.get('/allpostshow_website').then(({data}) => (this.allpostdata = data));
          //
          //
          // },

          postimage(img){

              return "images/"+img;

          },







        },

          mounted() {


            this.Categorywisepostshow();
      //  this.Showcategorywisepost();


          },

          watch:{

               $route(to,from){

                this.Categorywisepostshow();
                  //  this.Showcategorywisepost();

               }

          },









        }

</script>
