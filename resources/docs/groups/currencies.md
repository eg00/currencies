# Currencies


## returns a list of exchange rates with the possibility of pagination




> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/currencies?paginate=16" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/currencies"
);

let params = {
    "paginate": "16",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (200):

```json
{
    "data": [
        {
            "id": null,
            "char_code": "AQX",
            "name": "Sit cupiditate ab laboriosam id eius.",
            "rate": 89766676.51,
            "updated": "2021-05-17 13:56:02"
        },
        {
            "id": 45,
            "char_code": "IBL",
            "name": "Ipsum perspiciatis ipsa veniam assumenda distinctio numquam.",
            "rate": 253.7888116,
            "updated": "2021-05-17 13:56:02"
        }
    ],
    "links": {
        "first": "\/?page=1",
        "last": "\/?page=1",
        "prev": null,
        "next": null
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 1,
        "links": [
            {
                "url": null,
                "label": "&laquo; Previous",
                "active": false
            },
            {
                "url": "\/?page=1",
                "label": "1",
                "active": true
            },
            {
                "url": null,
                "label": "Next &raquo;",
                "active": false
            }
        ],
        "path": "\/",
        "per_page": "10",
        "to": 2,
        "total": 2
    }
}
```
<div id="execution-results-GETapi-currencies" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-currencies"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-currencies"></code></pre>
</div>
<div id="execution-error-GETapi-currencies" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-currencies"></code></pre>
</div>
<form id="form-GETapi-currencies" data-method="GET" data-path="api/currencies" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-currencies', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-currencies" onclick="tryItOut('GETapi-currencies');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-currencies" onclick="cancelTryOut('GETapi-currencies');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-currencies" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/currencies</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
<p>
<b><code>paginate</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="paginate" data-endpoint="GETapi-currencies" data-component="query"  hidden>
<br>
Pagination. Defaults to '10'.
</p>
</form>


## returns the currency rate for the passed id




> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/currency/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/currency/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (200):

```json
{
    "data": {
        "id": 46,
        "char_code": "GRA",
        "name": "Dignissimos est veritatis quis rerum harum odit nemo enim.",
        "rate": 99542.956609,
        "updated": "2021-05-17 13:56:02"
    }
}
```
<div id="execution-results-GETapi-currency--currency-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-currency--currency-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-currency--currency-"></code></pre>
</div>
<div id="execution-error-GETapi-currency--currency-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-currency--currency-"></code></pre>
</div>
<form id="form-GETapi-currency--currency-" data-method="GET" data-path="api/currency/{currency}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-currency--currency-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-currency--currency-" onclick="tryItOut('GETapi-currency--currency-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-currency--currency-" onclick="cancelTryOut('GETapi-currency--currency-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-currency--currency-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/currency/{currency}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>currency</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="currency" data-endpoint="GETapi-currency--currency-" data-component="url" required  hidden>
<br>
The id or char_code of the currency.
</p>
</form>



