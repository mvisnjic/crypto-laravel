document.addEventListener("DOMContentLoaded", function () {
    fetch("api/getcrypto")
        .then((response) => response.json())
        .then((data) => {
            const cryptoList = document.getElementById("cryptoList");
            const cryptoListTop10 = document.getElementById("cryptoListTop10");
            data.all_currencies.forEach((crypto) => {
                const listItem = document.createElement("li");
                listItem.textContent = `${crypto.rank}. ${crypto.name}: ${crypto.price} USD`;
                cryptoList.appendChild(listItem);
            });
            data.top10.forEach((crypto) => {
                const listItemTop10 = document.createElement("li");
                listItemTop10.textContent = `${crypto.rank}. ${crypto.name}, Percent change 15m: ${crypto.percent_change_15m}%, Updated: ${crypto.updated_at}`;
                cryptoListTop10.appendChild(listItemTop10);
            });
        })
        .catch((error) => {
            console.error("Error fetching data:", error);
        });
});

function submitForm() {
    var rank = document.getElementById('rank').value;
    var price = document.getElementById('price').value;
    var url = '/api/updateprice?rank=' + rank + '&price=' + price;

    document.getElementById('updateForm').action = url;
    document.getElementById('updateForm').method = 'post';
    document.getElementById('updateForm').submit();
    location.reload();
    window.close();
}
