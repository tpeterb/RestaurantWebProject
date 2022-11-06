var currentChosenProductName = "";
var currentChosenProductPrice = 0;

function initializeCart() {
	if (localStorage.getItem("cart") == undefined || localStorage.getItem("cart") == null) {
		var cart = [];
		localStorage.setItem("cart", JSON.stringify(cart));
		localStorage.setItem("cartLength", 0);
	}
}

function clearCart() {
	localStorage.setItem("cart", JSON.stringify([]));
	localStorage.setItem("cartLength", 0);
	fillCartTable();
}

function handleCartIconClick(productName, productPrice) {
	const product = new Product(productName, productPrice, 1);
	const cartLength = Number(localStorage.getItem("cartLength"));
	var found = false;
	if(cartLength > 0) {
		var cart = JSON.parse(localStorage.getItem("cart"));
		for	(const prod of cart) {
			if (prod.name == productName) {
				found = true;
				prod.amount++;
				break;
			}
		}
		if (!found) {
			cart.push(product);
			localStorage.setItem("cart", JSON.stringify(cart));
			localStorage.setItem("cartLength", cartLength + 1);
		} else {
			localStorage.setItem("cart", JSON.stringify(cart));
			localStorage.setItem("cartLength", cartLength + 1);
		}
	} else {
		var cart = [];
		cart.push(product);
		localStorage.setItem("cart", JSON.stringify(cart));
		localStorage.setItem("cartLength", 1);
	}
}

function fillCartTable() {
	var tbody = document.querySelector("table.cartTable tbody");
	tbody.innerHTML = "";
	const cart = JSON.parse(localStorage.getItem("cart"));
	var rowCounter = 1;
	var priceToPay = 0;
	for (const product of cart) {
		var tr = document.createElement("tr");

		var firstCell = document.createElement("td");
		const firstCellContent = document.createTextNode(product.name);
		firstCell.appendChild(firstCellContent);

		var secondCell = document.createElement("td");
		var secondCellContentWrapper = document.createElement("div");
		var minusButton = document.createElement("button");
		minusButton.setAttribute("type", "button");
		minusButton.classList.add("amountChangerButton");
		minusButton.textContent = "-";
		minusButton.setAttribute("onclick", `changeProductCount(${rowCounter}, -1)`);
		var amountHolderDiv = document.createElement("div");
		const amountText = document.createTextNode(product.amount);
		amountHolderDiv.appendChild(amountText);
		var plusButton = document.createElement("button");
		plusButton.setAttribute("type", "button");
		plusButton.classList.add("amountChangerButton");
		plusButton.textContent = "+";
		plusButton.setAttribute("onclick", `changeProductCount(${rowCounter}, +1)`);
		secondCellContentWrapper.appendChild(minusButton);
		secondCellContentWrapper.appendChild(amountHolderDiv);
		secondCellContentWrapper.appendChild(plusButton);
		secondCell.appendChild(secondCellContentWrapper);

		var thirdCell = document.createElement("td");
		const rowPrice = product.amount * product.price.split(" ")[0];
		const thirdCellContent = document.createTextNode(rowPrice + " Ft");
		thirdCell.appendChild(thirdCellContent);

		var fourthCell = document.createElement("td");
		var trashIcon = document.createElement("i");
		trashIcon.classList.add("fa")
		trashIcon.classList.add("fa-trash-o");
		trashIcon.setAttribute("onclick", `deleteRowFromCart(${rowCounter})`);
		fourthCell.appendChild(trashIcon);

		tr.appendChild(firstCell);
		tr.appendChild(secondCell);
		tr.appendChild(thirdCell);
		tr.appendChild(fourthCell);
		tbody.appendChild(tr);

		priceToPay += rowPrice;
		rowCounter++;
	}

	if (cart.length > 0) {
		var sumPriceRow = document.createElement("tr");

		const sumPriceRowFirstCell = document.createElement("td");
		const sumPriceRowSecondCell = document.createElement("td");
		const sumPriceRowThirdCell = document.createElement("td");
		const sumPriceRowFourthCell = document.createElement("td");
	
		sumPriceRow.classList.add("sumPriceRow");
	
		const sumPriceRowSecondCellContent = document.createTextNode("Összesen:");
		const sumPriceRowThirdCellContent = document.createTextNode(String(priceToPay) + " Ft");
	
		sumPriceRowSecondCell.appendChild(sumPriceRowSecondCellContent);
		sumPriceRowThirdCell.appendChild(sumPriceRowThirdCellContent);
	
		sumPriceRow.appendChild(sumPriceRowFirstCell);
		sumPriceRow.appendChild(sumPriceRowSecondCell);
		sumPriceRow.appendChild(sumPriceRowThirdCell);
		sumPriceRow.appendChild(sumPriceRowFourthCell);
	
		tbody.appendChild(sumPriceRow);
	}
	
}

function deleteRowFromCart(rowNumber) {
	var cart = JSON.parse(localStorage.getItem("cart"));
	const amount = cart[rowNumber - 1].amount;
	cart.splice(rowNumber - 1, 1);
	localStorage.setItem("cart", JSON.stringify(cart));
	const cartLength = localStorage.getItem("cartLength");
	localStorage.setItem("cartLength", cartLength - amount);
	fillCartTable();
}

function changeProductCount(rowNumber, amountToAdd) {
	var cart = JSON.parse(localStorage.getItem("cart"));
	var cartLength = Number(localStorage.getItem("cartLength"));
	cart[rowNumber - 1].amount += amountToAdd;
	if (cart[rowNumber - 1].amount == 0) {
		cart.splice(rowNumber - 1, 1);
	}
	cartLength += amountToAdd;
	localStorage.setItem("cart", JSON.stringify(cart));
	localStorage.setItem("cartLength", cartLength);
	fillCartTable();
}

function writeData() {
	const cart = JSON.parse(localStorage.getItem("cart"));
	console.log(cart);
	var arr = [];
	for (const item of cart) {
		console.log(" ", item.name, " ", item.price, " ", item.amount);
		arr.push([item.name,item.price,item.amount]);
	}
	console.log(" ", localStorage.getItem("cartLength"));
	//window.location.href = "order.php?arr=" + arr;
	window.location.href = "order.php";
	document.cookie = "arr=" + arr + "; path=/";
	
}

function login() {
	window.location.href = "login.php?mustlogin='1'";
}

class Product {	

	constructor(productName, productPrice, productAmount) {
		this.name = productName;
		this.price = productPrice;
		this.amount = productAmount;
	}

}