$(document).ready(function (){
    $('.razorpay-btn').click(function(){
        
    var fname=$('.fname').val();
    var lname=$('.lname').val();
    var email=$('.email').val();
    var phone=$('.phone').val();
    var address1=$('.address1').val();
    var address2=$('.address2').val();
    var city=$('.city').val();
    var state=$('.state').val();
    var country=$('.country').val();
    var pincode=$('.pincode').val();

    if(fname)
    {
        var fname_error="First Name is required";
        $('#fname_error').html('');
        $('#fname_error').html(fname_error);
    }
    else{
        fname_error="";
        $('#fname_error').html('');
    }
    });
})

