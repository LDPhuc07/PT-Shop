
// $('.nav-link').click(function(){
//   if($(this).attr("href")==window.location.href){
//     // $('.nav-link').removeClass('brg-color-click');
//     // $(this).addClass('brg-color-click');
//     console.log(1);
//   } else {
//     $('.nav-link').removeClass('brg-color-click');
//     $(this).addClass('brg-color-click');
//   }
// })
// $('#filter-catagories-wrap-id').click(function(){
//   $('#popover-catagories-sport').hide();
//   $('#popover-producer').hide();
//   showDiv('#popover-catagories');
// });
// $('#filter-catagories-sport-wrap-id').click(function(){
//   $('#popover-catagories').hide();
//   $('#popover-producer').hide();
//   showDiv('#popover-catagories-sport');
// });
// $('#filter-producer-wrap-id').click(function(){
//   $('#popover-catagories-sport').hide();
//   $('#popover-catagories').hide();
//   showDiv('#popover-producer');
// });

$(document).ready(function() {
  // Optimalisation: Store the references outside the event handler:
  var $window = $(window);

  function checkWidth() {
      var windowsize = $window.width();
      if (windowsize > 1024) {
        var clicked = false;
        $('#sidebar-link').click(function(){
          if(document.getElementById("mySidebar").style.width != "200px") {
            clicked = true;
            document.getElementById("mySidebar").style.width = "200px";
            document.getElementById("main").style.paddingLeft = "200px";
            visibilityOption(".brand-text", "unset");
            visibilityOption(".nav-text", "unset");
          }
          else {
            clicked = false;
            document.getElementById("mySidebar").style.width = "74px";
            document.getElementById("main").style.paddingLeft= "74px";
            visibilityOption(".brand-text", "hidden");
            visibilityOption(".nav-text", "hidden");
          }
        });
        function visibilityOption(data, status) {
          var values = document.querySelectorAll(data);
          values.forEach(value => {
            value.style.visibility = status;
          });
        }
        $('#mySidebar').hover(function() {
          if(clicked == false) {
            document.getElementById("mySidebar").style.width = "200px";
            visibilityOption(".brand-text", "unset");
            visibilityOption(".nav-text", "unset");
          }
        },function() {
          if(clicked == false) {
            document.getElementById("mySidebar").style.width = "74px";
            document.getElementById("main").style.paddingLeft= "74px";
            visibilityOption(".brand-text", "hidden");
            visibilityOption(".nav-text", "hidden");
          }
        }); 
      } else {
        document.getElementById("main").style.paddingLeft = "unset";
        document.getElementById("mySidebar").style.width = "0 ";
        visibilityOption("#close-sidebar", "unset");
        $('#sidebar-link').click(function(){
          document.getElementById("mySidebar").style.width = "200px";
          visibilityOption(".brand-text", "unset");
          visibilityOption(".nav-text", "unset");
          $("#disabled").addClass("disabledbutton");
        });
        $('#close-sidebar').click(function(){
          document.getElementById("main").style.paddingLeft = "unset";
          document.getElementById("mySidebar").style.width = "0 ";
          $("#disabled").removeClass("disabledbutton");
        });
        function visibilityOption(data, status) {
          var values = document.querySelectorAll(data);
          values.forEach(value => {
            value.style.visibility = status;
          });
        }
      }
  }
  // Execute on load
  checkWidth();
  // Bind event listener
  $(window).resize(checkWidth);
});

$('#account-nav').click(function(){
  showDiv('#account-popover');
});
function showDiv(divid) {
  if ($(divid).is(':hidden')) {
    $(divid).show();
  } else {
    $(divid).hide();
  }
}

  

