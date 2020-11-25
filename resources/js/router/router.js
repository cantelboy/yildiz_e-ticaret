import Vue from 'vue'
import VueRouter from 'vue-router'
import SiteAyarlari from '../components/admin/SiteAyarlari'
import SiteAdresler from '../components/admin/SiteAdresler'
import SiteUyeler from '../components/admin/SiteUyeler'
import SiteContract from '../components/admin/SiteContract'




Vue.use(VueRouter);


 



  const routes = [
   { path: '/admin/site-ayarlari', component: SiteAyarlari, name:'site-ayarlari' },
   { path: '/admin/site-adresler', component: SiteAdresler, name:'site-adresler' },
   { path: '/admin/site-uyeler', component: SiteUyeler, name:'site-uyeler' },
   { path: '/admin/site-contract', component: SiteContract, name:'site-contract' },

   
 
 

 
  ]

 const router = new VueRouter({
    mode: 'history',
    routes,
    linkActiveClass: "active",
    linkExactActiveClass: "exact-active",
  })

  export default router


