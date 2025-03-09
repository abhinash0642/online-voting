$(document).ready(function() {
  jQuery('#state').change(function() {
      var id = jQuery(this).children(":selected").attr("id");
      if (id == 'abc') {
          jQuery('#district').html('<option id="abc">Select District</option>');
          jQuery('#constituency').html('<option id="abc">Select Constituency</option>');
      } else {
          jQuery('#district').html('<option id="abc">Select District</option>');
          jQuery('#constituency').html('<option id="abc">Select Constituency</option>');
          jQuery.ajax({

              type: 'POST',
              url: 'code.php',
              data: 'id=' + id + '&type=district',
              success: function(result) {

                  jQuery('#district').append(result);

              }

          });
      }
  });
  
  jQuery('#district').change(function() {
      var id = jQuery(this).children(":selected").attr("id");
      if (id == 'abc') {
          jQuery('#constituency').html('<option id="abc">Select Constituency</option>');
      } else {
          jQuery('#constituency').html('<option id="abc">Select Constituency</option>');
          jQuery.ajax({

              type: 'POST',
              url: 'code.php',
              data: 'id=' + id + '&type=constituency',
              success: function(result) {
                  jQuery('#constituency').append(result);
              }

          });
      }
  });

});