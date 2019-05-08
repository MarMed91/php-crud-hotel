
function updatePrice() {

  var me = $(this);
  var priceHTML = me.parent();
  var id = priceHTML.data("id");
  var titleHTML = priceHTML.find("h1.title");
  var newPrice = prompt("Give me new price");

  $.ajax({

    url: "updatePagamentiByPrice.php",
    data: {
      id:id,
      price: newPrice
    },
    method: "POST",
    success: function(data) {
      printPendingPrice();
    }
  });
}

function printOspiti() {

  $.ajax({
    url:"getAllOspiti.php",
    method: "GET",
    success: function(data) {

      var ospiti = JSON.parse(data);

      var template = $("#person-template").html();
      var compiled = Handlebars.compile(template);

      var container = $(".ospiti");
      for (var i = 0; i < ospiti.length; i++) {
        var ospite = ospiti[i];

        var finalHTML = compiled(ospite);
        container.append(finalHTML);
      }
    }
  });
}

function deletePagamento() {

    var me = $(this);
    var priceHTML = me.parent();
    var id = priceHTML.attr("id");

    $.ajax({

      url: "deleteByPagamenti.php",
      data: { id: id },
      method: "POST",
      success: function(data) {
        printPendingPrice();
      }
    });
}

function priceClick() {

  var me = $(this);
  var id = me.attr("id");

  $.ajax({

    url: "getCreatedFromPagamenti.php",
    data: { id: id },
    method: "POST",
    success: function(data) {

      var created_at = JSON.parse(data);

      var created_atLi = me.find(".created_at");
      created_atLi.text(created_at[0])["created_at"];
    }
  });
}

function printPendingPrice() {

    var priceCont = $(".prices");
    priceCont.find("price").remove();

    $.ajax({

      url: "getPendingPrice.php",

      method: "GET",
      success: function(data) {

        var prices =  JSON.parse(data);

        var template = $("#person-template").html();
        var compiled = Handlebars.compile(template);

        var priceCont = $(".prices");

        for (var i = 0; i < prices.length; i++) {

           var price = prices[i];

           var priceHTML = compiled(price);
           priceCont.append(priceHTML);
        }
      }
    });
}

function init() {

//  printOspiti();
  printPendingPrice();

  $(document).on("click", ".price", priceClick)
  $(document).on("click", ".price .price", deletePagamento);
  $(document).on("click", ".price .edit", updatePrice);
}

$(document).ready(init);
