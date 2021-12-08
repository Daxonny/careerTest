var step = document.getElementById('step').innerHTML;
var maxStep = document.getElementById('maxStep').innerHTML;

$(function() {
    var elem = document.getElementById('progress');
    var width = (100*step)/maxStep;
    elem.style.width = width + "%";
})
