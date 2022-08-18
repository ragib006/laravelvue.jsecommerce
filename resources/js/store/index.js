export default {

  state:{

    //  category:[],
    //  websiteblog:[],


    product:[],

  },

  getters:{

   // getCategory(state){
   //
   //     return state.category
   //
   // },
   //
   //
   // getWebiteblog(state){
   //
   //     return state.websiteblog
   //
   // },


   getProduct(state){

   
      return state.product

   }


  },

  actions:{




   allProducts(context){

      axios.get('/product_display_frontend')

        .then((response)=>{

        context.commit('Ragib',response.data.letestproduct)

      })
    },





           SearchProduct(context,payload){
 
           axios.get('/searchproduct?s='+payload)
            .then((response)=>{ 

            context.commit('getSearchproduct',response.data.searches)

            })

            },









//
//
//    allCategory(context){
//
//      axios.get('/myallproduct')
//
//        .then((response)=>{
//
//         context.commit('Ragib',response.data.categories)
//
//        })
//     },
//
//
//
//     allWebiteblog(context){
//
//       axios.get('/mywebiteblog')
//
//         .then((response)=>{
//
//          context.commit('Ragibblog',response.data.blogs)
//
//         })
//      },
//
//
//      //
//      // SearchPost(context,payload){
//      //
//      //   axios.get('/search?s='+payload)
//      //   .then((response)=>{
//      //
//      //    context.commit('getSearchpost',response.data.searches)
//      //
//      //   })
//      //
//      //
//      //
//      // }
// Searchpost(context,payload){
//
//     axios.get('/search?s='+payload)
//     .then((response)=>{
//
//      context.commit('getSearchpost',response.data.searches)
//
//     })
//
//
//
//
// },
//
//
//
//
//
   },


   mutations:{
//
   Ragib(state,data){
//
   return state.product = data

 },
//
// Ragibblog(state,data){
//
// return state.websiteblog = data
//
// },
//
//


 getSearchproduct(state,payload){

    state.product = payload

 },



}











}
