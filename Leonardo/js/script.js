
//Desaparecer y aparecer menu
// slider para ventas
$(document).ready(function(){
        $('.autoWidth').lightSlider({
            autoWidth:true,
            loop:true,
            onSliderLoad: function() {
                $('.autoWidth').removeClass('cS-hidden');
            } 
        });  
    

	var flag = false;
	var scroll;

	$(window).scroll(function(){
		scroll = $(window).scrollTop();

		if(scroll > 200){
			if(!flag){
                $("header").css({"background-color": "white", "box-shadow": "0px 4px 25px -22px black"});
                $("#ctn-icon-search i").css({"color": "black"});
                $(".menu nav ul li a").css({"color": "black"});
                $(".menu .text-menu-selected").css({"color": "#46a2fd"});
                $(".menu nav ul li a").hover(function(){$(this).css("color", "#46a2fd");
                }, function(){
                    $(this).css("color", "black");
                });
                $(".menu nav ul li ul a").hover(function(){$(this).css("color", "#46a2fd");
                }, function(){
                    $(this).css("color", "black");
                });
                $("#ctn-icon-search i").hover(function(){$(this).css("color", "#46a2fd");
                }, function(){
                    $(this).css("color", "black");
                });
				flag = true;
			}
		}else{
			if(flag){
                $("header").css({"background-color": "transparent", "box-shadow": "none"});
                $("#ctn-icon-search i").css({"color": "white"});
                $(".menu nav ul li a").css({"color": "white"});
                $(".menu nav ul li ul a").css({"color": "black"});
                $(".menu .text-menu-selected").css({"color": "#46a2fd"});
                $(".menu nav ul li a").hover(function(){$(this).css("color", "#46a2fd");
                }, function(){
                    $(this).css("color", "white");
                });
                $(".menu nav ul li ul li a").hover(function(){$(this).css("color", "#46a2fd");
                }, function(){
                    $(this).css("color", "black");
                });
                $("#ctn-icon-search i").hover(function(){$(this).css("color", "#46a2fd");
                }, function(){
                    $(this).css("color", "white");
                });
				flag = false;
			}
		}
	});
});

