<template>
     <div class="sidebar" data-color="purple" data-background-color="white" data-image=""> <!-- asset('img/sidebar-1.jpg'-->
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo">
        <router-link
          tag="a"
          class="simple-text logo-normal"
          to="/admin"
        >
       
          Admin Home
        
        </router-link>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="/">
            <i class="material-icons">content_paste</i>
              <p>ORDERS</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./notifications.html">
              <i class="material-icons">notifications</i>
              <p>HAVALE BİLDİRİMLERİ</p>
            </a>
          </li>
           <router-link
            tag="li"
            to="/admin/site-product"
            class="nav-item"
           >
             <a class="nav-link">
              <i class="material-icons">shopping_basket</i>
              <p>PRODUCTS</p>
            </a>
          </router-link>
           <router-link
            tag="li"
            to="/admin/site-uyeler"
            class="nav-item"
           >
             <a class="nav-link">
              <i class="material-icons">person</i>
              <p>CUSTOMER</p>
            </a>
          </router-link>
          <li class="nav-item ">
            <a class="nav-link" href="./user.html">
              <i class="material-icons">rate_review</i>
              <p>COMMENTS</p>
            </a>
          </li>
          <router-link
            tag="li"
            to="/admin/site-ayarlari"
            class="nav-item"
            
           
          >
             <a class="nav-link">
              <i class="material-icons">settings</i>
              <p>WEB SİTE SETTİNGS</p>
            </a>
          </router-link>
           <li class="nav-item ">
            <a class="nav-link" href="./user.html">
              <i class="material-icons">menu</i>
              <p>MENUS</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./user.html">
              <i class="material-icons">account_balance</i>
              <p>BANKA HESAP AYARLARI</p>
            </a>
          </li>
           <router-link
            tag="li"
            to="/admin/site-contract"
            class="nav-item"
          >
             <a class="nav-link">
              <i class="material-icons">thumb_up_alt</i>
              <p>Contacts</p>
            </a>
          </router-link>
           <li class="nav-item ">
            <a class="nav-link" href="./user.html">
              <i class="material-icons">local_shipping</i>
              <p>KARGO AYARLARI</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./user.html">
              <i class="material-icons">view_carousel</i>
              <p>BANNER AYARLARI</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./user.html">
              <i class="material-icons">support_agent</i>
              <p>DESTEK İÇERİKLERİ</p>
            </a>
          </li>
           <li class="nav-item ">
            <a class="nav-link" href="./user.html">
              <i class="material-icons">admin_panel_settings</i>
              <p>ADMİNİSTROTOR</p>
            </a>
          </li>
          
          
          
          

          <li class="nav-item ">
            <a class="nav-link" href="./tables.html">
              <i class="material-icons">content_paste</i>
              <p>Table List</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./typography.html">
              <i class="material-icons">library_books</i>
              <p>Typography</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./icons.html">
              <i class="material-icons">bubble_chart</i>
              <p>Icons</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./map.html">
              <i class="material-icons">location_ons</i>
              <p>Maps</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./rtl.html">
              <i class="material-icons">language</i>
              <p>RTL Support</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
</template>

<script>
export default {
  data(){
    return {
    }
  }

}
</script>

<style scoped>
 nav li:hover,
 nav li.router-link-active,
 nav li.router-link-exact-active {
   background-color: indianred;
   cursor: pointer;
 }

</style>