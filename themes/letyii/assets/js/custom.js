/* Sidebar navigation */
/* ------------------ */

/* Show navigation when the width is greather than or equal to 991px */

$(document).ready(function(){

  $(window).resize(function()
  {
    if($(window).width() >= 767){
      $(".sidey").slideDown(150);
    }                
  });

});

$(document).ready(function(){

  $(".has_submenu > a").click(function(e){
    e.preventDefault();
    var menu_li = $(this).parent("li");
    var menu_ul = $(this).next("ul");

    if(menu_li.hasClass("open")){
      menu_ul.slideUp(150);
      menu_li.removeClass("open")
    }
    else{
      $(".nav > li > ul").slideUp(150);
      $(".nav > li").removeClass("open");
      menu_ul.slideDown(150);
      menu_li.addClass("open");
    }
  });
  
});

/* Sidebar dropdown */

$(document).ready(function(){
  $(".sidebar-dropdown a").on('click',function(e){
      e.preventDefault();

      if(!$(this).hasClass("open")) {
        // hide any open menus and remove all other classes
        $(".sidebar .sidey").slideUp(150);
        $(".sidebar-dropdown a").removeClass("open");
        
        // open our new menu and add the open class
        $(".sidebar .sidey").slideDown(150);
        $(this).addClass("open");
      }
      
      else if($(this).hasClass("open")) {
        $(this).removeClass("open");
        $(".sidebar .sidey").slideUp(150);
      }
  });

});

/* ******************************* */

/* Calendar */

  $(document).ready(function() {
  
    var date = new Date();
    var d = date.getDate();
    var m = date.getMonth();
    var y = date.getFullYear();
    
    $('#calendar').fullCalendar({
      header: {
        left: 'prev',
        center: 'title',
        right: 'month,agendaWeek,agendaDay,next'
      },
      editable: true,
      events: [
        {
          title: 'All Day Event',
          start: new Date(y, m, 1)
        },
        {
          title: 'Long Event',
          start: new Date(y, m, d-5),
          end: new Date(y, m, d-2)
        },
        {
          id: 999,
          title: 'Repeating Event',
          start: new Date(y, m, d-3, 16, 0),
          allDay: false
        },
        {
          id: 999,
          title: 'Repeating Event',
          start: new Date(y, m, d+4, 16, 0),
          allDay: false
        },
        {
          title: 'Meeting',
          start: new Date(y, m, d, 10, 30),
          allDay: false
        },
        {
          title: 'Lunch',
          start: new Date(y, m, d, 12, 0),
          end: new Date(y, m, d, 14, 0),
          allDay: false
        },
        {
          title: 'Birthday Party',
          start: new Date(y, m, d+1, 19, 0),
          end: new Date(y, m, d+1, 22, 30),
          allDay: false
        },
        {
          title: 'Click for Google',
          start: new Date(y, m, 28),
          end: new Date(y, m, 29),
          url: 'http://google.com/'
        }
      ]
    });
    
  });

/* ****************************************** */

/* Sparkline */
/* --------- */

/* Sidebar chart */

$("#side-chart").sparkline([24,23,22,21,20,19,18,17,16,20,18,17,19,21,23,24,25], {
    type: 'bar',
    height: '45',
    barColor: '#61cfe2'});
	
/* Hero chart */	
	
$("#hero-chart").sparkline([25,23,22,21,20,17,18,25,18,24,16,17,23,20,18,17,19,23,24,22,25], {
    type: 'bar',
    height: '58',
    barColor: '#61cfe2'});	

/* Status slide chart */
    
$("#status-chart").sparkline([20,23,25,19,20,19,18,17,16,20,18,17,19,23,25,19,22,25], {
    type: 'bar',
    height: '70',
    barColor: 'rgba(255,255,255,1)'});    
    
    
/* ****************************************** */

/* Slide Boxes */
/* ----------- */

/* Status slide */

$('.status-button').click(function() {
    var $slidebtn=$(this);
    var $slidebox=$(this).parent();
    if($slidebox.css('right')=="-282px"){
      $slidebox.animate({
        right:0
      },500);
      $slidebtn.find(".status-circle").hide();
      $slidebtn.width(41);
      $slidebtn.animate({
         left:-42
      },100);
      $slidebtn.children().children("i").removeClass().addClass("fa fa-chevron-right");
    }
    else{
      $slidebox.animate({
        right:-282
      },100);
      $slidebtn.animate({
         left:-120
      },500);
      $slidebtn.width(120);
      $slidebtn.find(".status-circle").show(700);
      $slidebtn.children().children("i").removeClass().addClass("fa fa-chevron-left");
    }
});    

/* **************************************** */

/* Progressbar animation starts */
/* **************************** */

    setTimeout(function(){

        $('.progress-animated .progress-bar').each(function() {
            var me = $(this);
            var perc = me.attr("data-percentage");

            //TODO: left and right text handling

            var current_perc = 0;

            var progress = setInterval(function() {
                if (current_perc>=perc) {
                    clearInterval(progress);
                } else {
                    current_perc +=1;
                    me.css('width', (current_perc)+'%');
                }



            }, 600);

        });

    },600);  
	
/* ****************************** */

/* Data Table */
/* ********** */

$(document).ready(function() {
    $('#data-table').dataTable({
       "sPaginationType": "full_numbers"
    });
});

/* ****************************** */

/* Slider starts */
/* ************* */

    $(function() {
        // Horizontal slider
        $( "#master1, #master2" ).slider({
            value: 60,
            orientation: "horizontal",
            range: "min",
            animate: true
        });

        $( "#master4, #master3" ).slider({
            value: 80,
            orientation: "horizontal",
            range: "min",
            animate: true
        });        

        $("#master5, #master6").slider({
            range: true,
            min: 0,
            max: 400,
            values: [ 75, 200 ],
            slide: function( event, ui ) {
                $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
            }
        });


        // Vertical slider 
        $( "#eq > span" ).each(function() {
            // read initial values from markup and remove that
            var value = parseInt( $( this ).text(), 10 );
            $( this ).empty().slider({
                value: value,
                range: "min",
                animate: true,
                orientation: "vertical"
            });
        });
    });
    

/* *********************************** */

/* Notification slide */

$('.noty-button').click(function() {
    var $slidebtn=$(this);
    var $slidebox=$(this).parent();
    if($slidebox.css('left')=="-282px"){
      $slidebox.animate({
        left:0
      },300);
	  $slidebtn.animate({
         left:280
      },300);
    }
    else{
      $slidebox.animate({
        left:-282
      },300);
	  $slidebtn.animate({
         left:280
      },300);
    }
});

/* ****************************************** */

/* Quick slide */

$(document).ready(function(){
  $(".quick-button").on('click',function(e){
      e.preventDefault();
	  
	  $('body,html').animate({scrollTop: 0}, 500);
	  
      if(!$(this).next().hasClass("open")) {
        $(".quick-content").slideDown(300);
        $(".quick-content").addClass("open");
        $(this).find("i").removeClass().addClass("fa fa-chevron-up");
      }
      
      else if($(this).next().hasClass("open")) {
        $(".quick-content").removeClass("open");
        $(".quick-content").slideUp(300);
        $(this).find("i").removeClass().addClass("fa fa-chevron-down");
      }
  });

});    

/* Quick slider tabs */

$('#quick-tab a').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
});

/* Range slider inside Quick slider Tab */

$(document).ready(function(){
   var value1=138;
   var value2=287;
   $("#amount1").val( "$" + value1);
   $("#amount2").val( "$" + value2);
   $("#range-1").slider({
      range: true,
      min: 0,
      max: 400,
      values: [value1,value2],
      slide: function( event, ui ) {
         $( "#amount1" ).val( "$" + ui.values[0]);
		 $( "#amount2" ).val( "$" + ui.values[1] );
      }
   });
});   

$(document).ready(function(){
   var value3=49;
   var value4=370;
   $("#amount3").val( "$" + value3);
   $("#amount4").val( "$" + value4);
   $("#range-2").slider({
      range: true,
      min: 0,
      max: 400,
      values: [value3,value4],
      slide: function( event, ui ) {
         $( "#amount3" ).val( "$" + ui.values[0]);
		 $( "#amount4" ).val( "$" + ui.values[1] );
      }
   });
});   

/* **************************************** */
        
/* Quick tasks */
/* ----------- */

$(document).ready(function(){   
   $('.jstasks input:checkbox').removeAttr('checked').on('click', function(){
      if(this.checked){
         $(this).next("span").css('text-decoration','line-through');
      }
      else{
         $(this).next("span").css('text-decoration','none');
      }
	});
});

/* ************************************** */

/* PrettyPhoto for Gallery */
/* ----------------------- */

$(".prettyphoto").prettyPhoto({
   overlay_gallery: false, social_tools: false
});
        
/* *************************************** */  

/* Progressbar animation */
/* --------------------- */

$(document).ready(function(){
    setTimeout(function(){

        $('.file-upload-widget .progress-bar').each(function() {
            var me = $(this);
            var perc = me.attr("aria-valuemax");

            var current_perc = 0;

            var progress = setInterval(function() {
                if (current_perc>=perc) {
                    clearInterval(progress);
                } else {
                    current_perc +=1;
                    me.css('width', (current_perc)+'%');
                }


            }, 500);

        });

    },500);
});
	
/* ************************************* */	

/* Tooltip */
/* -------- */

$('.bs-tooltip').tooltip();

/* *************************************** */

/* Blue block - Quick widget */
/* ------------------------- */

$(".quick-widget a").click(function(e){
	e.preventDefault();
	if($(this).hasClass("qw-active"))
		$(this).removeClass("qw-active");
	else
		$(this).addClass("qw-active");	
});	

/* ************************************** */

/* Slim Scroll */
/* ----------- */

$(function(){
    $('.300-scroll').slimScroll({
        height: '300px',
		size: '5px',
		color:'rgba(50,50,50,0.3)'
    });
});

/* ***************************************** */

/* Knob */
/* ----------------- */
$(document).ready(function(){
	$(".knob").knob();
});

/* ************************************** */

/* Widget close */
/* ------------ */

$('.wclose').click(function(e){
	e.preventDefault();
	var $wbox = $(this).parent().parent().parent();
	$wbox.hide(100);
});

/* ************************************* */

/* Widget minimize */
/* --------------- */

$('.wminimize').click(function(e){
    e.preventDefault();
    var $wcontent = $(this).parent().parent().next('.widget-body');
    if($wcontent.is(':visible')) 
    {
      $(this).children('i').removeClass('fa fa-chevron-up');
      $(this).children('i').addClass('fa fa-chevron-down');
    }
    else 
    {
      $(this).children('i').removeClass('fa fa-chevron-down');
      $(this).children('i').addClass('fa fa-chevron-up');
    }            
    $wcontent.toggle(500);
}); 

/**************************************** */

/* Bootstrap toogle (Bootstrap switch) */
/* ---------------------------------- */

$(".make-switch input").bootstrapSwitch();

/* ************************************** */

/* Scroll to Top */
/* ------------- */

$(document).ready(function(){
  $(".totop").hide();

  $(function(){
    $(window).scroll(function(){
      if ($(this).scrollTop()>400)
      {
        $('.totop').fadeIn();
      } 
      else
      {
        $('.totop').fadeOut();
      }
    });

    $('.totop a').click(function (e) {
      e.preventDefault();
      $('body,html').animate({scrollTop: 0}, 500);
    });

  });
});

/* ******************************************* */