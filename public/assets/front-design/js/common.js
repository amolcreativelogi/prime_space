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
    animateIn: 'fadeIn',
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
    autoplayTimeout:3000,
    autoplayHoverPause:true,
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
    autoPlay: true,
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


// $(function () {
//  $(".homebannertext #select-property-type").change(function () { 
//             if ($(this).val() == "1) {
//                 $("#search_dates1").show();
//             } else {
//                 $("#land-search_dates1").hide();
//             }
//         });
// });




let today = new Date().toISOString().substr(0, 10);
document.querySelector("#today").value = today;

document.querySelector("#today2").valueAsDate = new Date();










