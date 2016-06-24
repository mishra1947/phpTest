var Signup = Backbone.Model.extend({
    url: "http://bb-app.com/php/create.php",
    initialize: function () {

    },
    defaults: {
        full_name: "",
        email: "",
        phone: "",
        address: ""
    },
});

var signUpView = Backbone.View.extend({
    el: $("#search_container"),
    template: _.template($("#signupTemplate").html()),
    events: {
        "submit ": "submitAction",
        "blur input[name=full_name]": "validateFullNmae",
        "blur input[name=email]": "validateEmail"
        },
    initialize: function () {
       
    },
    render: function () {
        $(this.el).html(this.template);
    },
    submitAction: function () {
        var full_name = $('#full_name').val(),
                email = $('#email').val(),
                phone = $('#phone').val(),
                address = $('#address').val();
             this.validateFullNmae();
             this.validateEmail();
             var signup = new Signup();
             if(this.validateFullNmae()!== false && this.validateEmail() !== false){
        signup.save({
            full_name: full_name,
            email: email,
            phone: phone,
            address: address
        });
        Backbone.history.navigate("#listContact",{trigger:true,replace:true});}
        return false;
         
    },
    
    validateFullNmae: function(){
         var full_name = $('#full_name').val();
         var regex = /^[a-zA-Z ]*$/;
         if(full_name === '' || full_name === null){
          $(".error-name").text("Please enter your name");
          return false;
         }else if(!regex.test(full_name)){
             $(".error-name").text("It doesn't looks like a name");
             return false;
         }else{
             $(".error-name").hide();
         }
    },
    validateEmail: function(){
         var email = $('#email').val();
         if(email === '' || email === null){
          $(".error-email").text("Please enter your email");
          return false;
         }else{
             $(".error-email").hide();
         }
    }
});