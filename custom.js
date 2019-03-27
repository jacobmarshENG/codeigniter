//Flot Line Chart
$(document).ready(function() {
    $("#signup").validate({
        rules:{
            'name':{
                required:true,
                maxlength:40,
            },
            'email':{
                required:true,
                maxlength:60,
                email:true,
            },
            'password':{
                required:true,
                minlength:6,
                maxlength:16,
            },
            'phone':{
              required:true,
              minlength:10,
              maxlength:12,
              number:true
            },
            'address':{
                required:true,
            }
        },
        message:{
            'name':{
                required: 'This field is required.',
            },
            'email':{
                required: 'This field is required.',
            },
            'password':{
                required: 'This field is required.',
            },
            'phone':{
                required: 'This field is required.',
            },
            'address':{
                required: 'This field is required.',
            }
        },
        submitHandler: function(form){
          if($("#signup").valid()){
              
                $.post(base_url+"main/signup",$("#signup").serialize(),function(getresp){
                  //alert(getresp);
                  if(getresp=="success"){
                        $("#show_msg").html('');
                           $("#show_msg").html('<p style="color:Green;">You are registred Successfully.</p>');
                           $('#show_msg').fadeIn('slow').delay(10000).hide(0);
                            window.location=base_url+'main';
                         
                  }else if(getresp=="already"){
                      
                        $("#show_msg").html('');
                           $("#show_msg").html('<p style="color:Red;">This email is already exist.</p>');
                           $('#show_msg').fadeIn('slow').delay(10000).hide(0);
                           return false;
                  }
              });
          }  
        },
        
        
        
    });
    $("#login").validate({
        rules:{
            'email':{
                required:true,
            },
            'password':{
                required:true,
            },
        },
        message:{
             'email':{
                required: 'This field is required.',
            },
            'password':{
                required: 'This field is required.',
            },
        },
        submitHandler: function(form){
          if($("#login").valid()){
              $.post(base_url+"main",$("#login").serialize(),function(resplogin){
		alert(resplogin);
                   if(resplogin=="success"){
                      window.location=base_url+"main/welcome";
                  }else if(resplogin=="invalid"){
                      $("#show_msg").html('');
                      $("#show_msg").html('<p style="color:red;">Email or password is invalid.</p>');
                  }
              });
          }  
        },
        
    });
    
    
   });
