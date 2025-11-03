import './bootstrap';
import * as bootstrap from 'bootstrap';

// === CODE CHO DATEPICKER ===
import flatpickr from "flatpickr";
import { Vietnamese } from "flatpickr/dist/l10n/vn.js";

document.addEventListener("DOMContentLoaded", function() {
  flatpickr(".datepicker", {
      "locale": Vietnamese,
      dateFormat: "d/m/Y",
  });
});

// === Code cho nút "Back to Top" ===
document.addEventListener("DOMContentLoaded", function() {
  let mybutton = document.getElementById("btn-back-to-top");

  if(mybutton) {
    window.onscroll = function() { scrollFunction() };

    function scrollFunction() {
      if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        mybutton.classList.add("show");
      } else {
        mybutton.classList.remove("show");
      }
    }

    mybutton.addEventListener("click", function(e) {
      e.preventDefault();
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });
  }
});
