function clicked() {
    alert("Clicked");
}

function changeColor() {
    var textbox_id = "txtColor";
    var textbox = document.getElementById(textbox_id)

    var div_id = "div1";
    var div = document.getElementById(div_id);
    //verify values
    var color = textbox.value;
    div.style.backgroundColor = color;
}


$(document).ready(function () {
    $("#btn2").click(function () {
        var $colorJQ = $("#txtColorJQ").val();
        $("#div2").css("background-color", $colorJQ);
    });


});

$(document).ready(function () {
    $("#btn3").click(function () {
        $("#div3").fadeToggle("slow");
    });


});


