const propName = document.getElementById('name');
const propType = document.getElementById('property');
const price = document.getElementById('Price');
const desc = document.getElementById('Description');
const image = document.getElementById('image');
const form = document.getElementById('form');
const loc = document.getElementById('Location');

const propName_error = document.getElementById('propName_error');
const propType_error = document.getElementById('propType_error');
const price_error = document.getElementById('price_error');
const loc_error = document.getElementById('location_error');
const desc_error = document.getElementById('desc_error');
const image_error = document.getElementById('image_error');

function clearError(input, error) {
    input.addEventListener('input', () => {
        error.innerHTML = '';
    });
}


clearError(propName, propName_error);
clearError(propType, propType_error);
clearError(price, price_error);
clearError(loc, loc_error);
clearError(desc, desc_error);
clearError(image, image_error);

form.addEventListener('submit', (e) => {
    if (propName.value.trim() === '' || propName.value.trim() == null) {
        e.preventDefault();
        propName_error.innerHTML = "Property Name is required";
    }
    if (propType.value.trim() === '' || propType.value.trim() == null) {
        e.preventDefault();
        propType_error.innerHTML = "Property Type is required";
    }
    if (price.value === '' || price.value == null) {
        e.preventDefault();
        price_error.innerHTML = "Price Name is required";
    }
    if (loc.value.trim() === '' || loc.value.trim() === null) {
        e.preventDefault();
        loc_error.innerHTML = "Location is required";
    }
    if (desc.value.trim() === '' || desc.value.trim() == null) {
        e.preventDefault();
        desc_error.innerHTML = "Property description is required";
    }
    if (price.value < 0) {
        e.preventDefault();
        price_error.innerHTML = "Price should not be negative";
    }
    if (image.value === '' || image.value == null) {
        e.preventDefault();
        image_error.innerHTML = "Property image is required";
    }
})
