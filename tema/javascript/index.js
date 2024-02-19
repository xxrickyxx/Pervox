// Apri il popup quando si fa clic sul pulsante "Scrivi un post"
document.getElementById("openPopupBtn").addEventListener("click", function() {
  document.getElementById("popup").style.display = "block";
});



    // Chiudi il popup senza inviare il form quando si fa clic sul pulsante "Chiudi"
    document.getElementById("closePopupBtn").addEventListener("click", function(event) {
        event.preventDefault(); // Previene il comportamento predefinito del pulsante (invio del form)
        document.getElementById("popup").style.display = "none";
    });

// Aggiungi una faccina emoticon al testo del post
function addEmoticon(emoticon) {
  var xcode = document.getElementById("xcode");
  xcode.value += emoticon;
  updateCharCountAndPreview(); // Aggiorna l'anteprima dopo aver aggiunto l'emoticon
}



    // Funzione per ottenere i parametri dall'URL (implementazione di esempio)
    function getURLParameter(name) {
      const urlParams = new URLSearchParams(window.location.search);
      return urlParams.get(name);
}


// Funzione per contare i caratteri e mostrare l'anteprima del post
function updateCharCountAndPreview() {
  const xcode = document.getElementById("xcode");
  const charCount = document.getElementById("charCount");
  const postPreview = document.getElementById("postPreview");

  const remainingChars = 1000 - xcode.value.length;
  charCount.textContent = `Characters remaining: ${remainingChars}`;

  // Mostra l'anteprima solo se la lunghezza del post è maggiore o uguale a 5 caratteri
  if (xcode.value.length >= 5) {
    // Verifica se l'anteprima contiene un URL di YouTube, TikTok o Vimeo
    const youtubeRegex = /(https?:\/\/www\.youtube\.com\/watch\?v=[A-Za-z0-9-_]+)/g;
    const tiktokRegex = /(https?:\/\/www\.tiktok\.com\/[@A-Za-z0-9_]+\/video\/[A-Za-z0-9-_]+)/g;
    const vimeoRegex = /(https?:\/\/vimeo\.com\/[0-9]+)/g;

    const youtubeUrlMatch = xcode.value.match(youtubeRegex);
    const tiktokUrlMatch = xcode.value.match(tiktokRegex);
    const vimeoUrlMatch = xcode.value.match(vimeoRegex);

    if (youtubeUrlMatch) {
      const videoId = youtubeUrlMatch[0].split("?v=")[1];
      const youtubePreview = `
        <div class="youtube-preview">
          <iframe
            width="100%"
            height="100%"
            src="https://www.youtube.com/embed/${videoId}"
            frameborder="0"
            allow="autoplay; encrypted-media"
            allowfullscreen
          ></iframe>
        </div>
      `;
      postPreview.innerHTML = youtubePreview;
      postPreview.style.display = "block";
    } else if (tiktokUrlMatch) {
      const tiktokEmbedUrl = tiktokUrlMatch[0].replace("https://www.tiktok.com/", "https://www.tiktok.com/embed/");
      const tiktokPreview = `
        <div class="tiktok-preview">
          <iframe
            width="100%"
            height="100%"
            src="${tiktokEmbedUrl}"
            frameborder="0"
            allow="autoplay; encrypted-media"
            allowfullscreen
          ></iframe>
        </div>
      `;
      postPreview.innerHTML = tiktokPreview;
      postPreview.style.display = "block";
    } else if (vimeoUrlMatch) {
      const videoId = vimeoUrlMatch[0].split("vimeo.com/")[1];
      const vimeoPreview = `
        <div class="vimeo-preview">
          <iframe
            src="https://player.vimeo.com/video/${videoId}"
            width="100%"
            height="100%"
            frameborder="0"
            allow="autoplay; fullscreen; picture-in-picture"
            allowfullscreen
          ></iframe>
        </div>
      `;
      postPreview.innerHTML = vimeoPreview;
      postPreview.style.display = "block";
    } else {
      // Controlla se l'anteprima contiene un'URL di immagine solo se non c'è un'anteprima video
      const imageRegex = /(https?:\/\/[^\s]+\.(?:jpg|jpeg|gif|png|bmp))/gi;
      const imageUrlMatch = xcode.value.match(imageRegex);
      if (imageUrlMatch) {
        const imageUrl = imageUrlMatch[0];
        const imagePreview = `<img src="${imageUrl}" alt="Image Preview" style="max-width: 100%; max-height: 200px;">`;
        postPreview.innerHTML = imagePreview;
        postPreview.style.display = "block";
      } else {
        postPreview.innerHTML = xcode.value;
         postPreview.style.display = "block";
      }
    }
  } else {
    postPreview.textContent = "";
    postPreview.style.display = "none";

  }
}

// Aggiungi un event listener per il cambio di testo nel textarea
document.getElementById("xcode").addEventListener("input", updateCharCountAndPreview);





$(document).ready(function() {
    // Gestisci il click sul pulsante di trasferimento
    $(".transfer-px-coin-btn").click(function() {
        $("#transferModal").modal("show");
    });
    
    // Gestisci il click sul pulsante di conferma trasferimento
    $("#confirmTransferBtn").click(function(e) {
        e.preventDefault(); // Evita il comportamento predefinito del form
        console.log("Confirm Transfer button clicked");
        var recipientUsername = $("#recipientUsername").val();
        var amount = $("#transferAmount").val();
        var id = getParameterByName('id'); // Ottieni il valore dell'id dalla query string
       
        // Esegui la chiamata AJAX per il trasferimento
        $.ajax({
            url: "?route=transferPxCoin",
            method: "POST",
            data: { recipientUsername: recipientUsername, amount: amount, id: id },
            success: function(response) {
                console.log("Response:", response);
                // Chiudi il modal dopo la chiamata AJAX
                $("#transferModal").modal("hide");
                // Aggiorna la pagina o mostra un messaggio di conferma
                var messageContainer = $("#messageContainer");
                messageContainer.html('<p class="success-message">' + response + '</p>');
            },
            error: function(xhr, status, error) {
                console.error(error);
                console.log("XHR Object:", xhr);
            }
        });
    });
});

// Funzione per ottenere il valore di un parametro dalla query string
function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}

// Event listener per il pulsante Grassetto
document.getElementById("boldButton").addEventListener("click", function(e) {
  e.preventDefault(); // Evita il comportamento predefinito del pulsante nel modulo
  formatText("bold");
});

// Event listener per il pulsante Maiuscolo
document.getElementById("uppercaseButton").addEventListener("click", function(e) {
  e.preventDefault(); // Evita il comportamento predefinito del pulsante nel modulo
  formatText("uppercase");
});

// Event listener per il pulsante Sottolineato
document.getElementById("underlineButton").addEventListener("click", function(e) {
  e.preventDefault(); // Evita il comportamento predefinito del pulsante nel modulo
  formatText("underline");
});

// Event listener per il selettore di colore
document.getElementById("colorPicker").addEventListener("input", function(e) {
  e.preventDefault(); // Evita il comportamento predefinito del pulsante nel modulo
  var selectedColor = document.getElementById("colorPicker").value;
  formatText("color", selectedColor);
});

// Event listener per allineare il testo a sinistra
document.getElementById("alignLeftButton").addEventListener("click", function(e) {
  e.preventDefault(); // Evita il comportamento predefinito del pulsante nel modulo
  var xcode = document.getElementById("xcode");
  xcode.style.textAlign = "left";
});

// Event listener per allineare il testo al centro
document.getElementById("alignCenterButton").addEventListener("click", function(e) {
  e.preventDefault(); // Evita il comportamento predefinito del pulsante nel modulo
  var xcode = document.getElementById("xcode");
  xcode.style.textAlign = "center";
});

// Event listener per allineare il testo a destra
document.getElementById("alignRightButton").addEventListener("click", function(e) {
  e.preventDefault(); // Evita il comportamento predefinito del pulsante nel modulo
  var xcode = document.getElementById("xcode");
  xcode.style.textAlign = "right";
});

// Event listener per cambiare il tipo di carattere
document.getElementById("fontFamilySelect").addEventListener("change", function(e) {
  e.preventDefault(); // Evita il comportamento predefinito del pulsante nel modulo
  var xcode = document.getElementById("xcode");
  var selectedFont = document.getElementById("fontFamilySelect").value;
  xcode.style.fontFamily = selectedFont;
});

// Event listener per cambiare la dimensione del carattere
document.getElementById("fontSizeSelect").addEventListener("change", function(e) {
  e.preventDefault(); // Evita il comportamento predefinito del pulsante nel modulo
  var xcode = document.getElementById("xcode");
  var selectedSize = document.getElementById("fontSizeSelect").value;
  xcode.style.fontSize = selectedSize;
});

// Event listener per cambiare il colore del testo
document.getElementById("textColorPicker").addEventListener("input", function(e) {
  e.preventDefault(); // Evita il comportamento predefinito del pulsante nel modulo
  var xcode = document.getElementById("xcode");
  var selectedColor = document.getElementById("textColorPicker").value;
  xcode.style.color = selectedColor;
});

// Aggiungi un event listener per il modulo di invio del form
document.querySelector("form").addEventListener("submit", function (event) {
  event.preventDefault(); // Previene l'invio del form predefinito
  uploadPost(); // Chiama la funzione per caricare il post
});


// Funzione per applicare la formattazione al testo selezionato nel textarea
function formatText(format, value) {
  var xcode = document.getElementById("xcode");
  var start = xcode.selectionStart;
  var end = xcode.selectionEnd;
  var selectedText = xcode.value.substring(start, end);

  switch (format) {
    case "bold":
      selectedText = `<b>${selectedText}</b>`;
      break;
    case "uppercase":
      selectedText = selectedText.toUpperCase();
      break;
    case "underline":
      selectedText = `<u>${selectedText}</u>`;
      break;
    case "color":
      selectedText = `<span style="color: ${value};">${selectedText}</span>`;
      break;
  }

  // Inserisci il testo formattato nel textarea
  xcode.value =
    xcode.value.substring(0, start) +
    selectedText +
    xcode.value.substring(end);

  // Ripristina il cursore alla posizione iniziale
  xcode.selectionStart = start;
  xcode.selectionEnd = end + selectedText.length;
}


function uploadPost() {
  const xcode = document.getElementById("xcode").value;
  const postPreview = document.getElementById("postPreview");

  // Aggiorna l'anteprima con il contenuto del textarea
  postPreview.innerHTML = xcode;
  postPreview.style.display = "block";
}








