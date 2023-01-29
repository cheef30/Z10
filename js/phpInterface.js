async function get(parametri) {
    const res = await fetch(`../php/funkcije/getAPI.php${queryPath(parametri)}`, {
        method: "GET",
        headers: {
            'Content-Type': 'application/json'
        }
    })

    const data = await res.json()
    return data
}

async function post(params, reqBody) {
    const res = await fetch(`../php/funkcije/postAPI.php${queryPath(params)}`, {
        method: "POST",
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: queryPath(reqBody, false)
    })

    const data = await res.json();
    return data;
}

function queryPath(params, query = true) {
    let path = ''

    if (query == true)
        path = '?'

    Object.entries(params).forEach(([k,v]) => {
        path += `${k}=${v}&`
    })

    path = path.substring(0, path.length - 1)
    return path
}
