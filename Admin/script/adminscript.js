flag = 6;
function addf() {
    if (flag <= 7) {
        let a = document.createElement('input');
        div = document.getElementById('services');
        a.name = "serv" + flag;
        a.classList.add("form-control");
        a.placeholder = "Enter Service Provided.";
        div.appendChild(a);
        flag++;
    } else {
        alert("Maximum 7 feilds allowed.")
    }

}

document.querySelector('#breakfast').addEventListener('click', validation);
document.querySelector('#lunch').addEventListener('click', validation);
document.querySelector('#dinner').addEventListener('click', validation);



document.querySelector('#det_edit').addEventListener('click', enb_edit);
function enb_edit() {
    if (document.getElementById('det_edit').checked === true) {

        document.getElementById('breakfast').disabled = false;
        document.getElementById('lunch').disabled = false;
        document.getElementById('dinner').disabled = false;

        document.getElementById('mess_name').disabled = false;
        document.getElementById('mess_desc').disabled = false;
        document.getElementById('mess_price').disabled = false;
        document.getElementById('ser1').disabled = false;
        document.getElementById('ser2').disabled = false;
        document.getElementById('ser3').disabled = false;
        document.getElementById('ser4').disabled = false;
        document.getElementById('ser5').disabled = false;
        document.getElementById('ser6').disabled = false;
        document.getElementById('ser7').disabled = false;
        document.getElementById('lunch_input').disabled = false;
        document.getElementById('breakfast_input').disabled = false;
        document.getElementById('dinner_input').disabled = false;
        document.getElementById('reg').disabled = false;


    } else {
        document.getElementById('breakfast').disabled = true;
        document.getElementById('lunch').disabled = true;
        document.getElementById('dinner').disabled = true;
        document.getElementById('mess_name').disabled = true;
        document.getElementById('mess_desc').disabled = true;
        document.getElementById('mess_price').disabled = true;
        document.getElementById('ser1').disabled = true;
        document.getElementById('ser2').disabled = true;
        document.getElementById('ser3').disabled = true;
        document.getElementById('ser4').disabled = true;
        document.getElementById('ser5').disabled = true;
        document.getElementById('ser6').disabled = true;
        document.getElementById('ser7').disabled = true;
        document.getElementById('lunch_input').disabled = true;
        document.getElementById('breakfast_input').disabled = true;
        document.getElementById('dinner_input').disabled = true;
        document.getElementById('reg').disabled = true;

    }

    validation();
}

function validation() {
    if (document.getElementById("lunch").checked === true) {
        document.getElementById('lunch_input').disabled = false;
    } else {
        document.getElementById('lunch_input').disabled = true;
    }
    if (document.getElementById("breakfast").checked === true) {
        document.getElementById('breakfast_input').disabled = false;
    } else {
        document.getElementById('breakfast_input').disabled = true;
    }
    if (document.getElementById("dinner").checked === true) {
        document.getElementById('dinner_input').disabled = false;
    } else {
        document.getElementById('dinner_input').disabled = true;
    }

}