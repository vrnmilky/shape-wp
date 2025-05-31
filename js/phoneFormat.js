const phone = document.querySelector('#phone');

const getInputNum = function (input) {
    return input.replace(/\D/g, '');
}

const onPhoneInput = function (e) {
    input = e.target
    let inputNumValue = getInputNum(input.value)
    let formattedNum = ''
    let selectionStart = input.selectionStart

    if (!inputNumValue) {
        return input.value = ''
    }

    if (selectionStart != input.value.length ) {
        if (e.data && /\D/g.test(e.data)) {
            input.value = inputNumValue
        }
        return;
    }


    if (['7', '8', '9'].includes(inputNumValue[0])) {
        if (inputNumValue[0] == '9') inputNumValue = '7' + inputNumValue;
        const firstSumbols = (inputNumValue[0] == '8') ? '8' : '+7';
        formattedNum = firstSumbols + ''
        if (inputNumValue.length > 1) {
            formattedNum += '(' + inputNumValue.slice(1, 4);
        }
        if (inputNumValue.length > 4) {
            formattedNum += ')-' + inputNumValue.slice(4, 7);
        }
        if (inputNumValue.length > 7) {
            formattedNum += '-' + inputNumValue.slice(7, 9);
        }
        if (inputNumValue.length > 9) {
            formattedNum += '-' + inputNumValue.slice(9, 11);
        }
        input.value = formattedNum


    }
    else {
        input.value = '+' + inputNumValue.slice(0, 16);
    }
}

phone.addEventListener('input', onPhoneInput);
