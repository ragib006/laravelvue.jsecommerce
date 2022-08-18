

<template>
    <span>



      <!-- <div class="container"> -->
          <!-- <div class="row justify-content-center"> -->
              <!-- <div class="col-md-12">
                  <div class="card">
                    <carousel :items="1" :autoplay="true" :loop="true" :nav="false" :dots="false">

                      <!-- <div style=""> -->

                      <!-- <img style="" src="/images/banner1.jpg" alt="">


                      <img style="" src="/images/banner2.jpg" alt="">


                      <img style=""  src="/images/banner3.jpg" alt=""> -->

                    <!-- </div> -->

                    <!-- </carousel> -->
                  <!-- </div>
              </div> -->
          <!-- </div> -->
      <!-- </div> -->
      <!-- <div class="container">
        <div class="row">
          <div class="col-md-6">
              <carousel :items="1" :autoplay="true" :loop="true" :nav="false" :dots="false">

                <img style="" src="/images/banner1.jpg" alt="">


               <img style="" src="/images/banner2.jpg" alt="">


               <img style=""  src="/images/banner3.jpg" alt="">

              </carousel>

          </div>

          <div class="col-md-6">

           <h1>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</h1>

          </div>
        </div>
     </div> -->


<!--
     <section id="inner-headline">
       <div class="container">
         <div class="row">
           <carousel :items="1" :autoplay="true" :nav="false" :dots="false">

             <div style="width:100%;height:10%;display:block;">
             <img style="" src="/images/bg-1.jpg" alt="">
            </div>

            <img style="width:100%;height:10%;" src="/images/bg-2.jpg" alt="">


            <img style="width:100%;height:10%;"  src="/images/bg-3.jpg" alt="">

           </carousel>

         </div>
       </div>
     </section> -->


















          <section id="content">















            <div class="container">

            <div style="margin-bottom:30px;margin-top:-35px;display:block;">
              <carousel :items="1" :autoplay="true" :nav="false" :dots="true">

                <!-- <div style="width:100%;height:10%;display:block;"> -->
                <img style="width:100%;height:50%;" src="/images/ragib002.png" alt="">
               <!-- </div> -->

               <img style="width:100%;height:50%;" src="/images/ragib001.png" alt="">


               <img style="width:100%;height:50%;"  src="/images/ragib003.png" alt="">

              </carousel>

            </div>








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







          <!-- <div class="row">
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

























































    </span>
</template>

<script>

// import Slick from 'vue-slick';
import BlogSidebar from "./BlogSidebar.vue";
import carousel from 'vue-owl-carousel';

    export default {
      // components: { Slick },

      name:"BlogPost",

      data () {
        return {

         //  slickOptions: {
         //     slidesToShow: 3,
         //
         // },

          //allpostdata : {},



        }
      },

         components:{

            BlogSidebar,
            carousel,
          //  Slick,


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




          // next() {
          //     this.$refs.slick.next();
          // },
          //
          // prev() {
          //     this.$refs.slick.prev();
          // },
          //
          // reInit() {
          //     // Helpful if you have to deal with v-for to update dynamic lists
          //     this.$nextTick(() => {
          //         this.$refs.slick.reSlick();
          //     });
          // },




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
