function changeQuantity(action) {
    var mealField = document.getElementById('quantity');
    var mealQuantity = mealField.value;

    mealQuantity = parseInt(mealQuantity, 10);
    console.log("Initial mealQuantity:", mealQuantity);

    if (isNaN(mealQuantity)) {
        console.error("mealQuantity is not a valid number");
        mealField.value = 1;  // Reset to 1 if the input is invalid
        return;
    }

    if(mealQuantity == 20){
        
    }

    switch (action) {
        case "plus":
            mealQuantity++;
            break;

        case "minus":
            if (mealQuantity > 0) {
                mealQuantity--;
            } else {
                break;
            }
            break;
    }

    mealField.value = mealQuantity;
}
