var elem = document.getElementById('main');
$(function() {
    myVar = setTimeout(showPage, 1500);
    
    function showPage() {
        document.getElementById("loader").style.display = "none";
        elem.style.display = "block";
      }
})