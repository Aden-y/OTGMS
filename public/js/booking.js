document.getElementById('people').oninput =
    function (ev) {
        const cost = document.getElementById('people').value *
            document.getElementById('price').value *
        document.getElementById('duration').value;
        document.getElementById('total').value = cost;
    };

document.getElementById('duration').oninput =
    function (ev) {
        const cost = document.getElementById('people').value *
            document.getElementById('price').value *
            document.getElementById('duration').value;
        document.getElementById('total').value = cost;
    };
