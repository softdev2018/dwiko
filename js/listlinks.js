function openList(evt, listName){
  var tabcontent, tablinks;
  tabcontent = document.getElementByClassName("tabcontent");
  for (var i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(listName).style.display = "block";
      evt.currentTarget.className += " active";
}

document.getElementById("defaultOpen").click();
