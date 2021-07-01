function resetsnippet(){
    $('.cipher').on('change', function() {
        var cipher = $('.cipher').val();
        console.warn(this.value)
        if(cipher === "affine"){
            $('input[name="optional-a"]').css('display', 'block')
            $('input[name="optional-b"]').css('display', 'block')
            $('input[name="optional-key"]').css('display', 'none')
        }

        else if (cipher === "vingenere"){
            $('input[name="optional-a"]').css('display', 'none')
            $('input[name="optional-b"]').css('display', 'none')
            $('input[name="optional-key"]').css('display', 'block')
        }

        else{
            $('input[name="optional-a"]').css('display', 'none')
            $('input[name="optional-b"]').css('display', 'none')
            $('input[name="optional-key"]').css('display', 'none')
        }

    });



}