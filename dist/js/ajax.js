/*
function cari() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("hasil").innerHTML =
      this.responseText;
    }
  };
  xhttp.open("GET", "php/cari.php", true);
  xhttp.send();
}
*/
$("#search").click(function(){
  var data = $("#FormCari :input").serializeArray();
  $.post($("#FormCari").attr("action"), data, function(info){$("#hasil").html(info);});
});
