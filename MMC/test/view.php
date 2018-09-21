 <html>
<head>
<script>

</script>
</head>
<body>

<p><b>Start typing a name in the input field below:</b></p>
<form>
First name: <input type="text" onkeyup="varifyPatient(this.value)">
</form>
<p>Suggestions: <span id="pname"></span></p>


<script src="../scripts/ajax.js"></script>
</body>
</html> 