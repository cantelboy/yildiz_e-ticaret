import Vue from 'vue'
import VueRouter from 'vue-router'
import SiteAyarlari from '../components/admin/SiteAyarlari'
import SiteAdresler from '../components/admin/SiteAdresler'
import SiteUyeler from '../components/admin/SiteUyeler'
import SiteContract from '../components/admin/SiteContract'
import ShoppingProductMain from '../components/admin/ShoppingProductMain'
import ShoppingProduct from '../components/admin/ShoppingProduct'
import ShoppingProductAdd from '../components/admin/ShoppingProductAdd'

Vue.use(VueRouter);

const routes = [
  { path: '/admin/settings', component: SiteAyarlari, name: 'settings' },
  { path: '/admin/site-adresler', component: SiteAdresler, name: 'site-adresler' },
  { path: '/admin/customers', component: SiteUyeler, name: 'site-uyeler' },
  { path: '/admin/site-contract', component: SiteContract, name: 'site-contract' },

  {
    path: '/admin/products', component: ShoppingProductMain,
    children: [
      {
        // UserProfile will be rendered inside User's <router-view>
        // when /user/:id/profile is matched
        path: '',
        name: 'product.show',
        component: ShoppingProduct
      },
      {
        // UserPosts will be rendered inside User's <router-view>
        // when /user/:id/posts is matched
        path: 'add',
        name: 'product.add',
        component: ShoppingProductAdd
      },
      {
        // UserPosts will be rendered inside User's <router-view>
        // when /user/:id/posts is matched
        path: 'edit/:id',
        name: 'product.edit',
        component: ShoppingProductAdd,

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


