<template>
  <div class="create">
            <!-- Contact Section-->
        <section class="page-section" id="contact">
            <div class="container">
                <!-- Contact Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">insert new book to library</h2>
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
                        <form  @submit.prevent="processForm">
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                    <label>book title</label>
                                    <input class="form-control" name="title" v-model="title" id="name" type="text" placeholder="title" required="required" data-validation-required-message="Please enter book title." />
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                    <label>author</label>
                                    <input class="form-control" name="auther" v-model="auther" id="email" type="author" placeholder="author name" required="required" data-validation-required-message="Please enter author name." />
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                    <label>ISBN number</label>
                                    <input class="form-control" id="phone" name="isbn" v-model="isbn" type="text" placeholder="ISBN number" required="required" data-validation-required-message="Please enter book ISBN ." />
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                    <label>published date</label>
                                    <input class="form-control" id="phone" name="published_at" v-model="published_at" type="date" placeholder="published date" required="required" data-validation-required-message="Please enter published date." />
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                    <label>price</label>
                                    <input class="form-control" id="phone" name="price"  v-model="price" type="number" placeholder="price" required="required" data-validation-required-message="Please enter price." />
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                    <div>check for sold</div>
                                    <input class="form-control" id="phone" name="sold"  v-model="sold" type="checkbox" placeholder="price"  data-validation-required-message="Please enter price." />
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                    <label>description</label>
                                    <textarea class="form-control" id="message" name="description" rows="5" placeholder="description" v-model="description" required="required" data-validation-required-message="Please enter a description."></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <br />
                            <div id="success"></div>
                            <div class="form-group"><button class="btn btn-primary btn-xl" id="sendMessageButton" type="submit">Send</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
  </div>
</template>

<script>
import Axios from 'axios';
// @ is an alias to /src

export default {
  name: "create",
  data(){
      return {
          title: "",
          description: "",
          auther: "",
          isbn: "",
          published_at: "",
          price: "",
          sold: '',
      }
  },
  created : function () {
    if (! this.logedin()) {
        this.$router.push('/');
    }
  }, 
  methods:{
    logedin: function (){
        return localStorage.getItem('token') ? true :  false ;
    },
    processForm: function (){
        Axios.post('api/books/store' , {
           title: this.title,
          description: this.description,
          auther: this.auther,
          isbn: this.isbn,
          published_at: this.published_at,
          price: this.price,
          sold: this.sold,
        }).then((response) => {
            if(response.status == 201){
                this.$router.push('/');
            }
        });
    },
  },
};
</script>
