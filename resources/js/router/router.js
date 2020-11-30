import Vue from 'vue'
import VueRouter from 'vue-router'
import SiteAyarlari from '../components/admin/SiteAyarlari'
import SiteAdresler from '../components/admin/SiteAdresler'
import SiteUyeler from '../components/admin/SiteUyeler'
import SiteContract from '../components/admin/SiteContract'
import ShopingProductMain from '../components/admin/ShopingProductMain'
import ShopingProduct from '../components/admin/ShopingProduct'
import ShopingProductAdd from '../components/admin/ShopingProductAdd'




Vue.use(VueRouter);


 



  const routes = [
   { path: '/admin/site-ayarlari', component: SiteAyarlari, name:'site-ayarlari' },
   { path: '/admin/site-adresler', component: SiteAdresler, name:'site-adresler' },
   { path: '/admin/site-uyeler', component: SiteUyeler, name:'site-uyeler' },
   { path: '/admin/site-contract', component: SiteContract, name:'site-contract' },


   { path: '/admin/site-product', component: ShopingProductMain, name:'site-product-main',
   children: [
     {
       // UserProfile will be rendered inside User's <router-view>
       // when /user/:id/profile is matched
       path: '',
       component: ShopingProduct
     },
     {
       // UserPosts will be rendered inside User's <router-view>
       // when /user/:id/posts is matched
       path: 'add',
       component: ShopingProductAdd
     }

   
 
    ]
  }

 
  ]

 const router = new VueRouter({
    mode: 'history',
    routes,
    linkActiveClass: "active",
    linkExactActiveClass: "exact-active",
  })

  export default router


