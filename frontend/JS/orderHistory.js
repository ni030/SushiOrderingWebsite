document.querySelectorAll('input[name="sortOption"]').forEach(option => {
    option.addEventListener('change', function () {
        sortOrders(this.value);
    });
});

function sortOrders(order) {
    const orderList = document.getElementById('orderList');
    const orders = Array.from(orderList.getElementsByClassName('order'));
    orders.sort((a, b) => {
        const timeA = new Date(a.querySelector('.order-time').innerText);
        const timeB = new Date(b.querySelector('.order-time').innerText);
        return order === 'latest' ? timeB - timeA : timeA - timeB;
    });
    orders.forEach(order => orderList.appendChild(order));
}
