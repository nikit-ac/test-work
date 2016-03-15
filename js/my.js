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
    data = JSON.stringify(arr);

    $.post('/response.php', data, myCallback);

    function myCallback( returnedData ) {
      alert(returnedData);
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
