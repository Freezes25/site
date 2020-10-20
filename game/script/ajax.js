$('.btn_sigin').click((e) => {
   e.preventDefault();
   $(`input`).removeClass('error_sigin');
   let login = $(`input[name="login"]`).val(),
    password = $(`input[name="password"]`).val();
   $.ajax({
       url: '../server/sigin.php',
       type: 'POST',
       dataType: 'json',
       data:{
           login:login,
           password:password
       },
       success: function(data){
           if(data.status){
               document.location.href = '../game.php';
           }else{
               if(data.type === 1){
                   data.fields.forEach(field => {
                       $(`input[name=${field}]`).addClass('error_sigin');
                   });
               }
                $('.error_message').removeClass('none').text(data.message);
           }
         
       }
   });

});
$('.btn_signup').click((e) => {
    e.preventDefault();
    $(`input`).removeClass('error_sigin');
    let login = $(`input[name="login"]`).val(),
     password = $(`input[name="password"]`).val(),
     repeat_password = $(`input[name="repeat_password"]`).val(),
     email = $(`input[name="email"]`).val(),
     name = $(`input[name="name"]`).val();
    $.ajax({
        url: '../server/signup.php',
        type: 'POST',
        dataType: 'json',
        data:{
            login:login,
            password:password,
            repeat_password: repeat_password,
            email:email,
            name:name
        },
        success: function(data){
            if(data.status){
                document.location.href = '../sigin.php';
            }else{
                if(data.type === 1){
                    data.fields.forEach(field => {
                        $(`input[name=${field}]`).addClass('error_sigin');
                    });
                }
                 $('.error_message').removeClass('none').text(data.message);
            }
          
        }
    });
 
 });
 
