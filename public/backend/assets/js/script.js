function togglePasswordVisibility(password) {
    var passwordField = document.getElementById("password");
    var currentText = passwordField.textContent;

    if (currentText === "********") {
        passwordField.textContent = password;
    } else {
        passwordField.textContent = "********";
    }
}

function showImageByUserInput(){

    $(document).ready(function(){

        $('#image').change(function(e){

            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src', e.target.result);
                $('#showImage').show();
            }
            reader.readAsDataURL(e.target.files[0]);
        });
    });
}
