
var modal = document.getElementById("myModal");
var btn = document.getElementById("buyBtn");
var span = document.getElementsByClassName("close")[0];
var contentModal = document.getElementById("game-modal-section")


var games = [
    {
        name: "Aqua Galon",
        price: "Rp 55.000",
        thumbnail: "https://images.tokopedia.net/img/cache/500-square/product-1/2020/4/29/8421295/8421295_20a0b5b5-e819-4a8c-a099-3dfadc5ac393_1548_1548.jpg"
    },
    {
        name: "Aqua Kerdus Isi 22 Gelas",
        price: "Rp 22.000",
        thumbnail: "https://images.tokopedia.net/img/cache/700/product-1/2017/11/14/808047/808047_3356593e-6976-42dc-a873-65af668c9a00_500_500.jpg"
    },
]

// show game card list
// $(document).ready(function () {
//     var list = "";
//     for (i = 0; i < games.length; i++) {
//         list += `
//         <div class="game-card">
//             <img class="center-cropped" src="https://images.tokopedia.net/img/cache/500-square/product-1/2020/4/29/8421295/8421295_20a0b5b5-e819-4a8c-a099-3dfadc5ac393_1548_1548.jpg" alt="game">
//             <div class="rating">
//                 <i class="fa fa-star"></i> 4.7
//             </div>
//             <div class="game-detail">
//                 <p class="title">${games[i].name}</p>
//                 <p class="price">$ ${games[i].price}</p>
//                 <button id="${games[i].name.replace(/ /g, "-")}" class="btn game-buy">Buy</button>
//             </div>
//         </div>`;
//     }
//     $("#game-part").append(list);
// });


// open modal
$(document).ready(function () {
    $('.modal-close').click(function () {
        $('body').removeClass('modal-open')
        $('#deleteAccountModal').hide();
        $('#myModal').hide();
    })
})

// close modal
window.onclick = function (event) {
    if (event.target == modal) {
        $('body').removeClass('modal-open')
        $('#myModal').hide();
        $('#deleteAccountModal').hide();
    }
}

// show modal content
$(document).ready(function () {
    $('body').on('click', '.game-buy', function () {
        var id = $(this).attr('id');
        var clearName = id.split('-').join(' ');
        var index = 0;
        var insertedDataModal = $('.checkout')
        for (let i = 0; i < games.length; i++) {
            if (clearName === games[i].name) {
                index = i;
            }
        }
        $('#myModal').show()

        $("body").addClass("modal-open");
        if (insertedDataModal) {
            insertedDataModal.remove()
        }
        $('#game-modal-section').append(`
        <div class="checkout">
            <h1>Checkout</h1>
            <div class="summary-order">
                <div class="order-detail">
                    <img class="col center-cropped" src="${games[index].thumbnail}" height="500" alt="${games[index]}-img">
                    <div class="order-price col">
                        <h1>${games[index].name}</h1>
                        <div class="flex" style="justify-content: space-between;">
                            <p>Price<br>VAT Included</p>
                            <p>$${games[index].price}</p>
                        </div>
                        <div class="flex" style="justify-content: space-between;">
                            <p>Total</p>
                            <p>$${games[index].price}</p>
                        </div>
                    </div>
                    <div class="col" style="margin-bottom: 20px;">
                        <div class="payment-method-wrapper">
                            <div class="payment-method flex">
                                <div class="payment-img">
                                    <div class="payment-icon dana"></div>
                                </div>
                                Dana
                            </div>
                            <div class="payment-method flex">
                                <div class="payment-img">
                                    <div class="payment-icon ovo"></div>
                                </div>
                                OVO
                            </div>
                            <div class="payment-method flex">
                                <div class="payment-img">
                                    <div class="payment-icon paypal"></div>
                                </div>
                                Paypal
                            </div>
                            <div class="payment-method flex">
                                <div class="payment-img">
                                    <div class="payment-icon doku"></div>
                                </div>
                                Doku Wallet
                                </div>
                            </div>
                        <p style="margin-top: 50px; font-size: 14px; font-weight: light;">By clicking "Place Order" below, I represent that I am over 18 and an authorized user of this payment method, and I agree to the <a href="#">End User Licence Agreement</a>.</p>
                        <button>Place Order</button>
                    </div>
                </div>
            </div>
        </div>`)
    });
});

//modal delete account
$(function() {
    $('#deleteAccModalToggle').on('click', function() {
        console.log("skjsakldjasdhjlasbdl")
        $('#deleteAccountModal').show();
        $("body").addClass("modal-open");
    })
})

//confirm delete modal
$(document).ready(function(){
	$("#deleteAccount").on('click', function(event){
		submitForm();
		return false;
	});
});
function submitForm(){
    $.ajax({
       type: "POST",
       url: "hapus.php",
       cache: false,
       success: function(response){
           location.reload()
       },
       error: function(){
           alert("Error");
       }
   });
}

// search
$(function () {
    $("#search-input").on("keyup", function () {
        var value = $(this).val().toLowerCase();
        $("#game-part .game-card").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});

/////////////////// Sandbox ////////////////////

var allData = []
var list = ""
$(function () {
    var url = "https://subdom3.gilang-301.com/test.json"
    if (!localStorage || localStorage.getItem('data') === null) {
        $.getJSON(url, function (data) {
            for (let i = 0; i < data.length; i++) {
                console.log(data[i].name)
                allData.push(data[i])
                list += `<li>${data[i].name}</l>`
            }
            localStorage.setItem('data', JSON.stringify(allData))
            console.log(JSON.parse(localStorage.getItem('data')))
            console.log(list)
        }
        );
    } else {
        allData = JSON.parse(localStorage.getItem('data'))
        appendData(allData)
    }
})

$(function () {
    $("#add-button").on('click', function () {
        var nameInput = $('#name-input')
        var ratingInput = $('#rating-input')
        if (nameInput.val() && ratingInput.val()) {
            allData.push({
                name: nameInput.val(),
                rating: ratingInput.val()
            })
            localStorage.setItem('data', JSON.stringify(allData))
            appendData(allData)
            nameInput.val(null)
            ratingInput.val(null)
        } else {
            alert("belum ada inputan")
        }
    })
    $("#remove-button").on('click', function () {
        localStorage.clear()
        allData = []
        appendData(allData)
    })
    $('body').on('click', '.list', function () {
        console.log($(".list").index($(this)))
    })
})

function appendData(data) {
    console.log(data)
    list = ''
    $('#sandbox-1 .list').remove()
    for (let i = 0; i < data.length; i++) {
        list += `
        <li class="list">
            <p>${allData[i].name}</p>
            <p>${allData[i].rating}</p>
        </l>`
    }
    $('#sandbox-1').append(list)
}
