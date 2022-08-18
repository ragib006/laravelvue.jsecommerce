

<template>
    <span>





          <!-- end header -->
          <section id="inner-headline">
            <div class="container">
              <div class="row">
                <div class="span4">
                  <div class="inner-heading">
                    <h2>Blog left sidebar</h2>
                  </div>
                </div>
                <div class="span8">
                  <ul class="breadcrumb">
                    <li><a href="#"><i class="icon-home"></i></a><i class="icon-angle-right"></i></li>
                    <li><a href="#">Blo</a><i class="icon-angle-right"></i></li>
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




                  <article v-for="showpost in getallBlog">
                    <div class="row">
                      <div class="span8">
                        <div class="post-image">
                          <div class="post-heading">
                            <h3><a href="#">{{showpost.product_name}} </a></h3>
                          </div>

                          <img :src="postimage(showpost.product_image)" alt="" style="height:200px;width:200px;"></td>
                        </div>
                        <p style="text-align:justify;">{{showpost.product_description | shortlength(300,"  ... ")}}</p>
                        <div class="bottom-article">
                          <ul class="meta-post">
                            <li><i class="icon-calendar"></i><a href="#" style="text-decoration:none">{{showpost.created_at | timeformat }}</a></li>
                            <li><i class="icon-user"></i><a href="#" style="text-decoration:none">{{showpost.product_addedby}}</a></li>
                            <li><i class="icon-folder-open"></i><a href="#" style="text-decoration:none">{{showpost.category_name.cat_name}}</a></li>

                          </ul>
                          <router-link :to="`/single_post/${showpost.id}`" class="pull-right" style="text-decoration:none">Continue reading <i class="icon-angle-right"></i></router-link>
                        </div>
                      </div>
                    </div>
                  </article>






                  <!-- <div id="pagination">
                    <span class="all">Page 1 of 3</span>
                    <span class="current">1</span>
                    <a href="#" class="inactive">2</a>
                    <a href="#" class="inactive">3</a>
                  </div>-->
                  <!-- <pagination :data="laravelData" @pagination-change-page="getResults"></pagination> -->


                </div>






   <BlogSidebar/>





              </div>
            </div>
          </section>







          <div class="row">
              <div class="span12">
                <h4 class="heading">Some of recent <strong>works</strong></h4>
                <div class="row">


                  <section id="projects">
                    <ul id="thumbs" class="portfolio">

                      <li class="item-thumbs span3 design" data-id="id-0" data-type="web"  v-for="showpost in getallBlog">

                        <a class="hover-wrap fancybox" data-fancybox-group="gallery" title=""><img :src="postimage(showpost.product_image)" alt="" style="width:100%;height:100%;">
    						<span class="overlay-img"></span>
    						<span class="overlay-img-thumb font-icon-plus"></span>
    						</a>


                    <img :src="postimage(showpost.product_image)" style="height:200px;width:200px;" alt="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis elementum odio. Curabitur pellentesque, dolor vel pharetra mollis.">
                        <!-- <img :src="postimage(showpost.product_image)" alt="" style="height:200px;width:200px;"> -->


                      </li>





                    </ul>
                  </section>

                </div>
              </div>
            </div>






  <div style="margin-bottom:50px;">

  <h3 style="text-align:center; font-weight:bold;">Our Services </h3>

  </div>



            <div class="container">
                  <div class="row">
                    <div class="span12">
                      <div class="row">
                        <div class="span3">
                          <div class="box aligncenter">
                            <div class="aligncenter icon">
                              <i class="icon-briefcase icon-circled icon-64 active"></i>
                            </div>
                            <div class="text">
                              <h6>Corporate business</h6>
                              <p>
                                Lorem ipsum dolor sit amet, has ei ipsum scaevola deseruisse am sea facilisis.
                              </p>
                              <a href="#">Learn more</a>
                            </div>
                          </div>
                        </div>
                        <div class="span3">
                          <div class="box aligncenter">
                            <div class="aligncenter icon">
                              <i class="icon-desktop icon-circled icon-64 active"></i>
                            </div>
                            <div class="text">
                              <h6>Responsive theme</h6>
                              <p>
                                Lorem ipsum dolor sit amet, has ei ipsum scaevola deseruisse am sea facilisis.
                              </p>
                              <a href="#">Learn more</a>
                            </div>
                          </div>
                        </div>
                        <div class="span3">
                          <div class="box aligncenter">
                            <div class="aligncenter icon">
                              <i class="icon-beaker icon-circled icon-64 active"></i>
                            </div>
                            <div class="text">
                              <h6>Coded carefully</h6>
                              <p>
                                Lorem ipsum dolor sit amet, has ei ipsum scaevola deseruisse am sea facilisis.
                              </p>
                              <a href="#">Learn more</a>
                            </div>
                          </div>
                        </div>
                        <div class="span3">
                          <div class="box aligncenter">
                            <div class="aligncenter icon">
                              <i class="icon-coffee icon-circled icon-64 active"></i>
                            </div>
                            <div class="text">
                              <h6>Sit and enjoy</h6>
                              <p>
                                Lorem ipsum dolor sit amet, has ei ipsum scaevola deseruisse am sea facilisis.
                              </p>
                              <a href="#">Learn more</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  </div>
















































    </span>
</template>

<script>


import BlogSidebar from "./BlogSidebar.vue"

    export default {

      name:"BlogPost",

      data () {
        return {

          //allpostdata : {},



        }
      },

         components:{

            BlogSidebar


         },





        // computed:{
        //
        //
        // },

        methods:{


          // Showallpost(){
          //
          // axios.get('/allpostshow_website').then(({data}) => (this.allpostdata = data));
          //
          // },

          postimage(img){

              return "images/"+img;

          },







        },


        computed:{

        getallBlog(){

           return this.$store.getters.getWebiteblog

        }


        },


          mounted() {

              //this.Showallpost();
        this.$store.dispatch("allWebiteblog")

          },











        }

</script>
