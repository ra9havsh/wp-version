<html>
<head>
    <title>ddouble</title>
    <style>
        .check_version_form{
            margin: 200px auto;
            width: 100%;
            text-align: center;
        }
        
        .check_version_form input{
            padding: 10px 20px;
            width: 50%;
            border: 1px solid blue;
            border-radius: 4px;
        }
        .check_version_form button{
            padding: 5px 8px;
            width: 15%;
            font-size: 1.2em;
            color: white;
            background: blue;
            border: none;
            border-radius: 4px;
            margin-top: 10px;
            cursor:pointer
        }
        .check_version_form button:hover{
            padding: 4px 7px;
            font-size: 1.3em;
        }
        
        .result-box{
            text-align:center;
            font-size: 1.5em;
            margin: 10px 0;
        }
        
        /*loader*/
        #loader{
            display:none;
        }
        .lds-default {
          display: inline-block;
          position: relative;
          width: 80px;
          height: 80px;
        }
        .lds-default div {
          position: absolute;
          width: 6px;
          height: 6px;
          background: #f31919;
          border-radius: 50%;
          animation: lds-default 1.2s linear infinite;
        }
        .lds-default div:nth-child(1) {
          animation-delay: 0s;
          top: 37px;
          left: 66px;
        }
        .lds-default div:nth-child(2) {
          animation-delay: -0.1s;
          top: 22px;
          left: 62px;
        }
        .lds-default div:nth-child(3) {
          animation-delay: -0.2s;
          top: 11px;
          left: 52px;
        }
        .lds-default div:nth-child(4) {
          animation-delay: -0.3s;
          top: 7px;
          left: 37px;
        }
        .lds-default div:nth-child(5) {
          animation-delay: -0.4s;
          top: 11px;
          left: 22px;
        }
        .lds-default div:nth-child(6) {
          animation-delay: -0.5s;
          top: 22px;
          left: 11px;
        }
        .lds-default div:nth-child(7) {
          animation-delay: -0.6s;
          top: 37px;
          left: 7px;
        }
        .lds-default div:nth-child(8) {
          animation-delay: -0.7s;
          top: 52px;
          left: 11px;
        }
        .lds-default div:nth-child(9) {
          animation-delay: -0.8s;
          top: 62px;
          left: 22px;
        }
        .lds-default div:nth-child(10) {
          animation-delay: -0.9s;
          top: 66px;
          left: 37px;
        }
        .lds-default div:nth-child(11) {
          animation-delay: -1s;
          top: 62px;
          left: 52px;
        }
        .lds-default div:nth-child(12) {
          animation-delay: -1.1s;
          top: 52px;
          left: 62px;
        }
        @keyframes lds-default {
          0%, 20%, 80%, 100% {
            transform: scale(1);
          }
          50% {
            transform: scale(1.5);
          }
        }

    </style>
</head>
<body>

<div class="check_version_form">
    <input type="text" id="url" placeholder="Please enter the url...."/>
    <br />
    <button type="submit" onclick="loadDoc()">Check Version</button>
    <div class="result-box"><strong>Result: </strong><span id="result"></span></div>
    <div id="loader" class="lds-default"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
</div>


<script>
    function loadDoc() {
      document.getElementById("loader").style.display = "inline-block";
      var url = document.getElementById("url").value;
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
         document.getElementById("loader").style.display = "none";
         document.getElementById("result").innerHTML = this.responseText;
        }
      };
      xhttp.open("POST", "check_version.php", true);
      xhttp.setRequestHeader('content-type','application/x-www-form-urlencoded')
      xhttp.send("url="+url);
    }
</script>

</body>
</html>