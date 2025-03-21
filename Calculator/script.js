function insertValue(value) {
    document.getElementById("result").value += value;
}

function clearResult() {
    document.getElementById("result").value = '';
}

function deleteResult() {
    let result = document.getElementById("result").value;
    document.getElementById("result").value = result.slice(0, -1);
}

function calculate() {
    try {
        document.getElementById("result").value = eval(document.getElementById("result").value);
    } catch (error) {
        document.getElementById("result").value = 'Error';
    }
}
