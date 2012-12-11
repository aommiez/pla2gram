$(document).ready(function(){
    FB.Event.subscribe('auth.login', function(){
        alert('logged in!');
    });
});