// parsing json data
function allMenu() {
  $.getJSON("data/pizza.json", function (data) {
    let menu = data.menu;
    $("#daftar-menu").empty();
    $.each(menu, function (i, data) {
      $("#daftar-menu").append(
        '<div class="col-md-4"><div class="card mb-3"><img src="img/pizza/' +
          data.gambar +
          '" class="card-img-top" alt=' +
          data.nama +
          ' /><div class="card-body"><h5 class="card-title">' +
          data.nama +
          '</h5><h5 class="card-title">Rp. ' +
          data.harga +
          '</h5><p class="card-text">' +
          data.deskripsi +
          '</p><a href="#" class="btn btn-primary">Order sekarang</a></div></div></div></div>'
      );
    });
    // console.log(i);
  });
  // parsing json data end
}

allMenu();

// filtering data dan move active
$(".nav-link").on("click", function () {
  $(".nav-link").removeClass("active");
  $(this).addClass("active");

  let kategori = $(this).html();
  $("h1").html(kategori);

  if (kategori == "All Menu") {
    allMenu();
    return;
  }
  $.getJSON("data/pizza.json", function (data) {
    let menu = data.menu;
    let content = "";

    $.each(menu, function (i, data) {
      if (data.kategori == kategori.toLowerCase()) {
        content +=
          '<div class="col-md-4"><div class="card mb-3"><img src="img/pizza/' +
          data.gambar +
          '" class="card-img-top" alt=' +
          data.nama +
          ' /><div class="card-body"><h5 class="card-title">' +
          data.nama +
          '</h5><h5 class="card-title">Rp. ' +
          data.harga +
          '</h5><p class="card-text" id="description">' +
          data.deskripsi +
          '</p><a href="#" class="btn btn-primary">Order sekarang</a></div></div></div></div>';
      }
    });

    $("#daftar-menu").html(content);
  });
});
// filtering data dan move active end

// truncate word
function batasiKata(elem, batas) {
  var text = elem.textContent.trim().split(" ");
  if (text.length > batas) {
    elem.textContent = text.slice(0, batas).join(" ") + "...";
  }
}

var cardDescription1 = document.getElementById("#description")
var kataBatas = 2; // Ganti dengan jumlah kata yang Anda inginkan
batasiKata(cardDescription1, kataBatas);
// truncate word end
