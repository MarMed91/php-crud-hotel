
function printPendingPrice() {

  var container = $(".prices");
  container.find(".price").remove();

  $.ajax({

    url: "getPendingPrices.php",
    method: "GET",
    success: function(data) {

        var prices = JSON.parse(data);

        var container = $(".prices");

        var template = $("#person-template").html();
        var compiled = Handlebars.compile(template);

        for (var i = 0; i < prices.length; i++) {
          var price = prices[i];

          var finalHTML = compiled(price);
          container.append(finalHTML);
        }
    }
  });

}

function priceClick() {

  var me = $(this);
  var id = me.data("id");

  $.ajax({

    url: "getCreatedFromPagamenti.php",
    data: { id: id },
    method: "POST",
    success: function(data) {

      var created_at = JSON.parse(data);

      var created_atLi = me.find(".created_at");
      created_atLi.text(created_at[0]["created_at"]);
    }
  });
}

function deletePagamento() {

  var me = $(this);
  var id = me.parent().data("id");

  $.ajax({

    url: "deletePagamentiById.php",
    data: { id: id },
    method: "POST",
    success: function(data) {
      printPendingPrice();
    }
  });
}

function updatePrice() {

  var me = $(this);
  var priceHTML = me.parent();
  var id = priceHTML.data("id");
  var titleH1 = priceHTML.find("h1.title");

  var newPrice = prompt("Give me new price");

  $.ajax({

    url: "updatePagamentiById.php",
    data: {
      id: id,
      price: newPrice
    },
    method: "POST",
    success: function(data) {
      printPendingPrice();
    }
  });
}

function init() {


  printPendingPrice();
  $(document).on("click", ".price", priceClick);
  $(document).on("click", ".delete", deletePagamento);
  $(document).on("click", ".edit", updatePrice);
}

$(document).ready(init);
