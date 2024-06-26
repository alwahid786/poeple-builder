function moveToNext(currentInput) {
    currentInput.value = currentInput.value.replace(/[^0-9]/g,'');
}

function tabChange(val) {
    let otpInput = document.querySelectorAll('input');

    if (otpInput[val - 1].value !== '') {
        if (val < otpInput.length) {
            otpInput[val].focus();
        }
    } else if (otpInput[val - 1].value === '' ) {
        otpInput[val - 2].focus();
    }
}

$("#continue-btn").click(function(e) {
    e.preventDefault();
  var otpValues = $("[name='otp[]']").map(function() {
    if(this.value!=''){
    return this.value;
    }
  }).get();
  if(otpValues.length<4){
    swal({
        title: "System Error!",
        text: "Please enter a valid one time password.",
        icon: "error",
    });
    return false;
  }
  otpValues = otpValues.join("");
  $("#otpCodeField").val(otpValues);
  $("#reset-password").submit();
  })