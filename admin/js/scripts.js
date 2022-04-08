
$(document).ready(function () {
   ClassicEditor
        .create( document.querySelector( '#body' ) )
        .catch( error => {
            console.error( error );
        } ); 
});

$(document).ready(function () {
    $('#CheckAllBoxes').click(function (event) {
        if (this.checked) {
            $('.CheckBoxes').each(function () {
                this.checked = true;
            })
        } else {
            $('.CheckBoxes').each(function () {
                this.checked = false;
            })
        }
    })
});

