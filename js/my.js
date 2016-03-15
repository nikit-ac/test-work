$(document).ready(function(){

  $('#send-ajax').click( function() {

    x = $('[name ^= "phrase"]') ;


    function objToString(o) {//===============Удалить
      var s = '{\n';
          for (var p in o)
              s += '    "' + p + '": "' + o[p] + '"\n';
          return s + '}';
    }

    var arr = [];
    for (var i = x.length - 1; i >= 0; i--) {
      arr.push(x[i].value);
    };

    data1 = JSON.stringify(arr);
    // alert(data)  // получил ["1","2","3"]

    $.ajax({
      type: "POST",
      url: 'response.php',
      data: {d: data1},
      success: myCallback,
      dataType: JSON
    });




    // $.post('response.php',
    //   data=data1,
    //    myCallback);

    function myCallback( returnedData ) {
      // alert(returnedData);// получил array(0){}
    }







    // $.ajax({
    //   type: 'POST',
    //   url: 'response.php',
    //   data: 'name=Andrew&nickname=Aramis',

    //   success: function(data) {
    //     $('.results').html(data);
    //   }
    // });

  });

});
