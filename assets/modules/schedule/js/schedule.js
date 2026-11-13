$(document).ready(function(){
    viewdescrip();
});

const viewdescrip = () => {
    $(document).on('click', '#view-descript', function () {
        param['this'] = $(this).parents('.card-schedule').next('.details');
        param['details'] = $('.details');
        if(param['this'].hasClass('active')){
           param['this'].slideUp().removeClass('active');
        }else{
            $.each(param['details'], function (index, attr) {
                if ($(attr).hasClass('active')) {
                    $(attr).slideUp().removeClass('active');
                    return false;
                }
            });
            param['this'].slideDown().addClass('active')
        }
    });
}