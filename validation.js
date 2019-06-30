$(document).ready(function() {
  $("form").validate({
    rules: {
      mail: {
        required: true,
        pattern: /^[a-z]{1}.[a-z]{3,}$/
      },
      oldpw: "required",
      newpw: {
        required: true,
        minlength: 8,
        pattern: /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[#$^+-=!*()@%?&]).{8,}$/
      },
      newpw2: {
        required: true,
        equalTo: "#newpw"
      }
    },
    messages: {
      mail: {
        required: "Bitte gib den Teil vor dem @-Symbol ein.",
        pattern: "Bitte gib den Teil vor dem @-Symbol ein."
      },
      oldpw: {
        required: "Bitte gib dein altes Passwort hier ein."
      },
      newpw: {
        required: "Bitte gib dein neues Passwort ein.",
        minlength: $.validator.format("Das Passwort muss mindestens {0} Zeichen lang sein."),
        pattern: `Das Passwort muss jeweils mindestens einen Groß- und Kleinbuchstaben,
                  sowie Zahl und Sonderzeichen besitzen.`
      },
      newpw2: {
        required: "Bitte gib dein neues Passwort hier erneut ein.",
        equalTo: "Das Passwort muss gleich der vorherigen Eingabe sein."
      }
    },
    highlight: function(input) {
      $(input).addClass("is-invalid");
    },
    unhighlight: function(input) {
      $(input).removeClass("is-invalid");
    },
    errorPlacement: function(error, element) {
      $(element)
        .closest(".form-group")
        .find(".invalid-feedback")
        .append(error);
    }
  });

  $(".pw-field button").on("click", function() {
    var inputElem = $(this)
      .parent()
      .parent()
      .find("input");
    var iconElem = $(this)
      .parent()
      .parent()
      .find("i");

    if (inputElem.attr("type") === "text") {
      inputElem.attr("type", "password");
      iconElem.addClass("fa-eye-slash");
      iconElem.removeClass("fa-eye");
    } else if (inputElem.attr("type") === "password") {
      inputElem.attr("type", "text");
      iconElem.addClass("fa-eye");
      iconElem.removeClass("fa-eye-slash");
    }
  });
});
