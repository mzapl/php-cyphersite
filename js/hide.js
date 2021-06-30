function resetsnippet(){
    $('.cipher').on('change', function() {
        var cipher = $('.cipher').val();
        console.warn(this.value)
        if(cipher == "affine"){
            $(".optional-affine").css('display', 'block')
            $(".optional-vingenere").css('display', 'none')
        }

        else if (cipher == "vingenere"){
            $(".optional-affine").css('display', 'none')
            $(".optional-vingenere").css('display', 'block')
        }

        else{
            $(".optional-affine").css('display', 'none')
            $(".optional-vingenere").css('display', 'none')
        }

    });



}