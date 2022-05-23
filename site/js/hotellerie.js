$(document).ready(function () {
  var checkbox = document.querySelector(".checkbox_hotellerie");
  var selectselect1 = document.querySelector("#select_congre_id");
  var selectselect2 = document.querySelector("#select_hotel_id");
  var submitform = document.querySelector(".submit_hotellerie");

  selectselect2.addEventListener("change", function check() {
    $(".cost_hotellerie").empty();
    document.getElementById("checkbox").checked = false;
  });

  checkbox.addEventListener("change", function check() {
    if (document.getElementById("checkbox").checked) {
      //Si la checkbox est checked
      var select = selectselect2.value;
      if (select == "no") {
        $(".cost_hotellerie").empty();
        $(".cost_hotellerie")
          .append("Veuillez d'abord sélectionner un hotel.")
          .hide()
          .show("slow");
        setTimeout(() => {
          $(".cost_hotellerie").empty();
        }, 3000);
      } else {
        $.ajax({
          url: "?controleur=hotellerie&todo=getprix", // La ressource ciblée
          type: "POST", // Le type de la requête HTTP,
          data: "hotels=" + select,
          dataType: "html", // Le type de données à recevoir, ici, du PHP.
          success: function (response) {
            $(".cost_hotellerie").append(response).hide().show("slow");
          },
        });
      }
    } else {
      $(".cost_hotellerie").empty();
    }
  });

  const form = $(".form_hotellerie");
  form.submit(function (e) {
    e.preventDefault();
    var url = form.attr("action");
    var prix = "0€";
    var select1 = selectselect1.value;
    var select2 = selectselect2.value;

    if (select1 == "no") {
      $(".cost_hotellerie").empty();
      $(".cost_hotellerie")
        .append("Sélectionner un congressiste avant de confirmer.")
        .hide()
        .show("slow");
      setTimeout(() => {
        $(".cost_hotellerie").empty();
      }, 3000);
    } else if (select2 == "no") {
      $(".cost_hotellerie").empty();
      $(".cost_hotellerie")
        .append("Sélectionner un hotel avant de confirmer.")
        .show("slow");
      setTimeout(() => {
        $(".cost_hotellerie").empty();
      }, 3000);
    } else {
      $.ajax({
        url: url, // La ressource ciblée
        type: "POST", // Le type de la requête HTTP,
        data: form.serialize(),
        dataType: "html", // Le type de données à recevoir, ici, du PHP

        success: function (response) {
          $(".hotellerie_contain_part1").css("width", "50%");
          $(".hotellerie_contain_part2").empty();
          $(".hotellerie_contain_part2").css("width", "50%");
          $(".hotellerie_contain_part2").css(
            "border-left",
            "2px solid #19106f"
          );
          $(".submit_hotellerie").val("Confirmation en cours");
          $(".form_hotellerie").css("pointer-events", "none");
          $(".hotellerie_contain_part1").attr(
            "title",
            "Annuler votre confirmation"
          );

          $(".fas").addClass("fa-spinner");
          $(".submit_hotellerie").addClass("no_click");
          $(".hotellerie_contain_part1").mouseover(function () {
            $(".hotellerie_contain_part1").css("cursor", "not-allowed");
          });

          $(".hotellerie_contain_part2").append(response).hide().show("slow");
          var confirm_no = document.querySelector(".confirm-no");
          var confirm_yes = document.querySelector(".confirm-yes");

          confirm_no.addEventListener("click", function check() {
            $(".hotellerie_contain_part1").css("width", "100%");
            $(".hotellerie_contain_part2").css("width", "0%");
            $(".hotellerie_contain_part2").empty();
            $(".hotellerie_contain_part2").css("border-left", "none");
            $(".submit_hotellerie").val("Confirmer");
            $(".form_hotellerie").css("pointer-events", "unset");
            $(".hotellerie_contain_part1").removeAttr("title");
            $(".fas").removeClass("fa-spinner");
            $(".submit_hotellerie").removeClass("no_click");

            $(".hotellerie_contain_part1").mouseover(function () {
              $(".hotellerie_contain_part1").css("cursor", "auto");
            });
          });

          $("#form_confirmation").submit(function (e) {
            e.preventDefault();
            $.ajax({
              url: $("#form_confirmation").attr('action'),
              type: "POST", // Le type de la requête HTTP,
              data: form.serialize(),
              // data: { 'congredata=': select1, 'hoteldata=': select2 },
              dataType: "html", // Le type de données à recevoir, ici, du PHP.$

              success: function (response) {
                $(".confirm_buttons").remove();
                $(".hotellerie_contain_part2")
                  .append(response)
                  .hide()
                  .show("slow");
              },
            });
          });
        },
      });
    }
  });
});
