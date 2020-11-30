// Toggle class between login and register
$(".tab").on("click", function() {
    $(this).toggleClass('active').siblings().removeClass('active');
});

// Load login file on page load
$( window ).on( "load", function() {
    $(".login-form").load("view/login-form.php");
});

// Load login file on Login tab click
$(document).ready(function(){
  $("#login").click(function(){
    $(".login-form").load("view/login-form.php");
  });
});

// Load register file on Register tab click
$(document).ready(function(){
  $("#register").click(function(){
      $(".login-form").load("view/register-form.php");
  });
});


$(document).ready(function() { 
    // bind 'assessment' form and provide a simple callback function 
    $('#assessment').ajaxForm(function() { 
        $("#assessment")[0].reset();
        setTimeout(function(){
          window.location.reload(1);
        }, 100); 
    }); 
  }); 

//Enable button if something is edited in the form
$('#editProfile').keyup(function () {    
    $('#saveEdits').removeAttr('disabled');
}); 

$(document).ready(function() { 
    // bind 'editProfile' form and provide a simple callback function 
    $('#editProfile').ajaxForm(function() { 
        $("#editProfile")[0].reset();
        setTimeout(function(){
          window.location.reload(1);
        }, 1); 
        alert('Record Updated');
    }); 
  }); 


  //Delete list when the delete button is clicked
$(function(){
    $('.delete-assessment').click(function(ev){
        ev.preventDefault;
        var id= $(this).attr('id');
        var $ele = $(this).parent().parent();
        $.ajax({
        type:'GET',
        url:'model/delete_assessment.php',
        data:{id:id},
        success: function(data){
          
            setTimeout(function(){
              window.location.reload(1);
            }, 100); 
        }
        })
  })
  })

  $(function(){
    $('.delete-account').click(function(ev){
        ev.preventDefault;
        var id= $(this).attr('id');
        var $ele = $(this).parent().parent();
        if(confirm('Are yu sure you want to delete this account?')){
          $.ajax({
          type:'GET',
          url:'model/delete_account.php',
          data:{id:id},
          success: function(data){
            
              setTimeout(function(){
                window.location.reload(1);
              }, 100); 
              
          }
        })
      }
  })
  })


$(function () {
  $("[rel='tooltip']").tooltip();
});