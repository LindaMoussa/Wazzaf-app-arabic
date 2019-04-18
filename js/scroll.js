$(window).scroll(function(){

if($(window).scrollTop()>500)
    {
         $(".scroll-nav").css("backgroundColor","rgba(0, 179, 143,0.9)");

//       $(".nevs").css("color","#fff");
        
    }
    else{
        $(".scroll-nav").css("backgroundColor","rgba(0, 179, 143,0.6)");
//        $(".nevs").css("color","#000");
    }

})