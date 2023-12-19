
$(document).ready(function(){
$(function () {
    $(".menu-link").click(function () {
     $(".menu-link").removeClass("is-active");
     $(this).addClass("is-active");
    });
   });
   
   $(function () {
    $(".main-header-link").click(function () {
     $(".main-header-link").removeClass("is-active");
     $(this).addClass("is-active");
    });
   });
   });
   
$(document).ready(function(){
    $(function () {
        $(".jobseeker-btn").click(function () {
         $(".corporate-login").removeClass("is-active");
         $('.jobseeker-login').addClass("is-active");
        });
    });
       
       $(function () {
        $(".corporate-btn").click(function () {
         $(".jobseeker-login").removeClass("is-active");
         $('.corporate-login').addClass("is-active");
        });
       });
     });
   $(document).ready(function(){
   const filter = document.querySelector('.wrapper .left-side');
   const filterBtn = document.querySelector('.filterBtn');
   const close = document.querySelector('.wrapper .left-side .close');
   filterBtn.addEventListener("click", () => {
       filter.classList.add('active');
       document.querySelector('.filter').style.display="none";

   })
   close.addEventListener("click", () => {
       filter.classList.remove('active');
       document.querySelector('.filter').style.display="flex";

   })
   })
   $(document).ready(function(){
    $("#password-show").click(function(){
        const password = document.querySelector("#password");
        const cpassword = document.querySelector("#cpassword");
        if($("#password-show").is(":checked")){
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            const ctype = cpassword.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);
            cpassword.setAttribute("type", ctype);
           
        }
        else{
            const type = password.getAttribute("type") === "text" ? "password" : "text";
            const ctype = cpassword.getAttribute("type") === "text" ? "password" : "text";
            password.setAttribute("type", type);
            cpassword.setAttribute("type", ctype);
          
        }
   })
   $("#terms-accept").click(function(){
    if($("#terms-accept").is(":checked")){
        $(".submit_btn button").addClass("is-active");
    }
    else{
        $(".submit_btn button").removeClass("is-active");

    }

    });

  
   });
   $(document).ready(function(){
    $('.profile-photo input[type="file"]').change(function(e){
        var fileName = e.target.files[0].name;
        $('.profile-photo .show_filename').html(fileName);
    });
    
});
   $(document).ready(function(){
    $('.cv_upload input[type="file"]').change(function(e){
        var fileName = e.target.files[0].name;
        $('.cv_upload .show_filename').html(fileName);
    });
    
});
$(document).ready(function(){
    $('.file_upload input[type="file"]').change(function(e){
        var fileName = e.target.files[0].name;
        $('.file_upload .show_filename').html(fileName);
    });
    
});
$(document).ready(function(){
    const noticaition_icon = document.querySelector('.noticaition-icon');
    const notification_view = document.querySelector('.notification-view');
    noticaition_icon.addEventListener("click", () => {
        notification_view.classList.toggle('is-active'); 
    })
    })
$(document).ready(function(){
    const icon = document.querySelector('.avatar');
    const menu = document.querySelector('.dropmenu');
    icon.addEventListener("click", () => {
        menu.classList.toggle('is-active'); 
    })
    })


 

    $(document).ready(function(){
        $("#showpasscode").click(function(){
            const password = document.querySelector("#jpassword");
            if($("#showpasscode").is(":checked")){
                const type = password.getAttribute("type") === "password" ? "text" : "password";
                password.setAttribute("type", type);
            }
            else{
                const type = password.getAttribute("type") === "text" ? "password" : "text";
                password.setAttribute("type", type);
            }
       })
       })
     $(document).ready(function(){
        $("#showpasscode2").click(function(){
            const password = document.querySelector("#cpassword");
            if($("#showpasscode2").is(":checked")){
                const type = password.getAttribute("type") === "password" ? "text" : "password";
                password.setAttribute("type", type);
            }
            else{
                const type = password.getAttribute("type") === "text" ? "password" : "text";
                password.setAttribute("type", type);
            }
       })
       })
     $(document).ready(function(){
        const loginClose = document.querySelector('#loginModal .close');
        loginClose.addEventListener("click", () => {
          document.querySelector('#loginModal').style.display = "none";
        })
    })
     $(document).ready(function(){
        const active = document.querySelector('.loginModal-activeBtn');
        active.addEventListener("click", () => {
          document.querySelector('#loginModal').style.display = "flex";
        })
    })
     $(document).ready(function(){
        const active = document.querySelector('.sidemenu-login button');
        active.addEventListener("click", () => {
          document.querySelector('#loginModal').style.display = "flex";
          document.querySelector('.side-nav').classList.remove("active");
        })
    })

    
                
    



$(document).ready(function(){
    
    $(function () {
        $(".closer").click(function () {
         $(".side-nav").removeClass("active");
        });
       });
    $(function () {
        $(".side-nav .close").click(function () {
         $(".side-nav").removeClass("active");
        });
       });
    $(function () {
        $(".hamburger-menu").click(function () {
         $(".side-nav").addClass("active");
        });
       });
   
    $(function () {
        $(".sidemenu-header .top").click(function () {
            $(".dropdown").toggleClass("active");
        });
       });
   


});

