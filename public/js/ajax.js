$.ajaxSetup({

    headers: {

        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

    }

});

$(document).on('submit','#post_job',function(e){
    e.preventDefault();
      let $form = $(this);
      let url = $form.attr('action');
      let method = $form.attr('method');
      let formdata = $form.serialize();
      $.ajax({ 
        url: url, 
        type: method,
        data: formdata,
        success: function(data){
            if(data.status == 'inserted'){
                document.getElementById("post_job").reset();
            }
            
            console.log(data);
            successalert(data.message)
      },
      error: function(data){
          console.log(data);
          erroralert(data.responseJSON);
      }
    });
  });

  $(".apply").on('click',function(e){
    let id = $(this).attr('id');
    let url = $('#apply_url').val()+id;

    $.ajax({
        url: url,
        type: 'POST',
        success: function(data){
            successalert(data.message);
        },
        error: function(data){
            erroralert(data.responseJSON);
        }
    })

  });

  function applyjob(id)
  {
    let url = $('#apply_url').val()+'/'+id;

    $.ajax({
        url: url,
        type: 'POST',
        success: function(data){
            successalert(data.message);
            $('#card'+id).addClass('bg_apply');
        },
        error: function(data){
            erroralert(data.responseJSON);
        }
    })
  }

  function successalert(message){
    $('.alert-danger').hide();
    $('.alert-success').text(message).show();
  }

  function erroralert(data){
    $.each(data.errors, function(key, value){
        $('.alert-success').hide();
        $('.alert-danger').show();
        $('.alert-danger').append('<p>'+value+'</p>');
    });
  }