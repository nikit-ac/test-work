function sendAjax () {

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

    function myCallback (returnedData) {
      if (returnedData == 1) {
        $("#data-success").show();
      } else{
        $("#data-error").show();
      };
    };
};

function hideMessage () {
  $("#data-success").hide();
  $("#data-error").hide();
}

function showNumber () {
  $("#text-diff").show(200);
  $("#number-diff").show(200);
}

function hideNumber () {
  $("#text-diff").hide(200);
  $("#number-diff").hide(200);
}

function checkNumber (val) {
  if ((val-Math.floor(val)==0) && val>0) {
    $("#text-diff").attr("class", "success");
    $("#text-diff .help-inline").hide();
    $("#del").removeAttr("disabled");


  } else{
    $("#text-diff").attr("class", "error");
    $("#text-diff .help-inline").show(200);
    $("#del").attr("disabled" , "disabled");
  };
}
