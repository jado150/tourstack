



const prices = {
    "single": 20000,
    "double": 30000,
    "twin": 35000,
    "triple": 50000,
    "suite": 80000
};

const roomPrices = {
    "single": 20000,
    "double": 30000,
    "twin": 35000,
    "triple": 50000,
    "suite": 80000
};


function updateCostPreview() {
    const roomType = document.getElementById("room_type").value;
    const nights = parseInt(document.getElementById("nights").value) || 0;
    const price = roomPrices[roomType] || 0;

    document.getElementById("price").innerText = price;
    document.getElementById("total").innerText = price * nights;
}


document.getElementById("room_type").addEventListener("change", updateCostPreview);
document.getElementById("nights").addEventListener("input", updateCostPreview);
window.addEventListener("load", updateCostPreview);
