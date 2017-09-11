$('#pay-button').click(function (event) {
   event.preventDefault();
   $(this).attr("disabled", "disabled");

 $.ajax({

   url: './snaptoken',
   cache: false,
   success: function(data) {
     //location = data;
     console.log('token = '+data);

     var resultType = document.getElementById('result-type');
     var resultData = document.getElementById('result-data');
     function changeResult(type,data){
       $("#result-type").val(type);
       $("#result-data").val(JSON.stringify(data));
       //resultType.innerHTML = type;
       //resultData.innerHTML = JSON.stringify(data);
     }
     snap.pay(data, {

       onSuccess: function(result){
         changeResult('success', result);
         console.log(result.status_message);
         console.log(result);
         $("#payment-form").submit();
       },
       onPending: function(result){
         changeResult('pending', result);
         console.log(result.status_message);
         $("#payment-form").submit();
       },
       onError: function(result){
         changeResult('error', result);
         console.log(result.status_message);
         $("#payment-form").submit();
       }
     });
   }
 });
});
