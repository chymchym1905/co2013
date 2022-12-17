$(document).ready(function () {
    // Send Search Text to the server
    $("#search-course").keyup(function () {
      let searchText = $(this).val();
      if (searchText != "") {
        $.ajax({
          url: "search.php",
          method: "post",
          data: {
            courses: searchText,
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
  $('#search-course').val($(this).text());
})