jQuery(window).scroll(function() {
  if (jQuery(window).scrollTop() >= 100) {
    jQuery(".site-header").addClass("fixed-header");
  } else {
    jQuery(".site-header").removeClass("fixed-header");
  }
});


$('#homeban-text').owlCarousel({
    loop:true,
    margin:0,
    nav:true,
    autoplay:true,
    autoplayTimeout:1000,
    mouseDrag: true,
    singleItem: true,
    slideSpeed: 300,
    paginationSpeed: 400,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
})


$('#whatabout').owlCarousel({
    loop:true,
    margin:0,
    nav:true,
    autoplay:true,
    autoplayTimeout:1000,
    mouseDrag: true,
    singleItem: true,
    //autoplayHoverPause:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
})

$('#book-space').owlCarousel({
    loop:true,
    margin:30,
    nav:true,
    autoplay:true,
    autoplayTimeout:1000,
    mouseDrag: true,
    singleItem: true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:3
        }
    }
})


$('#property-slider').owlCarousel({
    center: true,
    items:1,
     merge:true,
    loop:true,
    margin:8,
    nav:true,
    dots:false,
    responsive:{
        600:{
            items:2
        }
    }
});


$('#testimonial').owlCarousel({
    loop:true,
    margin:30,
    nav:true,
    slideSpeed: 300,
    paginationSpeed: 400,
    autoplay:true,
    autoplayTimeout:1000,
    mouseDrag: true,
    singleItem: true,
    //animateIn: 'fadeIn',
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
})


// $(document).ready(function(){
//     $('.singupModal').on('click', function(){
//         $('#loginModal').removeClass('show');
//         $('#loginModal').css("display", "none");
//         $('#resetpassModal').removeClass('show');
//         $('#resetpassModal').css("display", "none");
//         $('#singupModal').addClass('show');
//         $('#singupModal').css("display", "block");
//     });
//     $('.loginModal').on('click', function(){
//         $('#singupModal').removeClass('show');
//         $('#singupModal').css("display", "none");
//         $('#resetpassModal').removeClass('show');
//         $('#resetpassModal').css("display", "none");
//     });
// });


$('.singupModal').click(function(){

    $('body').addClass('modalopen');
   $('#singupModal').modal('show')
   
   $('#loginModal').modal('hide')
   $('#resetpassModal').modal('hide')
})
$('.loginModal').click(function(){
    $('body').addClass('modalopen');
   $('#singupModal').modal('hide')
   $('#loginModal').modal('show')
   
   $('#resetpassModal').modal('hide')
})
$('.forgotlink').click(function(){
    $('body').addClass('modalopen');
   $('#singupModal').modal('hide')
   $('#loginModal').modal('hide')
   $('#resetpassModal').modal('show')
   
})


// Add row for Parking Sopts in Add Property
// $(document).ready(function () {
//     var counter = 1;

//     $("#addrow").on("click", function () {
//         alert('hi');
//         var newRow = $("<tr>");
//         var cols = "";

//         cols += '<td><input type="text" class="form-control" placeholder="Enter floor name" name="data[parking][floors][floor_name][' + counter + ']"/></td>';
//         cols += '<td><select name="data[parking][floors][parking_type][' + counter + ']"><option>Parking Type </option><option>Self </option><option>Valet </option><option>Reserved </option><option>Handicap </option></select></td>';
//         cols += '<td><input type="text" class="form-control" placeholder="Total Parking spots " name="data[parking][floors][total_parking_spots][' + counter + ']"/></td>';
//         cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Delete"></td>';
//         newRow.append(cols);
//         $("table.order-list1").append(newRow);
//         counter++;
//     });



//     $("table.order-list1").on("click", ".ibtnDel", function (event) {
//         $(this).closest("tr").remove();       
//         counter -= 1
//     });


// });



function calculateRow(row) {
    var price = +row.find('input[name^="price"]').val();

}

function calculateGrandTotal() {
    var grandTotal = 0;
    $("table.order-list").find('input[name^="price"]').each(function () {
        grandTotal += +$(this).val();
    });
    $("#grandtotal").text(grandTotal.toFixed(2));
}




function calculateRow(row) {
    var price = +row.find('input[name^="price"]').val();

}

function calculateGrandTotal() {
    var grandTotal = 0;
    $("table.order-list").find('input[name^="price"]').each(function () {
        grandTotal += +$(this).val();
    });
    $("#second-grandtotal").text(grandTotal.toFixed(3));
}


//Show Hide Div on property select 
$(function() {
    $('#select-property-type').change(function(){
        $('.step-show').hide();
        $('#' + $(this).val()).show();
        
    });
});



// Show Hide Location Type Div

$(".type").on('change',function(e){
    localStorage.setItem("type", e.target.value);
});


$(".type").on('click',function(){
    var type1 = localStorage.getItem("type");
    var div = $('#property-land');
    if(type1 == 'property-land'){
 $('#locationtype').hide();

}else if(type1 == 'parking-spaces'){
        //alert('ww');
     $('#locationtype').show();
}
})

//get js current date
function getCurrentDate(){

    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();

    return today = mm + '.' + dd + '.' + yyyy;
    //document.write(today);
}


$(function() {
  $('#tablist').change(function(){
    $('.tablist-container').hide();
    $('#' + $(this).val()).show(); 
  });
});

$(function() {
  $('#landtablist').change(function(){
    $('.landtablist-container').hide();
    //$('#tablist').hide();
    $('#' + $(this).val()).show();  
  });
});

$(function() {
  $('#tab-prop-type').change(function(){
    $('.parking-slection').hide();
    $('#' + $(this).val()).show(); 
  });
});





$(function() {
  $('.select-property-type').change(function(){
    $('.parking-slection').hide();
   // $('#tablist').hide(); 
    $('#' + $(this).val()).show();
  });
});


$(function () {
    $("#select-property-type").change(function () {
        if ($(this).val() == 2) {
            $("#land-search_dates1").hide();
            $("#search_dates1").show();
        } else {
            $("#search_dates1").hide();
            $("#land-search_dates1").show();
        }
    });
});



$(function () {
    $("#select-property-type").change(function () {
        if ($(this).val() == 3) {
            $("#step4").addClass("open"); 
            $("#park-availabilty").hide(); 
            $(".tour-avail").show(); 
            $("#locationtype").hide(); 

            // $("#park-availabilty").removeClass("exapnd");
            // $(".avail-hide").hide();
            // $("#park-availabilty").hide();
            // $("#park-availabilty").css("display","none");
        } else {
            $("#step4").removeClass("open");
            // $("#park-availabilty").addClass("exapnd");
            // $(".avail-hide").show();
            // $("#park-availabilty.exapnd").show();
             $("#park-availabilty").show(); 
            $(".tour-avail").hide(); 
            $("#locationtype").show(); 
        }
    });
});


$(function() {
$("#step4.open").click(function(){
 $("#park-availabilty").css("display","none");
});
});



$(function () {
    $("#select-property-type-top").change(function () {
        if ($(this).val() == 2) {
            $("#land-search_dates").hide();
            $("#search_dates").show();
        } else {
            $("#search_dates").hide();
            $("#land-search_dates").show(); 
        }
    });
});

$(function () {
    $(".select-property-type").change(function () {
        if ($(this).val() == 2) {
            $("#3").hide();
            $("#2").show();
        } else {
            $("#2").hide();
            $("#3").show();
        }
    });
});


// Add property last button hide




$(function() {
$("#sunday-checkbox").click(function(){
 $(".sunday-row").toggleClass("hide-row");
});
$("#sunday-sethrs").click(function(){
 $("#sunday-from").toggleClass("open");
 $("#sunday-to").toggleClass("open");
});
// $("#sunday-allday").click(function(){
//  $("#sunday-from").toggleClass("open");
//  $("#sunday-to").toggleClass("open");
// });

$("#monday-checkbox").click(function(){
 $(".monday-row").toggleClass("hide-row");
});
$("#monday-sethrs").click(function(){
 $("#monday-from").toggleClass("open");
 $("#monday-to").toggleClass("open");
});
// $("#monday-allday").click(function(){
//  $("#monday-from").toggleClass("open");
//  $("#monday-to").toggleClass("open");
// });

$("#tuesday-checkbox").click(function(){
 $(".tuesday-row").toggleClass("hide-row");
});
$("#tuesday-sethrs").click(function(){
 $("#tuesday-from").toggleClass("open");
 $("#tuesday-to").toggleClass("open");
});
// $("#tuesday-allday").click(function(){
//  $("#tuesday-from").toggleClass("open");
//  $("#tuesday-to").toggleClass("open");
// });

$("#wednesday-checkbox").click(function(){
 $(".wednesday-row").toggleClass("hide-row");
});
$("#wednesday-sethrs").click(function(){
 $("#wednesday-from").toggleClass("open");
 $("#wednesday-to").toggleClass("open");
});
// $("#wednesday-allday").click(function(){
//  $("#wednesday-from").toggleClass("open");
//  $("#wednesday-to").toggleClass("open");
// });

$("#thursday-checkbox").click(function(){
 $(".thursday-row").toggleClass("hide-row");
});
$("#thursday-sethrs").click(function(){
 $("#thursday-from").toggleClass("open");
 $("#thursday-to").toggleClass("open");
});
// $("#thursday-allday").click(function(){
//  $("#thursday-from").toggleClass("open");
//  $("#thursday-to").toggleClass("open");
// });

$("#friday-checkbox").click(function(){
 $(".friday-row").toggleClass("hide-row");
});
$("#friday-sethrs").click(function(){
 $("#friday-from").toggleClass("open");
 $("#friday-to").toggleClass("open");
});
// $("#friday-allday").click(function(){
//  $("#friday-from").toggleClass("open");
//  $("#friday-to").toggleClass("open");
// });

$("#saturday-checkbox").click(function(){
 $(".saturday-row").toggleClass("hide-row");
});
$("#saturday-sethrs").click(function(){
 $("#saturday-from").toggleClass("open");
 $("#saturday-to").toggleClass("open");
});
// $("#saturday-allday").click(function(){
//  $("#saturday-from").toggleClass("open");
//  $("#saturday-to").toggleClass("open");
// });

});


// $(function () {
//  $(".homebannertext #select-property-type").change(function () { 
//             if ($(this).val() == "1) {
//                 $("#search_dates1").show();
//             } else {
//                 $("#land-search_dates1").hide();
//             }
//         });
// });


// Parking Tabs 
function openParking(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();




let today = new Date().toISOString().substr(0, 10);
document.querySelector("#today").value = today;

document.querySelector("#today2").valueAsDate = new Date();




// Add row for Parking Sopts in Add Property
$(document).ready(function () {
    var counter = 0;

    $("#addrow").on("click", function () {
        var newRow = $("<tr>");
        var cols = "";

        cols += '<td><input type="text" class="form-control" placeholder="Enter floor name" name="name' + counter + '"/></td>';
        cols += '<td><select><option>Parking Type </option><option>Self </option><option>Valet </option><option>Reserved </option><option>Handicap </option></select></td>';
        cols += '<td><input type="text" class="form-control" placeholder="Total Parking spots " name="phone' + counter + '"/></td>';
        cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Delete"></td>';
        newRow.append(cols);
        $("table.order-list1").append(newRow);
        counter++;
    });



    $("table.order-list1").on("click", ".ibtnDel", function (event) {
        $(this).closest("tr").remove();       
        counter -= 1
    });


});



function calculateRow(row) {
    var price = +row.find('input[name^="price"]').val();

}

function calculateGrandTotal() {
    var grandTotal = 0;
    $("table.order-list").find('input[name^="price"]').each(function () {
        grandTotal += +$(this).val();
    });
    $("#grandtotal").text(grandTotal.toFixed(2));
}


// Add row for Car Parking Price in Add Property
$(document).ready(function () {
    var counter = 0;

    $("#second-addrow").on("click", function () {
        var newRow = $("<tr class='row'>");
        var cols = "";

        cols += '<td class="col-sm-3"><select><option>Car Type</option><option>Hatchback</option><option>Sedan</option><option>MPV</option><option>SUV </option><option>Crossover </option><option>Coupe</option><option>Convertibl </option></select></td>';
        cols += '<td class="col-sm-3"><input type="text" class="form-control" placeholder="Hourly Price" name="mail' + counter + '"/></td>';
        cols += '<td class="col-sm-3"><input type="text" class="form-control" placeholder="Daily Price" name="phone' + counter + '"/></td>';
        cols += '<td class="col-sm-3"><input type="text" class="form-control" placeholder="Monthly  Price" name="phone' + counter + '"/></td>';

        cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Delete"></td>';
        newRow.append(cols);
        $("table.order-list").append(newRow);
        counter++;
    });



    $("table.order-list").on("click", ".ibtnDel", function (event) {
        $(this).closest("tr").remove();       
        counter -= 1
    });


});



function calculateRow(row) {
    var price = +row.find('input[name^="price"]').val();

}

function calculateGrandTotal() {
    var grandTotal = 0;
    $("table.order-list").find('input[name^="price"]').each(function () {
        grandTotal += +$(this).val();
    });
    $("#second-grandtotal").text(grandTotal.toFixed(3));
}











