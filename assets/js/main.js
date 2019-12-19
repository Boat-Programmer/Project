// Function navbar 
$(window).scroll(function(){
    var scrollTop = $(this).scrollTop(); //! 
    if (scrollTop > 1){
        $('#navbar').css('padding','5px 25px') 
    } else {
        $('#navbar').css('padding','25px')
    }
})

// function vaildate

$( document ).ready(function(){
    $('#formRegister').validate({
        rules:{
            name :'required',
            email: {
                required: true,
                email: true
            },
            phone:{
                required : true,
                number : true,
                maxlength : 20
            },
            username:{
                required: true,
                minlength: 4
            },
            Password:{
                required : true,
                minlength : 4
            },
            confirm_password:{
                required : true,
                minlength : 4,
                equalTo : '#Password'
            }
        },
        messages:{
            name: 'โปรดกรอกข้อมูล ชื่อ - นามสกุล',
            email: {
                required : 'โปรดกรอก Email',
                email : 'โปรดกรอก Email ให้ถูกต้อง'
            },
            phone:{
                required : 'โปรดกรอกข้อมูล เบอร์โทรศัพท์',
                number : 'โปรดกรอกตัวเลขเท่านั้น',
                maxlength : 'โปรดกรอกตัวเลขไม่เกิน 20 ตัว'
            },
            username:{
                required: 'โปรดกรอกข้อมูล ชื่อผู้ใช้งาน',
                minlength: 'โปรดกรอกข้อมูล ไม่น้อยกว่า 4 ตัวอักษร'
            },
            Password:{
                required : 'โปรดกรอก รหัสผ่าน',
                minlength : 'โปรดกรอกข้อมูล ไม่น้อยกว่า 4 ตัวอักษร'
            },
            confirm_password:{
                required : 'โปรดกรอก รหัสผ่าน',
                minlength : 'โปรดกรอกข้อมูล ไม่น้อยกว่า 4 ตัวอักษร',
                equalTo : 'โปรดกรอกข้อมูลรหัสผ่านให้ตรงกัน'
            }

        },
        errorElement: 'div',
        errorPlacement: function (error, element){
            error.addClass( 'invalid-feedback' )
            error.insertAfter( element )
        },
        highlight: function (element , errorClass, validClass){
            $( element ).addClass( 'is-invalid' ).removeClass( 'is-valid' )
        },
        unhighlight: function (element , errorClass, validClass){
            $( element ).addClass( 'is-valid' ).removeClass( 'is-invalid' )
        }
        
    });
})


$('.to-top').click(function (){
    $('html, body').animate({scrollTop: '0px'}, 800);
})

$(document).ready( function () {
    $('#myTable').DataTable();
} );