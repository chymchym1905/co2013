$(document).ready(function () {
    // Send Search Text to the server
    $("#search-input").keyup(function () {
      let searchText = $(this).val();
      if (searchText != "") {
        $.ajax({
          url: "search.php",
          method: "post",
          data: {
            query: searchText,
          },
          success: function (response) {
            $(".mylist1").html(response);
          }
        });
      } else {
        $(".mylist1").html("");
      }
    });
});
$(document).on('click','.data',function(){
  $('#search-input').val($(this).text());
});

let searchbox = document.querySelector('.dropdownsearch');

function searchOn(){
    searchbox.classList.add('drop');
}

function searchOff(){
    searchbox.classList.remove('drop');
}
