function insert_user(){

    $.ajax({
          url: "../application/controllers/menuController.php",
          type: 'POST',
          data:{
            firstname: 'yo',
            lastname: 'soy'
          },
          success:function() {
              alert("Pass");
          },
          error: function(){
              alert("Fail");
          }
      }).done(function (response){
        if (response.success) {
            if (response.data == 'not') {
                alert(response.message);
                window.close();
            } else {
                if (pfoo != null) {
                    pfoo(response.data, response.message);
                    // return response;
                }
                return response.data;
            }
        }
      }).fail(function (jqXHR, textStatus, errorThrown) {
          response = {
              "success": false,
              "message": "fail"
          };
          // $("#status").html("Algo ha fallado: " + textStatus);
          return response;
      });
}
function get_ajax_data(pcalltype, purl, pparams, pfoo) {
    $.ajax({
        data: pparams,
        type: pcalltype,
        dataType: "json",
        url: purl
    }).done(function (response) {
        if (response.success) {
            if (response.data == 'not') {
                alert(response.message);
                window.close();
            } else {
                if (pfoo != null) {
                    pfoo(response.data, response.message);
                    // return response;
                }
                return response.data;
            }
        }
        // return response.data;
    }).fail(function (jqXHR, textStatus, errorThrown) {
        response = {
            "success": false,
            "message": "fail"
        };
        // $("#status").html("Algo ha fallado: " + textStatus);
        return response;
    });
}
