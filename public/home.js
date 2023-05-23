function validateForm(e)
{
    e.preventDefault();
    let number1=document.getElementById('number1').value;
    let number2=document.getElementById('number2').value;
    //console.log(number1.value);
    if(Number.isInteger(number1)){
        console.log('This is integer');
    }
    console.log(number1);
    if (isNaN(number1)) {
        console.log('This is not number');
    }
    else{
        console.log('This is empty');
    }
    if (!number1) {
        document.getElementById('number1').innerHTML='This field is required.';
        formOneMessage.innerHTML='This field is required.';
    }
    else{
        formOneMessage.style.display='none';
    }
    if (!number2) {
        document.getElementById('number2').innerHTML='This field is required.';
    }
    if(number1&&number2){
        document.getElementById('calxform').submit();
    }
}