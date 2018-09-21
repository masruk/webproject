
function fetchPatientInfo(str)
{
	if (str.length == 0) {
        document.getElementById("pname").innerHTML = "";
        return;
    }
	else{
		fetchPatientName(str);
		fetchPatientAge(str);
	}
}


function fetchPatientName(str) {
     
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("pname").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "../process/fetch_patient_name.php?q=" + str, true);
        xmlhttp.send();

}
function fetchPatientAge(str) {
   
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("page").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "../process/fetch_patient_age.php?q=" + str, true);
        xmlhttp.send();
 
}
