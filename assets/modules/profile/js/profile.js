$(document).ready(function(){
    onLoadData();
    change_password();
    update();
});

param['process_setting'] = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    allowOutsideClick: false,
    allowEscapeKey: false
});

const change_password = () => {
    $(document).on('click','#change-password',function(){
        param['attr_checker'] = $(this).attr('data-checker');
        if(param['attr_checker'] == 0){
            $(this).attr('data-checker', 1);
            $('#password-area').html(chage_passHTML());
        }else{
            $(this).attr('data-checker', 0);
            $('#password-area').html('');
        }
    });
}

const chage_passHTML = () => {        
    return `<div class="form-outline mb-4">
        <label class="form-label" for="form3Example4">Old Password</label>
        <input type="password" class="form-control input-check" name="oldpassword" placeholder="Old Password">
    </div>
    <div class="form-outline mb-4">
        <label class="form-label" for="form3Example4">New Password</label>
        <input type="password" class="form-control input-check" name="user[password]" placeholder="New Password">
    </div>
    <div class="form-outline mb-4">
        <label class="form-label" for="form3Example4">Confirmation Password</label>
        <input type="password" class="form-control input-check" name="cpassword" placeholder="Confirmation Password">
    </div>`;
}

const onLoadData = () => {
    $('[name="userdata[service_location]"]').val($('[name="forServiceLocation"]').val());
    // $('[name="userdata[degree]"]').val($('[name="forDegree"]').val());
    $('[name="userdata[specialty]"]').val($('[name="forSpecialy"]').val());

    $('[name="userdata[job_title]"]').val($('[name="forJobTittle"]').val());
    $('[name="userdata[organization]"]').val($('[name="forOrganization"]').val());
    $('[name="userdata[facility_location]"]').val($('[name="forFacilityLocation"]').val());

    const check = $('[name="forJobTittle"]')
    if(check.length !== 0){
        $('[name="userdata[service_location]"]').val($('[name="forServiceLocationCoor"]').val());
    }
}

const update = () => {
    $(document).on('submit','#profile-form',function(event){
        event.preventDefault();
        param['DATA'] = new FormData(this);
        param['input'] = $('.input-check');
        param['ERROR'] = 0;
        param['input'].each(function () {
            if (!$(this).val()) {
                param['ERROR']++;
            }
        });
        if (param['ERROR'] == 0) {
            $('.alert-danger').addClass('d-none').removeClass('d-block');
            param['server_request'] = server(`${param['BASE_URL']}profile/update`, param['DATA']);
            if (param['server_request'].status) {
                param['process_setting'].fire({
                    position: 'bottom-start',
                    icon: 'success',
                    title: '<span class="d-inline-block ml-2 text-uppercase">Profile successfully updated</span>',
                    timer: 3000
                }).then((result) => {
                    $('#data1 h4').html(param['server_request'].new_info[0].fname + ' ' + param['server_request'].new_info[0].lname);
                    $('div.card-body:nth-child(3) > h6:nth-child(4)').html(param['server_request'].new_info[0].phone);
                    $('div.card-body:nth-child(3) > h6:nth-child(2)').html(param['server_request'].new_info[0].email);
                    if($('#change-password').attr('data-checker') != 0){
                       $('#change-password').trigger( "click" ); 
                    }
                });
            } else {
                $('.alert-danger').removeClass('d-none').addClass('d-block');
                $('#messg').html(`${param['server_request'].message}`);
            }
        } else {
            $('.alert-danger').removeClass('d-none').addClass('d-block');
            $('#messg').html('ERROR, Please fill up the form');
        }
    });
}