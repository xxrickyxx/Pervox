   $(document).ready(function() {
    $('#checkUsernameBtn').click(function() {
        // ...
        // Il codice AJAX e la verifica dell'username possono rimanere invariati
        // ...
    });

    $('#copyUsernameBtn').click(function() {
        var username = $('#username').val();
        
        if (username) {
            copyToClipboard(username);
            alert('Username copiato!');
        } else {
            alert('Nessun username da copiare.');
        }
    });

    $('#downloadUsernameBtn').click(function() {
        var username = $('#username').val();

        if (username) {
            var blob = new Blob([username], { type: 'text/plain' });
            var link = document.createElement('a');
            link.href = window.URL.createObjectURL(blob);
            link.download = 'new_username.txt';
            link.click();
        } else {
            alert('Nessun username da scaricare.');
        }
    });
});

function copyToClipboard(text) {
    var textarea = document.createElement('textarea');
    textarea.value = text;
    document.body.appendChild(textarea);
    textarea.select();
    document.execCommand('copy');
    document.body.removeChild(textarea);
}





    var n = 2;
    var card = document.getElementById("card");
    var log = document.getElementById("Login");
    var logh = document.getElementById("logh");
    var reg = document.getElementById("Register");
    var regh = document.getElementById("regh");
    var footer = document.getElementById("footer");
    var p = document.getElementById("p")
    var l = 1;
    var r = 0;


  function home() {
  window.location.href = "https://pervox.online";
}

  function login_register() {
  window.location.href = "https://pervox.online?route=login";
}

  function registerlogin() {
  window.location.href = "https://pervox.online?route=register";
}
    
    function register() 
    {
        if(r==0)
        {
            card.style.animationName = "spin";
        card.style.animationDuration = "2s";
       
       card.style.animationIterationCount = "1";
     
       logh.style.animationName = "rotate360-b-l";
            logh.style.animationDuration = "2s";
            logh.style.animationDirection = "linear"
            logh.style.animationIterationCount = "1";
            logh.style.animationFillMode = "forwards";
            
          
            regh.style.animationName = "rotate360-r"
            regh.style.animationDuration = "2s";
            regh.style.animationDirection = "linear"
            regh.style.animationIterationCount = "1";
            regh.style.animationFillMode = "forwards";
      
        setTimeout(codingCourse, 1000);

        function codingCourse() 
        {
          
         
            footer.style.display = "none";
            log.style.display = "none";
            regh.style.display = "flex";
            reg.style.display = "flex";
            card.style.backgroundColor = "rgba(255, 55, 0, 0)";
            card.style.boxShadow = "0px 0px 1000px 2px rgb(183, 183, 183)";
      
                  
     
       
        }
        l=0;
        r=1;
     
        }
    }
  