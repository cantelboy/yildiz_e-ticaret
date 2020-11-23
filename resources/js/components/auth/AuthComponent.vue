<template>
    <div>
    <div class="row vh-100">
      <div class="col-lg-9 p-0 h-100vh d-flex justify-content-center auth-bg">
        <div class="accountbg d-flex align-items-center">
          <div class="account-title text-center">
            <img src="" alt class="thumb-sm" />
            <h4 class="mt-3">
              Welcome To
              <span class="text-warning">Metrica</span>
            </h4>
            <h1 class>Let's Get Started</h1>
            <p class="font-18 mt-3">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit.
              <br />Aliquam laoreet tellus ut tincidunt euismod.
            </p>
            <div class="border w-25 mx-auto border-warning"></div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 pr-0">
        <div class="auth-page">
          <div class="card mb-0 border-0 h-100">
            <div class="card-body">
              <div class="mb-5">
                <a href="#" class="logo logo-admin">
                  <span>
                    <img
                      src=""
                      height="30"
                      alt="logo"
                      class="my-3"
                    />
                  </span>
                  <span>
                    <img
                      src=""
                      height="16"
                      alt="logo"
                      class="logo-lg logo-dark my-3"
                    />
                  </span>
                </a>
              </div>
              <div class="px-3">
                <h2 class="font-weight-semibold font-22 mb-2">
                
                  <span class="text-primary"></span>.
                </h2>
                <p class="text-muted"></p>
                <ul class="nav-border nav nav-pills" role="tablist">
                  <li class="nav-item">
                    <a
                      class="nav-link font-weight-semibold active"
                      data-toggle="tab"
                      href="#LogIn_Tab"
                      role="tab"
                      aria-selected="true"
                    >{</a>
                  </li>
                  <li class="nav-item">
                    <a
                      class="nav-link font-weight-semibold"
                      data-toggle="tab"
                      href="#Register_Tab"
                      role="tab"
                      aria-selected="false"
                    ></a>
                  </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                  <div class="tab-pane p-3 active" id="LogIn_Tab" role="tabpanel">
                    <form class="form-horizontal auth-form my-4">
                      <div class="form-group" >
                        <label for="email"></label>
                        <div class="input-group mb-3">
                          <input
                            type="email"
                            class="form-control"
                            name="email"
                            id="email"
                            placeholder="$t('auth.login.email.placeholder')"
                          />
                        </div>
                        <span
                          class="ml-2 text-warning help-block"
                        >error.email[0]</span>
                      </div>
                      <!--end form-group-->
                      <div class="form-group">
                        <label for="userpassword"></label>
                        <div class="input-group mb-3">
                          <input
                            type="password"
                            class="form-control"
                            name="password"
                            id="userpassword"
                            placeholder="$t('auth.login.password.placeholder')"
                          />
                        </div>
                        <span
                          class="ml-2 text-warning help-block"
                        >error.password[0]</span>
                      </div>
                      <!--end form-group-->
                      <div class="form-group row mt-4">
                        <div class="col-sm-6">
                          <div class="custom-control custom-switch switch-success">
                            <input
                              type="checkbox"
                              class="custom-control-input"
                              id="customSwitchSuccess"
                            />
                            <label
                              class="custom-control-label text-muted"
                              for="customSwitchSuccess"
                            ></label>
                          </div>
                        </div>
                        <!--end col-->
                        <div class="col-sm-6 text-right">
                          <a href="#" class="text-muted font-13">
                            <i class="dripicons-lock"></i>
                           
                          </a>
                        </div>
                        <!--end col-->
                      </div>
                      <!--end form-group-->
                      <div class="form-group mb-0 row">
                        <div class="col-12 mt-2">
                          <p class="text-danger">error.message</p>
                          <button
                            class="btn btn-primary btn-block waves-effect waves-light"
                            type="button"
                          >
                            <template>
                              <i class="dripicons-loading"></i>
                            </template>
                            <template >
                          
                              <i class="fas fa-sign-in-alt ml-1"></i>
                            </template>
                          </button>
                        </div>
                        <!--end col-->
                      </div>
                      <!--end form-group-->
                    </form>
                    <!--end form-->
                    <p class="mb-0 text-muted">
                     
                      <a
                        href="#Register_Tab"
                        class="font-12 text-primary ml-2"
                      ></a>
                    </p>
                  </div>
                  <div class="tab-pane px-3 pt-3" id="Register_Tab" role="tabpanel">
                    <form class="form-horizontal auth-form my-4" >
                      <div class="form-group" >
                        <label for="name"></label>
                        <div class="input-group mb-3">
                          <input
                            type="text"
                            class="form-control"
                            name="name"
                            id="name"
                          />
                        </div>
                        <span
                          class="ml-2 text-warning help-block"
                        >error.name[0}</span>
                      </div>
                      <!--end form-group-->
                      <div class="form-group">
                        <label for="useremail"></label>
                        <div class="input-group mb-3">
                          <input
                            type="email"
                            class="form-control"
                            name="email"
                            id="useremail"
                          />
                        </div>
                        <span
                          class="ml-2 text-warning help-block"
                        >error.email[0]</span>
                      </div>
                      <!--end form-group-->
                      <div class="form-group">
                        <label for="userpassword"></label>
                        <div class="input-group mb-3">
                          <input
                            type="password"
                            class="form-control"
                            name="password"
                            id="userpassword"
                          />
                        </div>
                        <span
                          class="ml-2 text-warning help-block"
                        
                        >error.password[0]</span>
                      </div>
                      <!--end form-group-->
                      <div
                        class="form-group"
                      >
                        <label for="conf_password"></label>
                        <div class="input-group mb-3">
                          <input
                            type="password"
                            class="form-control"
                            name="password_confirmation"
                            id="conf_password"
                          />
                        </div>
                        <span
                          class="ml-2 text-warning help-block"
                        >error.password_confirmation[0]</span>
                      </div>
                      <!--end form-group-->
                      <div class="form-group mb-0 row">
                        <div class="col-12 mt-2">
                          <p  class="text-danger">error.message</p>
                          <button
                            class="btn btn-primary btn-block waves-effect waves-light"
                            type="button"
                          >
                            <template>
                              <i class="dripicons-loading"></i>
                            </template>
                            <template >
                             
                              <i class="fas fa-sign-in-alt ml-1"></i>
                            </template>
                          </button>
                        </div>
                        <!--end col-->
                      </div>
                      <!--end form-group-->
                    </form>
                    <!--end form-->
                    <p class="mb-0 text-muted">
                      <a
                        href="#"
                        class="text-primary ml-2"
                      ></a>
                    </p>
                  </div>
                </div>
              </div>

              <div class="footer-auth">
                <hr class="hr-dashed mb-0" />
                <div class="p-4">
                  © 2019 - 2020 Metrica
                  <span
                    class="text-muted d-none d-sm-inline-block float-right"
                  >
                    Crafted with
                    <i class="mdi mdi-heart text-danger"></i> by Mannatthemes
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
 
}
</script>

<style>

</style>