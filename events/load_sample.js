const loadSampleDispatch = async (e) => {

    // Element Data
    console.log(e);

    // Get API Parameters
    const api_host = document.getElementById("auth_parameters-js").getAttribute("data-host");
    const api_auth = document.getElementById("auth_parameters-js").getAttribute("data-auth");

    const headers = new Headers();
    headers.append('Content-Type', 'application/json');
    headers.append('Authorization', `Basic ${api_auth}`);

    // Parameters to mParticle
    const payload = {
        "schema_version": 2,
        "environment": "development",
        "events": [
            {
                "data": {
                    "event_name": "load",
                    "custom_event_type": "other",
                    "custom_attributes": {
                        "button_name": "home",
                        "other_attribute": "xyz"
                    }
                },
                "event_type": "custom_event"
            }
        ]
    };

    const options = {
        method: 'POST',
        headers: headers,
        body: JSON.stringify(payload),
        mode: 'cors',
        cache: 'default'
    };

    const request = new Request(api_host, options);

    // Send Request to mParticle
    return await fetch(request)
        .catch(error => {
            console.error(error);
        })
}

// Old Browsers Hack (IE,Opera)
if (window.addEventListener) {
    window.addEventListener('load', loadSampleDispatch, false);
} else {
    window.attachEvent('onload', loadSampleDispatch);
}