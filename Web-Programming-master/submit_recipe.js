function specialChar() {
	dish = document.getElementById("dish").value.search(/[^a-zA-Z0-9,\.;:\(\)\[\]&%# ]/);
	ingr1 = document.getElementById("ingr1").value.search(/[^a-zA-Z0-9,\.;:\(\)\[\]&%# ]/);
	ingr2 = document.getElementById("ingr2").value.search(/[^a-zA-Z0-9,\.;:\(\)\[\]&%# ]/);
	ingr3 = document.getElementById("ingr3").value.search(/[^a-zA-Z0-9,\.;:\(\)\[\]&%# ]/);
	ingr4 = document.getElementById("ingr4").value.search(/[^a-zA-Z0-9,\.;:\(\)\[\]&%# ]/);
	ingr5 = document.getElementById("ingr5").value.search(/[^a-zA-Z0-9,\.;:\(\)\[\]&%# ]/);
	recipe = document.getElementById("recipe").value.search(/[^a-zA-Z0-9,\.;:\(\)\[\]&%# ]/);
	if (dish != -1) {
		window.alert("You included an invalid character in the dish name: " + document.getElementById("dish").value.substring(dish, dish + 1));
	}
	else if (ingr1 != -1) {
                window.alert("You included an invalid character in Ingredient 1: " + document.getElementById("dish").value.substring(ingr1, ingr1 + 1));
        }
	else if (ingr2 != -1) {
                window.alert("You included an invalid character in Ingredient 2: " + document.getElementById("dish").value.substring(ingr2, ingr2 + 1));
        }
	else if (ingr1 != -1) {
                window.alert("You included an invalid character in Ingredient 3: " + document.getElementById("dish").value.substring(ingr3, ingr3 + 1));
        }
	else if (ingr4 != -1) {
                window.alert("You included an invalid character in Ingredient 4: " + document.getElementById("dish").value.substring(ingr4, ingr4 + 1));
        }
	else if (ingr5 != -1) {
                window.alert("You included an invalid character in Ingredient 5: " + document.getElementById("dish").value.substring(ingr5, ingr5 + 1));
        }
	else if (recipe != -1) {
                window.alert("You included an invalid character in the recipe: " + document.getElementById("dish").value.substring(recipe, recipe + 1));
        }
	else {
		document.getElementById("submit").disabled = false;
	}
	return;
}
