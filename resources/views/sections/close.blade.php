<html>
<head>
<script>
function loaded()
{

    window.setTimeout(CloseMe, 0);
}

function CloseMe() 
{
    window.close();
}
</script>
</head>
<body onLoad="loaded()">
Hello!
</body>