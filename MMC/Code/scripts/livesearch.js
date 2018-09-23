function fetchInfo(str) {

    if (str.length == 0) {
        document.getElementById("pname").innerHTML = "";
        return;
    }

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("page").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "../process/fetch_patient_age.php?q=" + str, true);
    xmlhttp.send();

}

$(document).ready(function(){
    $.ajaxSetup({ cache: false });
    $('#search-box').keyup(function() {

        var l = document.getElementById("search-box").value.length;
        if(l>0) {
            $('#search-result').html('');
            $('#state').val('');
            var searchField = $('#search-box').val();
            var expression = new RegExp(searchField, "i");
            // var x = document.getElementById("search-box").value
            $.getJSON('medicine.json', function (data) {
                $.each(data, function (key, value) {
                    if (value.name.search(expression) != -1) {
                        $('#search-result').append('<li class="list-group-item link-class">' + value.name + '</li>');
                    }
                });
            });
        }
        else{
            var list = document.getElementById("search-result");
            while (list.hasChildNodes()) {
                list.removeChild(list.firstChild);
            }
        }

    });

    $('#search-result').on('click', 'li', function() {
        var click_text = $(this).text();
        $('#search-box').val(click_text);
        $("#search-result").html('');
    });
});


    function livemedicinesearch(str) {

        var l = str.length;
        if (l > 0) {
            $('#search-result').html('');
            $('#state').val('');


            var searchField = str;
            var expression = new RegExp(searchField, "i");
            // var x = document.getElementById("search-box").value
            $.getJSON('medicine.json', function (data) {
                $.each(data, function (key, value) {
                    if (value.name.search(expression) != -1) {
                        $('#search-result').append('<li class="list-group-item link-class">' + value.name + '</li>');
                    }
                });
            });
        }
        else {
            var list = document.getElementById("search-result");
            while (list.hasChildNodes()) {
                list.removeChild(list.firstChild);
            }
        }


    }

    $('#search-result').on('click', 'li', function() {
        var click_text = $(this).text();
        var focused_element = null;

        if (
            document.hasFocus() &&
            document.activeElement !== document.body &&
            document.activeElement !== document.documentElement
        ) {
            focused_element = document.activeElement;
        }
        focused_element.val(click_text);
        $("#search-result").html('');
    });
// $('#search-result').on('click', 'li', function() {
//     var click_text = $(this).text();
//     $('#m').val(click_text);
//     $("#m").html('');
// });







