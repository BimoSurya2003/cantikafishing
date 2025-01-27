document.getElementById("search-btn").addEventListener("click", function () {
    const query = document.getElementById("search").value;
    alert(`You searched for: ${query}`);
});

document.getElementById("sign-up").addEventListener("click", function () {
    alert("Sign-up button clicked");
});

document.getElementById("login").addEventListener("click", function () {
    alert("Login button clicked");
});


document.getElementById("search-btn").addEventListener("click", function () {
    const query = document.getElementById("search").value;
    alert(`You searched for: ${query}`);
});

document.getElementById("sign-up").addEventListener("click", function () {
    alert("Sign-up button clicked");
});

document.getElementById("login").addEventListener("click", function () {
    alert("Login button clicked");
});

document.getElementById('searchButton').addEventListener('click', function () {
    const searchValue = document.getElementById('searchInput').value.toLowerCase();
    const products = document.querySelectorAll('#productList .card');

    products.forEach(function (product) {
        const title = product.querySelector('.card-title').textContent.toLowerCase();
            if (title.includes(searchValue)) {
                product.style.display = 'block';
            } else {
                product.style.display = 'none';
            }
    });
});


