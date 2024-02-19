    $(document).ready(function() {

    $(".like-btn").click(function() {
        var postId = $(this).data("post-id");
        var likeButton = $(this);
        var userEmail = $("#aut").text();
        
        $.ajax({
            url: "?route=likePost&postid=" + postId + "&useremail=" + userEmail,
            method: "GET",
            success: function(response) {
                // Imposta il valore dello span con ID "messageSpan" in base alla risposta
                var messageSpan = $("#messageText");

                // Supponiamo che la tua risposta sia memorizzata in una variabile chiamata 'response'.
                var jsonString = response;
                var response = JSON.parse(jsonString);

                // Ora puoi accedere al campo "message" come segue:
                var message = response.message;

                if (message === 'You have already liked this post.') {
                    messageSpan.text("You have already liked this post.");
                } else if (message === 'You have successfully liked the post!') {
                    messageSpan.text("You have successfully liked the post!");

                    // Aggiorna il conteggio dei like
                    var likeCountElement = likeButton.closest(".post").find(".like-count");
                    var currentLikes = parseInt(likeCountElement.text());
                    likeCountElement.text((currentLikes + 1) + " likes");

                    // Nascondi il pulsante "like"
                 //   likeButton.hide();
                } else if (message === 'Post not found.') {  messageSpan.text("Post not found."); }
                $("#messageModal").modal("show");
            },
            error: function(xhr, status, error) {
                console.error(error);
                console.log("XHR Object:", xhr);
            }
        });
    });
});

// Aggiungi questo script JavaScript nel tuo modulo di caricamento o in una sezione script separata
if ("geolocation" in navigator) {
    navigator.geolocation.getCurrentPosition(function(position) {
        const latitude = position.coords.latitude;
        const longitude = position.coords.longitude;
        const geolocationInput = document.getElementById("geolocation");
        geolocationInput.value = latitude + "," + longitude;
    });
}



    


