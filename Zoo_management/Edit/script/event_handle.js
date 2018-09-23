function all_edit_opt_hide() {
    document.getElementById("add_data").style.display = "none";
	document.getElementById("delete_data").style.display = "none";
	document.getElementById("update_data").style.display = "none";
	document.getElementById("delete_table").style.display = "none";
}
function adddata() {
    document.getElementById("add_data").style.display = "block";
	document.getElementById("delete_data").style.display = "none";
	document.getElementById("update_data").style.display = "none";
	document.getElementById("delete_table").style.display = "none";
}
function deletedata() {
    document.getElementById("add_data").style.display = "none";
	document.getElementById("delete_data").style.display = "block";
	document.getElementById("update_data").style.display = "none";
	document.getElementById("delete_table").style.display = "none";
}
function updatedata() {
    document.getElementById("add_data").style.display = "none";
	document.getElementById("delete_data").style.display = "none";
	document.getElementById("update_data").style.display = "block";
	document.getElementById("delete_table").style.display = "none";
}
function deletetable() {
    document.getElementById("add_data").style.display = "none";
	document.getElementById("delete_data").style.display = "none";
	document.getElementById("update_data").style.display = "none";
	document.getElementById("delete_table").style.display = "block";
}