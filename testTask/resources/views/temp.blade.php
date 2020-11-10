<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    UserId <br>
    <input id="userId" type="number"> <br>
    ServiceId <br>
    <input type="number" id="serviceId"> <br>
    TarifId <br>
    <input type="number" id="tarifId"> <br>
    <button onClick="getTarif()"> GET</button>
    <button onClick="updateTarif()"> PUT</button>

    <script>
        function updateTarif(){
            let promise = fetch(`/api/users/${document.getElementById("userId").value}/services/${document.getElementById("serviceId").value}/tarif`,{
                method: "PUT",
                headers: {
                    'Content-Type': "application/json;charset=utf-8"
                },
                body: JSON.stringify({"tarif_id": document.getElementById("tarifId").value })
            })
            promise
                .then(x => x.json())
                .then(result => console.log(result));
        }

        function getTarif(){
            let promise = fetch(`/api/services/${document.getElementById("serviceId").value}/tarifs`,{
                method: "GET",
                headers: {
                    'Content-Type': "application/json;charset=utf-8"
                }
            })
            promise
                .then(x => x.json())
                .then(result => console.log(result));
        }
    </script>
</body>
</html>