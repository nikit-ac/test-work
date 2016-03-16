function sendAjax(){

    this.event.preventDefault();

    x = $('[name ^= "phrase"]') ;

    var arr = [];
    for (var i = 0; i < x.length; i++) {
      arr.push(x[i].value);
    };

    data = JSON.stringify(arr);

    $.ajax({
      type: "POST",
      url: 'ajax.php',
      data: {data: data},
      success: myCallback,
    });

    function myCallback( returnedData ) {
      if (returnedData == 1) {
        $("#data-success").show();
      } else{
        $("#data-error").show();
      };
    };
};

function hideMessage(){
  $("#data-success").hide();
  $("#data-error").hide();

}



