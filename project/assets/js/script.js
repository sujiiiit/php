$(document).ready(function () {
    $(".form input").keyup(function () {
      $(this).removeClass("error");
    });
    $("#email").on("invalid", function () {
      $(this).addClass("error");
      $(".emailplaceholder").text("InvalidEmail");
    });
    $("#email").on("keyup", function () {
      $(".emailplaceholder").text("Email (required)");
    });
    $("#show-hide-pass").on("change", function () {
      $("#password").attr("type", this.checked ? "text" : "password");
      $("#password2").attr("type", this.checked ? "text" : "password");
    });
  });

document.getElementById("fullname").focus();
  $(document).ready(function () {
    $("#form").submit(function (e) {
      e.preventDefault();

      var fullname = $("#fullname").val();
      var email = $("#email").val();
      var password = $("#password").val();
      var forminputs = $("#form input");
      var empty = false;

      forminputs.each(function () {
        if (!$(this).val()) {
          $(this).addClass("error");
          empty = true;
          $(this).focus();
          return false;
        } else {
          $(this).removeClass("error");
        }
      });

      if (empty) {
        return;
      }
      if (password.length < 6) {
        $("#password").addClass("error");
        $("#password").focus();
        $(".spinner").removeClass("visible");
        return;
      }
    });
  });