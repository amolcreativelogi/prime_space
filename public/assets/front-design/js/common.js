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
        var newRow = $("<tr>");
        var cols = "";

        cols += '<td><select><option>Car Type</option><option>Hatchback</option><option>Sedan</option><option>MPV</option><option>SUV </option><option>Crossover </option><option>Coupe</option><option>Convertibl </option></select></td>';
        cols += '<td><input type="text" class="form-control" placeholder="Hourly Price" name="mail' + counter + '"/></td>';
        cols += '<td><input type="text" class="form-control" placeholder="Daily Price" name="phone' + counter + '"/></td>';
        cols += '<td><input type="text" class="form-control" placeholder="Monthly  Price" name="phone' + counter + '"/></td>';

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



