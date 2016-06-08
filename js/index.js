$.ajax({
  url: "time.php",
  cache: false,
  success: function (html) {
    $('content_p').html(html);
  }
});


