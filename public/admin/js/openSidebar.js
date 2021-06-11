var clicked = false;
$('#sidebar-link').click(function(){
  if(document.getElementById("mySidebar").style.width != "200px") {
    clicked = true;
    document.getElementById("mySidebar").style.width = "200px";
    document.getElementById("main").style.marginLeft = "200px";
    visibilityOption(".brand-text", "unset");
    visibilityOption(".nav-text", "unset");
  }
  else {
    clicked = false;
    document.getElementById("mySidebar").style.width = "74px";
    document.getElementById("main").style.marginLeft= "74px";
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
    document.getElementById("main").style.marginLeft= "74px";
    visibilityOption(".brand-text", "hidden");
    visibilityOption(".nav-text", "hidden");
  }
}); 
$('.nav-link').click(function(){
  $('.nav-link').removeClass('brg-color-click');
  $(this).addClass('brg-color-click');
})
$('#filter-catagories-wrap-id').click(function(){
  $('#popover-catagories-sport').hide();
  $('#popover-producer').hide();
  showDiv('#popover-catagories');
});
$('#filter-catagories-sport-wrap-id').click(function(){
  $('#popover-catagories').hide();
  $('#popover-producer').hide();
  showDiv('#popover-catagories-sport');
});
$('#filter-producer-wrap-id').click(function(){
  $('#popover-catagories-sport').hide();
  $('#popover-catagories').hide();
  showDiv('#popover-producer');
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

  

