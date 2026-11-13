<!-- jQuery -->
<script src="<?php echo base_url('assets/') ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/') ?>dist/js/adminlte.min.js"></script>

<script src="<?php echo base_url('assets/loading-overlay') ?>/loading-overlay.jquery.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>
</html>
    <?php
        __load_assets__($__assets__,'js');
    ?>
<script>
$(document).ready(function(){
    
/********login function***********/
    $('#login_form').submit( function(e){
        e.preventDefault()
        var data = $(this).serialize() 

        $.ajax({
            type: 'post',
            dataType: 'json',
            data: data,
            url: '<?php echo base_url('dashboard/login') ?>',
            cache: false,
            beforeSend: function(){
                loading_overlay(true)
            },
            success: function(response){
                loading_overlay(false)
                if(response.status !== 200){
                    var text = '', icon;
                    if(response.status === 55){
                        text = 'Please contact your administrator'
                        icon = 'error'
                    }else if(response.status === 50){
                        text = 'Please wait for your account verification'
                        icon = 'info'
                    }else{
                        text = 'Please try again'
                        icon = 'error'
                    }
                    sweet_alert(response.message, icon, text)
                }
                else{
                   window.location.replace('<?php echo base_url('home') ?>')
                }
            },
            error: function(err){
                sweet_alert('Problem encountered. Please contact the administrator immediately.', 'error', 'See console for more details')
                console.log(err)
            }
        })
    })

})
/********login function***********/
/********register function***********/

$('#register_form').submit(function(e){
    e.preventDefault()
        var data = $(this).serialize() 
        $.ajax({
            type: 'post',
            dataType: 'json',
            data: data,
            url: '<?php echo base_url('register/reg') ?>',
            cache: false,
            beforeSend: function(){
                loading_overlay(true)
            },
            success: function(response){
                var icon = '', text = 'Please try again';
                console.log(response)
                loading_overlay(false)
                if(response.status === 77){
                    icon = 'error'
                }
                else if(response.status === 202){
                    icon = 'info'
                }
                else if(response.status === 500){
                    icon = 'warning';
                    text = 'Please contact the administrator immediately';
                }
                else{
                    icon = 'success'
                    text = 'Please wait patiently for your account approval.'
                    $('#first_name').val('')
                    $('#last_name').val('')
                    $('#email').val('')
                    $('#password').val('')
                    $('#confirm_password').val('')
                }
                sweet_alert(response.message, icon, text)
            },
            error: function(err){
                console.log(err)
            }
        })
})

/********register function***********/

function loading_overlay(boolean) {
    $('.login-box').loadingOverlay(boolean, {
        backgroundColor:'rgba(255,255,255,0.85)',
    });
}

function sweet_alert(title, icon, text = null){
 Swal.fire({
    position: 'bottom-start',
    title: title,
    text: text,
    icon: icon,
    toast: true,
    timer: '3000',
    showConfirmButton: false,
 })
}
function sendAjax(url, data = {}){
    var res = null
    $.ajax({
        type: 'post',
        url: url,
        data: data,
        dataType: 'json',
        cache: false,
        async: false,
        success: function(response){
            res = response
        },
        error: function(err){
            res = err
        }
    })
    return res
}
</script>