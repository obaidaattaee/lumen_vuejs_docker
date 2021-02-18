<template>
  <div class="create">
    <!-- Contact Section-->
    <section class="page-section" id="contact">
      <div class="container">
        <!-- Contact Section Heading-->
        <h2
          class="page-section-heading text-center text-uppercase text-secondary mb-0"
        >
          login
        </h2>
        <!-- Icon Divider-->
        <div class="divider-custom">
          <div class="divider-custom-line"></div>
          <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
          <div class="divider-custom-line"></div>
        </div>
        <!-- Contact Section Form-->
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19.-->
            <form @submit.prevent="processForm">
              <div class="control-group">
                <div
                  class="form-group floating-label-form-group controls mb-0 pb-2"
                >
                  <label>email</label>
                  <input
                    class="form-control"
                    v-model="email"
                    type="email"
                    placeholder="email"
                    required="required"
                    data-validation-required-message="Please enter your email."
                  />
                  <p class="help-block text-danger" v-text="errors.email"></p>
                </div>
              </div>
              <div class="control-group">
                <div
                  class="form-group floating-label-form-group controls mb-0 pb-2"
                >
                  <label>password</label>
                  <input
                    class="form-control"
                    v-model="password"
                    type="password"
                    placeholder="password"
                    required="required"
                    data-validation-required-message="Please enter password."
                  />
                  <p class="help-block text-danger" v-text="errors.password"></p>
                </div>
              </div>

              <br />
              <div id="success"></div>
              <div class="form-group">
                <button
                  class="btn btn-primary btn-xl"
                  id="sendMessageButton"
                  type="submit"
                >
                  Send
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
import Axios from "axios";
// @ is an alias to /src

export default {
  name: "LogIn",
  data(){
      return {
        email: "",
        password: "",
        errors: {
          email: "",
          password: ""
        }
      }
  },
  
  methods: {
    processForm: function() {
      if (! this.email || ! this.password) {
        if (! this.email) {
          this.errors.email = "please enter email address"
        }
        if (! this.password) {
          this.errors.password = "please enter password "
        }
      } else {
        Axios.post("api/login", {
          email: this.email,
          password: this.password
        }).then((response) => {
          if (response.status == 201) {
            localStorage.setItem("token", response.data.data);
            this.$router.push("/");
          }
          
        });
      }
    },
  },
};
</script>
