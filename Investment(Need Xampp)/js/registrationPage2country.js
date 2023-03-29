/* var select = document.getElementById("country");

for (var code in countries) {
  var option = document.createElement("option");
  option.text = countries[code];
  option.value = code;
  select.add(option);
}
*/

window.onload = function() {
    var select = document.getElementById("country");

    for (var code in countries) {
      var option = document.createElement("option");
      option.text = countries[code];
      option.value = code;
      select.add(option);
    }
  };
