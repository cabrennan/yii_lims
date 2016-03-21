
<script>
    function myOnload() {
        // reload the parent window
        window.opener.location.reload(false);
        window.close(); // close this window
    }
</script>

<body onload="myOnload()"> </body>