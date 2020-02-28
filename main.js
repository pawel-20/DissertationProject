$(document).ready(function() {
  $(".form-control-range").on("input", update);
});

var bri, con, sat;

function update(ctrl) {
  bri = $("#bri").val();
  con = $("#con").val();
  sat = $("#sat").val();

  $("img").css(
    "filter",
    "brightness(" + bri + "%) contrast(" + con + "%)  saturate(" + sat + "%)"
  );
  $("img").css(
    "-webkit-filter",
    "brightness(" + bri + "%) contrast(" + con + "%) saturate(" + sat + "%)"
  );
}
