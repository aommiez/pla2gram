FB.getLoginStatus(function(response) {
    if (response.status === 'connected') {
        // the user is logged in and has authenticated your
        // app, and response.authResponse supplies
        // the user's ID, a valid access token, a signed
        // request, and the time the access token
        // and signed request each expire
        var uid = response.authResponse.userID;
        var accessToken = response.authResponse.accessToken;
        alert(accessToken);
    } else if (response.status === 'not_authorized') {
        // the user is logged in to Facebook,
        // but has not authenticated your app
        alert("not_authorized");
    } else {
        alert("not_login");
        // the user isn't logged in to Facebook.
    }
});
